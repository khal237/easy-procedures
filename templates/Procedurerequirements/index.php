<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Procedurerequirement> $procedurerequirements
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">proprieties</li>
    </ol>
</nav>
<div class="procedurerequirements index content">
        <?= $this->Html->link(__('<i class="zmdi zmdi-plus"></i> Add New'), ['action' => 'add'], ['class' => 'button float-right', 'escape' => false]) ?>
    <h3 class="title-5 m-b-35"><?= __('Procedurerequirements') ?></h3>
    <div class="table-responsive">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th><?=('name') ?></th>
                    <th><?=('created') ?></th>
                    <th><?=('procedure_id') ?></th>
                    <th><?=('requirement_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($procedurerequirements as $procedurerequirement) : ?>
                    <tr>
                        <td><?= h($procedurerequirement->name) ?></td>
                        <td><?= h($procedurerequirement->created) ?></td>
                        <td><?=  h($procedurerequirement->procedure->name) ?></td>
                        <td><?=  h($procedurerequirement->requirement->name) ?></td>
                        <td class="actions">
                            <div class="table-data-feature">
                                <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>'), ['action' => 'edit', $procedurerequirement->id], ['class' => 'item', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete',  $procedurerequirement->Id], ['confirm' => __('Are you sure you want to delete # {0}?',  $procedurerequirement->Id), 'class' => 'item', 'escape' => false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>