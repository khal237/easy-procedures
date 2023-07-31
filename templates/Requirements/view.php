<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirement $requirement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Requirement'), ['action' => 'edit', $requirement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Requirement'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Requirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Requirement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="requirements view content">
            <h3><?= h($requirement->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($requirement->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($requirement->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Requirementtype') ?></th>
                    <td><?= $requirement->has('requirementtype') ? $this->Html->link($requirement->requirementtype->name, ['controller' => 'Requirementtypes', 'action' => 'view', $requirement->requirementtype->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($requirement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified By') ?></th>
                    <td><?= $this->Number->format($requirement->modified_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($requirement->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($requirement->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($requirement->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $requirement->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Procedurerequirements') ?></h4>
                <?php if (!empty($requirement->procedurerequirements)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Item Number') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th><?= __('Modified By') ?></th>
                            <th><?= __('Procedure Id') ?></th>
                            <th><?= __('Requirement Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($requirement->procedurerequirements as $procedurerequirements) : ?>
                        <tr>
                            <td><?= h($procedurerequirements->id) ?></td>
                            <td><?= h($procedurerequirements->item_number) ?></td>
                            <td><?= h($procedurerequirements->name) ?></td>
                            <td><?= h($procedurerequirements->created) ?></td>
                            <td><?= h($procedurerequirements->modified) ?></td>
                            <td><?= h($procedurerequirements->deleted) ?></td>
                            <td><?= h($procedurerequirements->modified_by) ?></td>
                            <td><?= h($procedurerequirements->procedure_id) ?></td>
                            <td><?= h($procedurerequirements->requirement_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Procedurerequirements', 'action' => 'view', $procedurerequirements->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Procedurerequirements', 'action' => 'edit', $procedurerequirements->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Procedurerequirements', 'action' => 'delete', $procedurerequirements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $procedurerequirements->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Requirementproprieties') ?></h4>
                <?php if (!empty($requirement->requirementproprieties)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Value') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th><?= __('Requirement Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($requirement->requirementproprieties as $requirementproprieties) : ?>
                        <tr>
                            <td><?= h($requirementproprieties->id) ?></td>
                            <td><?= h($requirementproprieties->type) ?></td>
                            <td><?= h($requirementproprieties->name) ?></td>
                            <td><?= h($requirementproprieties->value) ?></td>
                            <td><?= h($requirementproprieties->created) ?></td>
                            <td><?= h($requirementproprieties->modified) ?></td>
                            <td><?= h($requirementproprieties->deleted) ?></td>
                            <td><?= h($requirementproprieties->requirement_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Requirementproprieties', 'action' => 'view', $requirementproprieties->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Requirementproprieties', 'action' => 'edit', $requirementproprieties->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requirementproprieties', 'action' => 'delete', $requirementproprieties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementproprieties->id)]) ?>
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
