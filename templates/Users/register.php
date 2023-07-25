<div class="login-form">
    <?= $this->form->create(null, ['url' => ['controller' => 'Auth', 'action' => 'register']]) ; ?>
    <div class="form-group">


        <?= $this->form->control('', array('type' => 'text', 'placeholder' => 'name', 'class' => 'au-input au-input--full')) ?>
    </div>
    <div class="form-group">


        <?= $this->form->control('', array('type' => 'text', 'placeholder' => 'surname', 'class' => 'au-input au-input--full')) ?>
    </div>
    <div class="form-group">


        <?= $this->form->control('', array('type' => 'email', 'placeholder' => 'email', 'class' => 'au-input au-input--full')) ?>
    </div>
    <div class="form-group">


        <?= $this->form->control('', array('type' => 'int', 'placeholder' => 'phonenumber', 'class' => 'au-input au-input--full')) ?>
    </div>
    <div class="form-group">


        <?= $this->form->control('', array('type' => 'password', 'placeholder' => 'password', 'class' => 'au-input au-input--full')) ?>
    </div>
    <div class="form-group">


        <?= $this->form->control('', array('type' => 'password', 'placeholder' => 'confirm-password', 'class' => 'au-input au-input--full')) ?>
    </div>
    <div class="login-checkbox">
        <label>

            <?= $this->form->control('Agree the terms and policy', array('type' => 'checkbox', 'placeholder' => 'name')) ?>
        </label>
    </div>

    <?= $this->form->control('register', array('type' => 'submit', 'class' => 'au-btn au-btn--block au-btn--green m-b-20')) ?>
    <?= $this->form->end(); ?>
    <div class="register-link">
        <p>
            Already have account?
            <a href="login">Sign In</a>
        </p>
    </div>