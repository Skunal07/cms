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
    'Edit',
    ['controller' => 'Users', 'action' => 'edit']
);
?>
<div class="container">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
             
                <?= $this->Html->link(__('List Users'), ['action' => 'list'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column-100">
            <div class="users form content">
                <?= $this->Form->create($user,["enctype" => "multipart/form-data"]) ?>
                <fieldset>
                    <legend><?= __('Edit User') ?></legend>
                    <?php
                    ?>
                    <div class="row">
                    <div class="col-md-3">
                <?= $this->Form->control('image', ['type' => 'file', 'required' => false]) ?>
                <span class="error-message" id="file-name-error"></span>
            </div>
            <div class="col-md-3">
                <td><?= $this->Html->image(h($user->file), array('width'=>'200px')) ?></td>
            </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('Fname') ?>
                            <span class="error-message" id="first-name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('lname') ?>
                            <span class="error-message" id="last-name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('Email') ?>
                            <span class="error-message" id="email-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('Phone') ?>
                            <span class="error-message" id="phone-number-error"></span>
                        </div>
                       
                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <div class="rahul">
                                <?= $this->Form->radio(
                                    'Gender',
                                    ['Male' => 'Male', 'Female' => 'Female']
                                ) ?>
                            </div>
                            <span class="error-message" id="gender-error"></span>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>