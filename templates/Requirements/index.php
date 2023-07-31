<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Requirement> $requirements
 */
?>
<div class="requirements index content">
    <div class="card-body">
        <?= $this->Html->link('<i class="zmdi zmdi-plus"></i> New Requirement', ['action' => 'add'], ['class' => 'btn btn-primary', 'escape' => false]) ?>
    </div>
    <h3><?= __('Requirements') ?></h3>
    <div class="table table-data2">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th><?= $this->Paginator->sort('requirementtype_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requirements as $requirement) : ?>
                    <tr>
                        <td><?= $this->Number->format($requirement->id) ?></td>
                        <td><?= h($requirement->name) ?></td>
                        <td><?= h($requirement->status) ?></td>
                        <td><?= h($requirement->created) ?></td>
                        <td><?= h($requirement->modified) ?></td>
                        <td><?= h($requirement->deleted) ?></td>
                        <td><?= $requirement->has('requirementtype') ? $this->Html->link($requirement->requirementtype->name, ['controller' => 'Requirementtypes', 'action' => 'view', $requirement->requirementtype->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $requirement->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirement->id],['class'=>'btn btn-primary'])?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id)],['class'=>'btn btn-primary']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>