<section class="login py-5 bg-light ">
    <?= $this->Form->create($user) ?>
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-5">
                <img src="/img/demon.jpg" class="img-fluid" alt="...">
            </div>
            <div class="col-lg-7 text-center py-4">
                <h1>Sign In</h1>
                <div class="form-row py-4 pt-5">
                    <div class="offset-1 col-lg-10">
                        <?= $this->Form->control('Email', ['required' => false]) ?>
                        <span name="remove" id="error_email" class="text-danger ">
                        </span>
                    </div>
                </div>
                <div class="form-row py-4 pt-2">
                    <div class="offset-1 col-lg-10">
                        <?= $this->Form->control('password', ['required' => false]) ?>
                        <span name="remove" id="error_pass" class="text-danger ">
                        </span>
                    </div>
                </div>
                <div class="form-row py-4 pt-5">
                    <div class="offset-1 col-lg-10">
                        <?= $this->Form->button(__('Submit')) ?>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <a class="small" href=""> <?= $this->Html->link(__('Forgot Password?'), ['action' => 'forgot'], ['class' => 'nav-link active']) ?></a>
                </div>
                <div class="text-center">
                    <a class="small" href=""> <?= $this->Html->link(__('Create an Account!'), ['action' => 'signup'], ['class' => 'nav-link active']) ?></a>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</section>