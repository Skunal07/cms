
<div class="container" id="top">
    <div class="row">
        <aside class="column">
            <div class="" style="text-align:center;">
                <h1 class="heading mt-3"><?= __('Reset Password Here') ?></h1>
            </div>
        </aside>
        <div class="container">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <div class="row">
                        <div class="col">
                            <span class="error-message" id="email-error"></span>
                            <?= $this->Form->control('email', ['required' => false]) ?>
                        </div>
                    </div>
                </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                <hr>
                <div class="text-center">
                   <?= $this->Html->link(__('Create an Account!'), ['action' => 'signup'], ['class' => 'nav-link active']) ?>
                </div>
                <div class="text-center">
                     <?= $this->Html->link(__('Already have an account? Login!'), ['action' => 'login'], ['class' => 'nav-link active']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
