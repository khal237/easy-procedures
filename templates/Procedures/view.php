<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Procedure $procedure
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedures', 'action' => 'index']) ?>">Procedures</a></li>
        <li class="breadcrumb-item active" aria-current="page">View <?= h($procedure->name) ?></li>
    </ol>
</nav>
<div class="row">
    <div class="column-responsive column-80">
        <div class="procedures view content">
            <h3><?= h($procedure->name) ?></h3>
            <table class='table table-data3'>
                <tr>
                    <td><strong><?= __('Name') ?></strong></td>
                    <td class="text-right"><?= h($procedure->name) ?></td>
                </tr>
                <tr>
                    <td><strong><?= __('Type') ?></strong></td>
                    <td class="text-right"><?= h($procedure->type) ?></td>
                </tr>
                <tr>
                    <td><strong><?= __('Description') ?></strong></td>
                    <td class="text-right"><?= h($procedure->description) ?></td>
                </tr>
                <tr>
                    <td><strong><?= __('Created') ?></strong></td>
                    <td class="text-right"><?= h($procedure->created) ?></td>
                </tr>
                <tr>
                    <td>
                        <aside class="column">
                            <div class="side-nav">
                                <div class="table-data-feature">
                                    <div class="col-2">
                                        <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>Edit '), ['action' => 'edit', $procedure->id], ['class' => 'btn btn-primary', 'escape' => false]) ?>
                                    </div>
                                    <div class="col-2 offset-2">
                                        <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>Delete '), ['action' => 'delete', $procedure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $procedure->id), 'class' => 'btn btn-danger', 'escape' => false]) ?>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </td>
                    <td></td>
                </tr>

            </table>
        </div>
    </div>
</div>