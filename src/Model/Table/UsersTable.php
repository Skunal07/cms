<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\Http\Client\Message;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('Id');
        $this->setPrimaryKey('Id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('Fname')
            ->maxLength('Fname', 50)
            ->requirePresence('Fname', 'create')
            ->notEmptyString('Fname', 'please enter your first name')
            ->add('Fname', [
                // 'notBlank' => [
                //     'rule'    => ['notBlank'],
                //     'message' => 'white space is not allowed',
                //     'last' => true
                // ],
                'characters' => [
                    'rule'    => ['custom', '/^[A-Z]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter characters only.'
                ],
                'length' => [
                    'rule' => ['minLength', 2],
                    'last' => true,
                    'message' => 'Last Name need to be at least 2 characters long',
                ],
            ]);


        $validator
            ->scalar('lname')
            ->maxLength('lname', 50)
            ->requirePresence('lname', 'create')
            ->notEmptyString('lname', 'please enter your last name')
            ->add('lname', [
                // 'notBlank' => [
                // 'rule'    => ['notBlank'],
                // 'message' => 'Please enter your last name',
                // 'last' => true
                // ],
                'characters' => [
                    'rule'    => ['custom', '/^[A-Z]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter characters only.'
                ],
                'length' => [
                    'rule' => ['minLength', 2],
                    'last' => true,
                    'message' => 'Last Name need to be at least 2 characters long',
                ],
            ]);


        $validator
            ->email('Email')
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email', "please enter your Email")
            ->add('Email', 'unique', [
                'rule' => 'validateUnique', 'provider' => 'table',
                'message' => 'Email already exist please enter another Email',
            ]);

        $validator
            ->requirePresence('Phone', 'create')
            ->notEmptyString('Phone', "Enter your Phone number")
            ->add('Phone', [
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'message' => 'Phone Number need to be 10 characters long',
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 10],
                    'message' => 'Phone Number need to be 10 characters long',
                ]
            ]);


        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->add('password', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your password',
                ],
                'upperCase' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^A-Z]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one uppercase',
                ],
                'lowerCase' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^a-z]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one lowercase',
                ],
                'numeric' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^0-9]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one numeric',
                ],
                'special' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^@#*]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one special character',
                ],
                'minLength' => [
                    'rule' => ['minLength', 8],
                    'message' => 'Password need to be 8 characters long',
                ],
            ]);

        $validator
            ->scalar('confirm_password')
            ->maxLength('confirm_password', 255)
            ->requirePresence('confirm_password', 'create')
            ->add('confirm_password', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your confirm-password',
                    'last' => true,
                ],
                'match' => [
                    'rule' => array('compareWith', 'password'),
                    'last' => true,
                    'message' => 'Password should not match with the previous password'
                ]
            ]);


            $validator
            ->scalar('Gender')
            ->requirePresence('Gender', 'create')
            ->notEmptyString('Gender');

            $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->notEmptyString('image', 'Please select your image')
            ->add('image', [
                'validExtension' => [
                    'rule' => ['extension', ['gif', 'jpeg', 'png', 'jpg']], // default  ['gif', 'jpeg', 'png', 'jpg']
                    'message' => 'These images extension are allowed: png ,jpeg, png, jpg'
                ],
            ]);


        return $validator;
    }
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['Email']), ['errorField' => 'Email']);

        return $rules;
    }
    public function login($email, $password)
    {
        $data=array();
        $result = $this->find('all')->where(['Email' => $email, 'password' => $password])->first();
        $data['role']=$result['role'];
        $data['id']=$result['Id'];
        echo $data;die;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function checktokenexist($token)
    {
        $result = $this->find('all')->where(['token' => $token])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailExist($email)
    {
        $result = $this->find('all')->where(['email' => $email])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($token, $password)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['password' => $password, 'token' => ''])
            ->where(['token' => $token])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function insertToken($email, $token)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['token' => $token])
            ->where(['email' => $email])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
