<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Procedure $procedure
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedures', 'action' => 'index']) ?>">Procedures</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add </li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <legend><?= __('Add Procedure') ?></legend>
            </div>
            <div class="column-responsive column-80">
                <div class="procedures form content">
                    <div class="card-body card-block">
                        <?= $this->Form->create($procedure) ?>
                        <fieldset>

                            <?php
                            echo $this->Form->control('name', ['class' => 'form-control-success form-control', 'label' => 'name*']);
                            echo $this->Form->control('type', ['class' => 'form-control-success form-control', 'label' => 'type*']);
                            echo $this->Form->control('description', ['class' => 'form-control-success form-control', 'type' => 'textarea', 'label' => 'description*']);
                            ?>
                        </fieldset>
                        <div class="card-footers">
                            <button type="submit" class="btn btn-primary">
                                <i class="zmdi zmdi-circle-o"></i> Submit
                            </button>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>