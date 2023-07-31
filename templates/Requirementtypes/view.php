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
            <?= $this->Html->link(__('Edit Requirementtype'), ['action' => 'edit', $requirementtype->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Requirementtype'), ['action' => 'delete', $requirementtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementtype->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Requirementtypes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Requirementtype'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="requirementtypes view content">
            <h3><?= h($requirementtype->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($requirementtype->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($requirementtype->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($requirementtype->Description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($requirementtype->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($requirementtype->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($requirementtype->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $requirementtype->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Requirements') ?></h4>
                <?php if (!empty($requirementtype->requirements)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th><?= __('Modified By') ?></th>
                            <th><?= __('Requirementtype Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($requirementtype->requirements as $requirements) : ?>
                        <tr>
                            <td><?= h($requirements->id) ?></td>
                            <td><?= h($requirements->name) ?></td>
                            <td><?= h($requirements->status) ?></td>
                            <td><?= h($requirements->date) ?></td>
                            <td><?= h($requirements->created) ?></td>
                            <td><?= h($requirements->modified) ?></td>
                            <td><?= h($requirements->deleted) ?></td>
                            <td><?= h($requirements->modified_by) ?></td>
                            <td><?= h($requirements->requirementtype_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Requirements', 'action' => 'view', $requirements->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Requirements', 'action' => 'edit', $requirements->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requirements', 'action' => 'delete', $requirements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirements->id)]) ?>
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
