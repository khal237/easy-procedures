<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirement $requirement
 * @var string[]|\Cake\Collection\CollectionInterface $requirementtypes
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'requirements', 'action' => 'index']) ?>">Requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">edit <?= h($requirement->name) ?></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <legend><?= __('Edit Requirement') ?></legend>
            </div>
            <div class="column-responsive column-80">
                <div class="requirements form content">
                    <div class="card-body card-block">
                        <?= $this->Form->create($requirement) ?>
                        <fieldset>
                            <?= $this->Form->control(
                                'name',
                                [
                                    'class' => 'form-control-success form-control',
                                    'label' => 'name*'
                                ]
                            ); ?>
                            <?= $this->Form->control(
                                'description',
                                [
                                    'class' => 'form-control-success form-control',
                                    'type' => 'textarea',
                                    'label' => 'description*'
                                ]
                            ); ?>
                            <?= $this->Form->control('example', ['class' => 'form-control-success form-control']); ?>
                            <?= $this->Form->control(
                                'requirementtype_id',
                                [
                                    'options' => $requirementtypes,
                                    'class' => 'form-control-success form-control',
                                    'disabled' => true
                                ]
                            ); ?>
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