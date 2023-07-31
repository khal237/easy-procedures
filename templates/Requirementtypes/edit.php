<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirementtype $requirementtype
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requirementtype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requirementtype->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Requirementtypes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="requirementtypes form content">
            <?= $this->Form->create($requirementtype) ?>
            <fieldset>
                <legend><?= __('Edit Requirementtype') ?></legend>
                <?php
                    echo $this->Form->control('type');
                    echo $this->Form->control('name');
                    echo $this->Form->control('Description');
                    echo $this->Form->control('deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
