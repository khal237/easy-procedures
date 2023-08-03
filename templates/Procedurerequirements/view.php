<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Procedurerequirement $procedurerequirement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Procedurerequirement'), ['action' => 'edit', $procedurerequirement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Procedurerequirement'), ['action' => 'delete', $procedurerequirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $procedurerequirement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Procedurerequirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Procedurerequirement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="procedurerequirements view content">
            <h3><?= h($procedurerequirement->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($procedurerequirement->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Procedure') ?></th>
                    <td><?= $procedurerequirement->has('procedure') ? $this->Html->link($procedurerequirement->procedure->name, ['controller' => 'Procedures', 'action' => 'view', $procedurerequirement->procedure->Id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Requirement') ?></th>
                    <td><?= $procedurerequirement->has('requirement') ? $this->Html->link($procedurerequirement->requirement->name, ['controller' => 'Requirements', 'action' => 'view', $procedurerequirement->requirement->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($procedurerequirement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Number') ?></th>
                    <td><?= $this->Number->format($procedurerequirement->item_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified By') ?></th>
                    <td><?= $this->Number->format($procedurerequirement->modified_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($procedurerequirement->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($procedurerequirement->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $procedurerequirement->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Requestrequirements') ?></h4>
                <?php if (!empty($procedurerequirement->requestrequirements)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Value') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Raison') ?></th>
                            <th><?= __('Procedurerequirement Id') ?></th>
                            <th><?= __('Request Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($procedurerequirement->requestrequirements as $requestrequirements) : ?>
                        <tr>
                            <td><?= h($requestrequirements->id) ?></td>
                            <td><?= h($requestrequirements->value) ?></td>
                            <td><?= h($requestrequirements->created) ?></td>
                            <td><?= h($requestrequirements->modified) ?></td>
                            <td><?= h($requestrequirements->status) ?></td>
                            <td><?= h($requestrequirements->raison) ?></td>
                            <td><?= h($requestrequirements->procedurerequirement_id) ?></td>
                            <td><?= h($requestrequirements->request_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Requestrequirements', 'action' => 'view', $requestrequirements->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Requestrequirements', 'action' => 'edit', $requestrequirements->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requestrequirements', 'action' => 'delete', $requestrequirements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestrequirements->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
