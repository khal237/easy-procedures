<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirement $requirement
 * @var \Cake\Collection\CollectionInterface|string[] $requirementtypes
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'requirements', 'action' => 'index']) ?>">requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">add </li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="column-responsive column-80">
                <div class="requirements form content">
                    <div class="card-header">
                        <legend><?= __('Add Requirement') ?></legend>
                    </div>
                    <div class="card-body card-block">
                        <?= $this->Form->create($requirement) ?>

                        <fieldset>

                            <?= $this->Form->control('name', ['class' => 'form-control-success form-control']); ?>
                            <?= $this->Form->control('description', ['class' => 'form-control-success form-control']); ?>
                            <?= $this->Form->control('example', ['class' => 'form-control-success form-control']); ?>
                            <?= $this->Form->control('requirementtype_id', ['options' => $requirementtypes, 'class' => 'form-control-success form-control']); ?>
                        </fieldset>
                        <div class="card-footer">
                            <?= $this->Form->button(__('Submit', ['class' => 'btn btn-primary btn-sm'])) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>