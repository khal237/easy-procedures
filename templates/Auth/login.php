<div class="login-form">
    <?= $this->Form->create(); ?>
        <div class="form-group">

            <?= $this->Form->control('email', array('type' => 'email', 'name'=>'email','placeholder' => 'email', 'class' => 'au-input au-input--full')) ?>
        </div>
        <div class="form-group">

            <?= $this->Form->control('password', array('type' => 'password','name'=>'password','placeholder' => 'password', 'class' => 'au-input au-input--full')) ?>
        </div>
        <div class="login-checkbox">
            <label>
                <?= $this->Form->control('remember me', array('type' => 'checkbox')) ?>
            </label>
            <label>
                <a href="forgetpassword">Forgotten Password?</a>
            </label>
        </div>
        <?= $this->Form->control('login', array('type' => 'submit', 'class' => 'au-btn au-btn--block au-btn--green m-b-20')) ?>

        <div class="social-login-content">
        </div>
        <div class="register-link">
            <p>
                Don't you have account?
                <a href="register">Sign Up Here</a>
            </p>
        </div>
    <?= $this->Form->End(); ?>
</div>