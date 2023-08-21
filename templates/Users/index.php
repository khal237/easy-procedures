<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">admin list</li>
    </ol>
</nav>
<div class="users index content">
    <?= $this->Html->link(__('<i class="zmdi zmdi-plus"></i>New Admin'), ['action' => 'add'], ['class' => 'button float-right', 'escape'=>false]) ?>
    <h3 class="title-5 m-b-35"><?= __('Users Administrator') ?></h3>
    <div class="table-responsive">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th><?= ('name') ?></th>
                    <th><?= ('surname') ?></th>
                    <th><?= ('email') ?></th>
                    <th><?= ('phonenumber') ?></th>
                    <th><?= ('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->surname) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= $this->Number->format($user->phonenumber) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td class="actions">
                    <div class="table-data-feature">
                        <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>'), ['action' => 'edit', $user->id], ['class' => 'item', 'escape' => false]) ?>
                        <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'item', 'escape' => false]) ?>
                    </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
