<div class="container">
    <div class="row">
        <aside class="column">
            <div class="" style="text-align:center;">
                <h1 class="heading mt-3"><?= __('Reset your Password Here') ?></h1>
            </div>
        </aside>
        <div class="container">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <div class="row">
                    <div class="col-md-6">
                            <?= $this->Form->control('password', ['required' => false]) ?>
                            <span class="error-message" id="password-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('confirm_password', ['type' => 'password', 'required' => false]) ?>
                            <span class="error-message" id="confirm-password-error"></span>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>