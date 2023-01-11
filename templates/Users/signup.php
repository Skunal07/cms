<?php

use function PHPSTORM_META\type;
?>
<?= $this->Form->create($user,['enctype'=>"multipart/form-data"]) ?>

<div class="container main">
    <h1 class="text-center"><u><b>Registration Form</b></u></h1>
    <div class="row">
        <div class="col-md-6">
            <?= $this->Form->control('Fname',['required'=>false]) ?>
            <span class="error-message" id="first-name-error"></span>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('lname',['required'=>false]) ?>
            <span class="error-message" id="last-name-error"></span>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('Email',['required'=>false]) ?>
            <span class="error-message" id="email-error"></span>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('Phone',['required'=>false]) ?>
            <span class="error-message" id="phone-number-error"></span>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('password',['required'=>false]) ?>
            <span class="error-message" id="password-error"></span>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('confirm_password',['type'=>'password','required'=>false]) ?>
            <span class="error-message" id="password-error"></span>
        </div>
        <div class="col-md-6">
            <label for="gender">Gender</label>
            <div class="rahul">
                <?= $this->Form->radio(
                    'Gender',
                    ['Male' => 'Male', 'Female' => 'Female'],['required'=>false]
                    ) ?>
            </div>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('image',['type'=>'file','required'=>false]) ?>
        </div>
    </div>
    <span class='cent'>
        <?= $this->Form->button(__('Submit')) ?>
    </span>
    <hr>
        <span class='cen'>
            Already Register?  <?= $this->Html->link(__('Login here'), ['action' => 'login'], ['class' => 'side-nav-item']) ?>
        </span>
</div>
<?= $this->Form->end() ?>