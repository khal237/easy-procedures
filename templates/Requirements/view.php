<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirement $requirement
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller'=>'requirements', 'action'=>'index'])?>">requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">view <?= h($requirement->name)?></li>
    </ol>
</nav>
<div class="row">
    <div class="column-responsive column-80">
        <div class="requirements view content">
            <h3><?= h($requirement->name) ?></h3>
            <table class='table table-data2'>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($requirement->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($requirement->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Example') ?></th>
                    <td><?= h($requirement->example) ?></td>
                </tr>
                <tr>
                    <th><?= __('Requirementtype') ?></th>
                    <td><?= h($requirement->requirementtype->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($requirement->created) ?></td>
                </tr>
            </table>
            <aside class="column">
                <div class="table-data-feature">
                    <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>'), ['action' => 'edit', $requirement->id], ['class' => 'btn btn-primary', 'escape' => false]) ?>
                    <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id), 'class' => 'btn btn-primary', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="zmdi zmdi-plus"></i>'), ['action' => 'add'], ['class' => 'btn btn-primary', 'escape' => false]) ?>
                </div>
            </aside>
        </div>
    </div>
</div>