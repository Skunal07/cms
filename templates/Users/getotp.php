
<div class="container" id="bottom">
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
                            <?= $this->Form->control('token') ?>
                        </div>
                    </div>
                </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
