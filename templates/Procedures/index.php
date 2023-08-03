<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Procedure> $procedures
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Procedures</li>
    </ol>
</nav>
<div class="procedures index content">
        <?= $this->Html->link(__('<i class="zmdi zmdi-plus"></i> Add New'), ['action' => 'add'], ['class'=>'button float-right', 'escape' => false]) ?>
   
    <h3 class="title-5 m-b-35"><?= __('Procedures') ?></h3>
    <div class="table-responsive">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th><?= ('name') ?></th>
                    <th><?= ('type') ?></th>
                    <th><?= ('status') ?></th>
                    <th><?= ('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($procedures as $procedure) : ?>
                    <tr>
                        <td><?= h($procedure->name) ?></td>
                        <td><?= h($procedure->type) ?></td>
                        <td><?= h($procedure->status) ?></td>
                        <td><?= h($procedure->created) ?></td>
                        <td class="actions">
                            <div class="table-data-feature">
                                <?= $this->Html->link(__('<i class="zmdi zmdi-eye"></i>'), ['action' => 'view',  $procedure->Id], ['class' => 'item', 'escape' => false]) ?>
                                <?= $this->Html->link(__(' <i class="zmdi zmdi-edit"></i>'), ['action' => 'edit',  $procedure->Id], ['class' => 'item', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete',  $procedure->Id], ['confirm' => __('Are you sure you want to delete # {0}?',  $procedure->Id), 'class' => 'item', 'escape' => false]) ?>
                                <?= $this->Html->link(__('<i class="fas fa-ellipsis-v"></i>'), ['controller' => 'procedurerequirements', 'action' => 'index'], ['class' => 'item', 'escape' => false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>