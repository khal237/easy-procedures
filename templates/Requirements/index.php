<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Requirement> $requirements
 */
?>

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb"  >
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller'=>'Test', 'action'=>'index'])?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Requirements</li>
  </ol>
</nav>
<div class="requirements index content">
        <?= $this->Html->link('<i class="zmdi zmdi-plus"></i> Add New', ['action' => 'add'], ['class' => 'button float-right', 'escape' => false]) ?>
        <h3 class="title-5 m-b-35"><?= __('Requirements') ?></h3>
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th><?= ('name') ?></th>
                    <th><?= ('description') ?></th>
                    <th><?= ('example') ?></th>
                    <th><?= ('created') ?></th>
                    <th><?= ('requirementtype') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requirements as $requirement) : ?>
                    <tr>
                        <td><?= h($requirement->name) ?></td>
                        <td><?= h($requirement->description) ?></td>
                        <td><?= h($requirement->example) ?></td>
                        <td><?= h($requirement->created) ?></td>
                        <td><?= h($requirement->requirementtype->name) ?></td>
                        <td class="actions">
                            <div class="table-data-feature">
                                <?= $this->Html->link(__('<i class="zmdi zmdi-eye"></i>'), ['action' => 'view', $requirement->id], ['class' => 'item', 'escape' => false]) ?>
                                <?= $this->Html->link(__(' <i class="zmdi zmdi-edit"></i>'), ['action' => 'edit', $requirement->id], ['class' => 'item', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id), 'class' => 'item', 'escape' => false]) ?>
                                <?= $this->Html->link(__('<i class="fas fa-ellipsis-v"></i>'), ['controller' => 'requirementproprieties', 'action' => 'index'], ['class' => 'item', 'escape' => false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>