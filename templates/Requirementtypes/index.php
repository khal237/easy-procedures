<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Requirementtype> $requirementtypes
 */
?>
<div class="requirementtypes index content">
    <?= $this->Html->link(__('New Requirementtype'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Requirementtypes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('Description') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requirementtypes as $requirementtype): ?>
                <tr>
                    <td><?= $this->Number->format($requirementtype->id) ?></td>
                    <td><?= h($requirementtype->type) ?></td>
                    <td><?= h($requirementtype->name) ?></td>
                    <td><?= h($requirementtype->Description) ?></td>
                    <td><?= h($requirementtype->created) ?></td>
                    <td><?= h($requirementtype->modified) ?></td>
                    <td><?= h($requirementtype->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $requirementtype->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementtype->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementtype->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
