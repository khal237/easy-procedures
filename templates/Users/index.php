<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agent list</li>
    </ol>
</nav>
<div class="users index content">
    <div class="button float-right">
        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal">
            <i class="zmdi zmdi-plus"></i> Add New
        </button>
    </div>
    <h3 class="title-5 m-b-35"><?= __('Users Agents') ?></h3>
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
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= h($user->name) ?></td>
                        <td><?= h($user->surname) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= $this->Number->format($user->phonenumber) ?></td>
                        <td><?= h($user->created) ?></td>
                        <td class="actions">
                            <div class="table-data-feature">
                                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'item', 'escape' => false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    </div>
</div>
</div>
</div>
</div>
<!-- modal small -->
<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Add properties of requirements</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->Form->create() ?>

                <fieldset>
                    <?php
                      echo $this->Form->control('name', ['class' => 'form-control-success form-control']);
                      echo $this->Form->control('surname', ['class' => 'form-control-success form-control']);
                      echo $this->Form->control('email', ['class' => 'form-control-success form-control']);
                      echo $this->Form->control('phonenumber', ['class' => 'form-control-success form-control']);
                      echo $this->Form->control('password', ['class' => 'form-control-success form-control']);
                    ?>
                </fieldset>
                <div class="card-footers">
                    <button type="submit" class="btn btn-primary">
                        <i class="zmdi zmdi-circle-o"></i> Submit
                    </button>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<!-- end modal small -->