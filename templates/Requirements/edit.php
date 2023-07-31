<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirement $requirement
 * @var string[]|\Cake\Collection\CollectionInterface $requirementtypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <div class="card1">
                <?= $this->Html->link(__('List Requirements'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="requirements form content">
            <?= $this->Form->create($requirement) ?>
            <fieldset>
                <legend><?= __('edit Requirement') ?></legend>
                <?= $this->Form->control('name', ['class' => 'form-control-success form-control']); ?>
                <?= $this->Form->control('status', ['class' => 'form-control-success form-control']); ?>
                <?= $this->Form->control('requirementtype_id', ['options' => $requirementtypes, 'class' => 'js-select'], ['class' => 'form-control-success form-control']); ?>
            </fieldset>
            <div class="card-footer">
                <?= $this->Form->button(__('Submit')) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>