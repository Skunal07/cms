<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->Breadcrumbs->add(
    'Login',
    ['controller' => 'Users', 'action' => 'login']
    );
    $this->Breadcrumbs->add(
        'List',
        ['controller' => 'Users', 'action' => 'list']
        );
    ?>
<div class="row">
    <div class="column-responsive column-100">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <?php
            $session = $this->request->getSession(); //read session data
            if ($session->read('email') != null) {
            ?>
                <?= $this->Html->link(__('Back'), ['action' => 'list'], ['class' => 'button float-right']) ?>
                
                <?php
            } else {
                ?>
                <?= $this->Html->link(__('Back'), ['action' => 'home'], ['class' => 'nav-link active']) ?>
            <?php
            }
            ?>
            <table>
                <tr>
                    <th><?= __('Image ') ?></th>
                    <td><?= $this->Html->image(h($user->image), array('width' => '200px','class'=>"image")) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($user->Fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($user->lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->Email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($user->Gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($user->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($user->Phone) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?= $this->Html->css('user', ['block' => 'css']); ?>
