<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirementpropriety $requirementpropriety
 * @var \App\Model\Entity\Requirement $requirement
 * @var \Cake\Collection\CollectionInterface|string[] $requirements
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'requirements', 'action' => 'index']) ?>">Requirements</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'requirementproprieties', 'action' => 'index', $requirement->id]) ?>">Proprieties</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add </li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <legend><?= __('Add propriety') ?></legend>
            </div>
            <div class="column-responsive column-80">
                <div class="requirementproprieties form content">
                    <div class="card-body card-block">
                        <?= $this->Form->create($requirementpropriety, ['url' => ['action' => 'add', $requirement->id]]) ?>
                        <?php
                        echo $this->Form->control('name', ['class' => 'form-control-success form-control', 'label' => 'name*']);
                        echo 'type';
                        echo $this->Form->select(h('type'), $options,  ['class' => 'form-control-success form-control']);
                        echo $this->Form->control('description', ['class' => 'form-control-success form-control', 'type' => 'textarea', 'label' => 'description*']);
                        echo $this->Form->control('default_value', ['class' => 'form-control-success form-control', 'label' => 'default value']);
                        ?>
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
    </div>
</div>