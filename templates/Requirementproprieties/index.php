<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirement $requirement
 * @var iterable<\App\Model\Entity\Requirementpropriety> $requirementproprieties
 */
?>
<nav style="--bs-breadcrumb-divider: '>' ; " aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'requirements', 'action' => 'index', $requirement->id]) ?>">Requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">proprieties</li>
    </ol>
</nav>

<div class="requirementproprieties index content">
    <div class="button float-right">
        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal">
            <i class="zmdi zmdi-plus"></i> Add New
        </button>
</div>
    <h3 class="title-5 m-b-35"><?= __('proprieties of') ?> <?= $requirement->name ?></h3>

    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th><?= ('name') ?></th>
                    <th><?= ('type') ?></th>
                    <th><?= ('label') ?></th>
                    <th><?= ('description') ?></th>
                    <th><?= ('default value') ?></th>
                    <th><?= ('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requirementproprieties as $requirementpropriety) : ?>
                    <tr>
                        <td><?= h($requirementpropriety->name) ?></td>
                        <td><?= h($requirementpropriety->type) ?></td>
                        <td><?= h($requirementpropriety->label) ?></td>
                        <td><?= h($requirementpropriety->description) ?></td>
                        <td><?= h($requirementpropriety->default_value) ?></td>
                        <td><?= h($requirementpropriety->created) ?></td>
                        <td class="actions">
                            <div class="table-data-feature">
                                <?= $this->Html->link(__(' <i class="zmdi zmdi-edit"></i>'), ['action' => 'edit', $requirementpropriety->id], ['class' => 'item', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete', $requirementpropriety->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementpropriety->id), 'class' => 'item', 'escape' => false]) ?>
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
                    echo $this->Form->control('name', ['class' => 'form-control-success form-control', 'label' => 'name*']);
                    echo 'type';
                    echo $this->Form->select(h('type'), $options,  ['class' => 'form-control-success form-control']);
                    echo $this->Form->control('label', ['class' => 'form-control-success form-control', 'label' => 'label*']);
                    echo $this->Form->control('description', ['class' => 'form-control-success form-control', 'type' => 'textarea', 'label' => 'description*']);
                    echo $this->Form->control('default_value', ['class' => 'form-control-success form-control', 'label' => 'default value']);
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