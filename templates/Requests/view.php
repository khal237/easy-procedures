<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Request'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="requests view content">
            <h3><?= h($request->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($request->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($request->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $request->has('user') ? $this->Html->link($request->user->name, ['controller' => 'Users', 'action' => 'view', $request->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Procedure') ?></th>
                    <td><?= $request->has('procedure') ? $this->Html->link($request->procedure->name, ['controller' => 'Procedures', 'action' => 'view', $request->procedure->Id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($request->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified By') ?></th>
                    <td><?= $this->Number->format($request->modified_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($request->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($request->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $request->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Requestrequirements') ?></h4>
                <?php if (!empty($request->requestrequirements)) : ?>
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
                        <?php foreach ($request->requestrequirements as $requestrequirements) : ?>
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
