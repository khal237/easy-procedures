<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Requirementpropriety> $requirementproprieties
 */
?>
<nav style="--bs-breadcrumb-divider: '>' ; " aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller'=>'requirements', 'action'=>'index'])?>">requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">proprieties</li>
    </ol>
</nav>
<div class="requirementproprieties index content">
        <?= $this->Html->link(__('<i class="zmdi zmdi-plus"></i> Add New'), ['action' => 'add'], ['class' => 'button float-right', 'escape' => false]) ?>
    <h3 class="title-5 m-b-35"><?= __('proprieties') ?></h3>

    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th><?= ('type') ?></th>
                    <th><?= ('name') ?></th>
                    <th><?= ('description') ?></th>
                    <th><?= ('default_value') ?></th>
                    <th><?= ('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requirementproprieties as $requirementpropriety) : ?>
                    <tr>
                        <td><?= h($requirementpropriety->type) ?></td>
                        <td><?= h($requirementpropriety->name) ?></td>
                        <td><?= h($requirementpropriety->description) ?></td>
                        <td><?= h($requirementpropriety->default_value) ?></td>
                        <td><?= h($requirementpropriety->created) ?></td>
                        <td class="actions">
                            <div class="table-data-feature">
                                <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>'), ['action' => 'edit', $requirementpropriety->id], ['class' => 'item', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete', $requirementpropriety->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementpropriety->id), 'class' => 'item', 'escape' => false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>