<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Procedure $procedure
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedures', 'action' => 'index']) ?>">procedures</a></li>
        <li class="breadcrumb-item active" aria-current="page">view <?= h($procedure->name) ?></li>
    </ol>
</nav>
<div class="row">
    <div class="column-responsive column-80">
        <div class="procedures view content">
            <h3><?= h($procedure->name) ?></h3>
            <table class="table data-table2">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($procedure->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($procedure->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($procedure->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($procedure->created) ?></td>
                </tr>

            </table>
            <aside class="column">
                <div class="table-data-feature">
                    <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>'), ['action' => 'edit',$procedure->id], ['class' => 'btn btn-primary', 'escape' => false]) ?>
                    <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete',$procedure->id], ['confirm' => __('Are you sure you want to delete # {0}?',$procedure->id), 'class' => 'btn btn-primary', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="zmdi zmdi-plus"></i>'), ['action' => 'add'], ['class' => 'btn btn-primary', 'escape' => false]) ?>
                </div>
            </aside>

        </div>
    </div>
</div>