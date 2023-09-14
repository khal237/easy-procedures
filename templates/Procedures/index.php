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
<?php if ($user->id_role == 3) : ?>
    <div class="procedures index content">
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="button float-right">
            <button type="button" class="btn btn-primary">
                <i class="zmdi zmdi-plus"></i> Add New
            </button>
        </a>
        <h3 class="title-5 m-b-35"><?= __('Procedures') ?></h3>
        <div class="table-responsive">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th><?= ('name') ?></th>
                        <th><?= ('type') ?></th>
                        <th><?= ('description') ?></th>
                        <th><?= ('created') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($procedures as $procedure) : ?>
                        <tr>
                            <td><?= h($procedure->name) ?></td>
                            <td><?= h($procedure->type) ?></td>
                            <td><?= h($procedure->description) ?></td>
                            <td><?= h($procedure->created) ?></td>
                            <td class="actions">
                                <div class="table-data-feature">
                                    <?= $this->Html->link(__('<i class="zmdi zmdi-eye"></i>'), ['action' => 'view', $procedure->id], ['class' => 'item', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>'), ['action' => 'edit', $procedure->id], ['class' => 'item', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete', $procedure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $procedure->id), 'class' => 'item', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fas fa-ellipsis-v"></i>'), ['controller' => 'procedurerequirements', 'action' => 'index', $procedure->id], ['class' => 'item', 'escape' => false]) ?>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<?php if ($user->id_role == 1) : ?>
    <h3 class="title-5 m-b-35"><?= __('Procedures') ?></h3>
    <div class="row">
        <?php foreach ($procedures as $procedure) : ?>
            <div class="col-sm-auto">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $this->Path->template_path() ?>images/<?= h($procedure->image) ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?= h($procedure->name) ?></h4>
                        <p class="card-text"></p>
                        <a href="<?= $this->Url->build(['controller' => 'procedurerequirements', 'action' => 'details' ,$procedure->id]); ?>" class="btn btn-primary">Go Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>