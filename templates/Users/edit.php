<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'account']) ?>">Account</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit <?= h($user->name) ?></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="column-responsive column-80">
                <div class="users form content">
                    <div class="card-header">
                        <legend><?= __('Edit User') ?></legend>
                    </div>
                    <div class="card-body card-block">
                        <?= $this->Form->create($user) ?>
                        <fieldset>

                            <?php
                            echo $this->Form->control('name', ['class' => 'form-control-success form-control']);
                            echo $this->Form->control('surname', ['class' => 'form-control-success form-control']);
                            echo $this->Form->control('email', ['class' => 'form-control-success form-control']);
                            echo $this->Form->control('phonenumber', ['class' => 'form-control-success form-control']);
                            ?>
                        </fieldset>
                        <div class="card-footers">
                            <div class="card-footers">
                                <button type="submit" class="btn btn-primary">
                                    <i class="zmdi zmdi-circle-o"></i> Submit
                                </button>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>