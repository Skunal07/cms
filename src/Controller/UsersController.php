<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\View\View;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function list()
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('email') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        }
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }
    public function home()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function signup()
    {
        $this->viewBuilder()->setLayout('signup');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            $data["image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();
    
                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["image"] = "";
                } else {
                    // file uploaded
                    $fileType = $productImage->getClientMediaType();
    
                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }
            // echo $user;
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('user'));
    }

    // login method     

    public function logout()
    {
        $session = $this->request->getSession(); //read session data
        // $this->$session->delete();
        $session->destroy();
        return $this->redirect(['action' => 'login']);
    }

    public function forgot()
    {
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $user->email = $email;
            $result = $this->Users->checkEmailExist($email);
            if ($result) {
            $token = rand(10000, 99999);
            $result = $this->Users->insertToken($email, $token);

                $mailer = new Mailer('default');
                $mailer->setTransport('gmail'); //your email configuration name
                $mailer->setFrom(['kunal02chd@gmail.com' => 'Code The Pixel']);
                $mailer->setTo($email);
                $mailer->setEmailFormat('html');
                $mailer->setSubject('O.T.P');
                $mailer->deliver("$token is your one time password for animeclub");

                $this->Flash->success(__('Reset email send successfully.'));

                return $this->redirect(['action' => 'getotp']);
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
    }

    // logout method 
    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $email = $this->request->getData('Email');
            $password =  $this->request->getData('password');

            $result = $this->Users->login($email, $password);
            echo $result;
            // die();
            if ($result) {
                $session = $this->getRequest()->getSession(); //get session
                $session->write('email', $email); //write name value to session
                $this->Flash->success(__('The user has been logged in successfully.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
    }

    public function getotp()
    {

        // $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $token = $this->request->getData('token');
            $result = $this->Users->checktokenexist($token);
           
            if ($result) {
                $session = $this->getRequest()->getSession(); //get session
                $session->write('token', $token); //write name value to session
                return $this->redirect(['action' => 'reset']);
            }
            $this->Flash->error(__('Please enter valid password'));
        // } else {
        //     return $this->redirect(['action' => 'login']);
        }
        $this->set(compact('user'));
    }
    public function reset()
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('token') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        } 
            $token=$session->read('token');
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $password = $this->request->getData('password');
                $result=preg_match('(^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]*).{8,}$)', $password);
                $confirm_password = $this->request->getData('confirm_password');
                if($result ==1 && $password == $confirm_password){
                $res = $this->Users->resetPassword($token, $password);
                if ($res) {
                    $session->destroy();
                    $this->Flash->success(__('Password updated successfully.'));
                    return $this->redirect(['action' => 'login']);
                }
            }
                $this->Flash->error(__('Please enter valid password'));   
        }
        $this->set(compact('user'));
    }



    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * 
     */



    public function edit($id = null)
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('email') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        }
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $fileName2 = $user['image'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            // print_r($fileName);die();

            if($fileName == ''){
                $fileName = $fileName2;
            }

            // print_r($file);die();
            $data["image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);


            // $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $hasFileError = $productImage->getError();
    
                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["image"] = "";
                } else {
                    // file uploaded
                    $fileType = $productImage->getClientMediaType();
    
                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('email') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }
    public $paginate = [
        'limit' => 5
    ];
}
