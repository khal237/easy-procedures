 <div class="login-form">
     <?= $this->form->create(null); ?>
        <div class="form-group">
            <?= $this->Form->control('email', array('type' => 'email', 'placeholder' => 'email', 'class' => 'au-input au-input--full')) ?>
        </div>
        <?= $this->Form->control('submit', array('type' => 'submit', 'class' => 'au-btn au-btn--block au-btn--green m-b-20')) ?>
     <?= $this->form->end(); ?>
 </div>