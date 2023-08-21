<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account</li>
    </ol>
</nav>
<div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class="rounded-circle mx-auto d-block" src="<?= $this->Path->template_path() ?>images/icon/avatar-01.png">
                <h5 class="text-sm-center mt-2 mb-1"><i class="fa fa-user"></i> <?= h($user->name) ?></h5>
                <div class="location text-sm-center">

                </div>
                <div class="row">
                    <div class="column-responsive column-80">
                        <div class="users view content">
                        <div class="cole">
                            <table class="table">
                                <tr>
                                    <th><?= __('Surname') ?></th>
                                    <td><?= h($user->surname) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Email') ?></th>
                                    <td><?= h($user->email) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Phonenumber') ?></th>
                                    <td><?= $this->Number->format($user->phonenumber) ?></td>
                                </tr>
                            </table>
                        </div>
                        <aside class="column">
                            <div class="table-data-feature">
                                <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-primary', 'escape' => false]) ?>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>