<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirement $requirement
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'requirements', 'action' => 'index']) ?>">Requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">View <?= h($requirement->name) ?></li>
    </ol>
</nav>
<div class="row">
    <div class="requirements view content">
        <div class="col-md-6">
            <h3><?= h($requirement->name) ?></h3>
            <table class='table table-data3'>
                <tr>
                    <td><strong><?= __('Name') ?></strong></td>
                    <td class="text-right"><?= h($requirement->name) ?></td>
                </tr>
                <tr>
                    <td><strong><?= __('Description') ?></strong></td>
                    <td class="text-right"><?= h($requirement->description) ?></td>
                </tr>
                <tr>
                    <td><strong><?= __('Example') ?></strong></td>
                    <td class="text-right"><?= h($requirement->example) ?></td>
                </tr>
                <tr>
                    <td><strong><?= __('Requirementtype') ?></strong></td>
                    <td class="text-right"><?= $requirement->requirementtype->name ?></td>
                </tr>
                <tr>
                    <td><strong><?= __('Created') ?></strong></td>
                    <td class="text-right"><?= h($requirement->created) ?></td>
                </tr>
                <tr>
                    <td><strong><?= __('Modified') ?></strong></td>
                    <td class="text-right"><?= h($requirement->modified) ?></td>
                </tr>
                <tr>
                    <td>
                        <aside class="column">
                            <div class="side-nav">
                                <div class="table-data-feature">
                                    <div class="col-2">
                                        <?= $this->Html->link(__('<i class="zmdi zmdi-edit"></i>Edit '), ['action' => 'edit', $requirement->id], ['class' => 'btn btn-primary', 'escape' => false]) ?>
                                    </div>
                                    <div class="col-2 offset-2">
                                        <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>Delete '), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id), 'class' => 'btn btn-danger', 'escape' => false]) ?>
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
    <div class="col-md-6 ">
        <?php if (!empty($requirement->requirementproprieties)) : ?>
            <div class="card">
                <div class="card-header">
                    <legend><?= __('Preview') ?></legend>
                </div>
                <div class="card-body card-block">
                    <?= $this->Form->create() ?>
                    <?php foreach ($requirement->requirementproprieties as $requirementproprieties) : ?>
                        <?php if ($requirementproprieties->deleted == 0) : ?>
                            <?= $this->Form->control($requirementproprieties->name, ['type' => $requirementproprieties->type, 'placeholder' => $requirementproprieties->description, 'class' => 'form-control-success form-control', 'disabled' => true]); ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>

        <?php endif; ?>
    </div>

    <div class="related">
        <?php if (!empty($requirement->requirementproprieties)) : ?>
            <h4><?= __('proprieties') ?></h4>
            <div class="table-responsive">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Default Value') ?></th>
                            <th><?= __('Created') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requirement->requirementproprieties as $requirementproprieties) : ?>
                           
                                <tr>
                                    <td><?= h($requirementproprieties->name) ?></td>
                                    <td><?= h($requirementproprieties->type) ?></td>
                                    <td><?= h($requirementproprieties->description) ?></td>
                                    <td><?= h($requirementproprieties->default_value) ?></td>
                                    <td><?= h($requirementproprieties->created) ?></td>
                                </tr>
                          
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>