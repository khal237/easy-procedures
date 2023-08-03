<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirementpropriety $requirementpropriety
 */
?>

<div class="row">
    
    <div class="column-responsive column-80">
        <div class="requirementproprieties view content">
            <h3><?= h($requirementpropriety->name) ?></h3>
            <table class="table table-data2">
                <tr>
                    <th><?= __('name') ?></th>
                    <td><?= h($requirementpropriety->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descriotion') ?></th>
                    <td><?= h($requirementpropriety->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= h($requirementpropriety->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Requirement') ?></th>
                    <td><?=  h($requirementpropriety->requirement->name, $requirementpropriety->requirement->id) ?></td>
                </tr>
                <tr>
            </table>
            <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>'), ['action' => 'edit', $requirementpropriety->id], ['class' => 'btn btn-primary', 'escape'=> false]) ?>
            <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete', $requirementpropriety->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementpropriety->id),'class' => 'btn btn-primary', 'escape'=> false]) ?>
            <?= $this->Html->link(__('<i class="zmdi zmdi-plus"></i>'), ['action' => 'add'], ['class' => 'btn btn-primary', 'escape'=> false]) ?>
        </div>
    </aside>
        </div>
    </div>
</div>