<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirementpropriety $requirementpropriety
 * @var string[]|\Cake\Collection\CollectionInterface $requirements
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'requirements', 'action' => 'index']) ?>">requirements</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'requirementproprieties', 'action' => 'index']) ?>">requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit <?= h($requirementpropriety->name) ?></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <legend><?= __('Edit Requirementpropriety') ?></legend>
            </div>
            <div class="column-responsive column-80">
                <div class="requirementproprieties form content">
                    <div class="card-body card-block">
                        <?= $this->Form->create($requirementpropriety) ?>
                        <fieldset>

                            <?php
                            echo $this->Form->control('type', ['class' => 'form-control-success form-control']);
                            echo $this->Form->control('name', ['class' => 'form-control-success form-control']);
                            echo $this->Form->control('description', ['class' => 'form-control-success form-control']);
                            echo $this->Form->control('value', ['class' => 'form-control-success form-control']);
                            echo $this->Form->control('requirement_id', ['options' => $requirements, 'class' => 'form-control-success form-control']);
                            ?>
                        </fieldset>
                        <div class="card-footer">
                            <?= $this->Form->button(__('Submit')) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>