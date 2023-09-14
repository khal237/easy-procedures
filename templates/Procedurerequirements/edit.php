<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Procedurerequirement $procedurerequirement
 * @var string[]|\Cake\Collection\CollectionInterface $procedures
 * @var string[]|\Cake\Collection\CollectionInterface $requirements
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedures', 'action' => 'index']) ?>">Procedures</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedurerequirements', 'action' => 'index', $procedure->id]) ?>">Proprieties</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit <?= h($procedurerequirement->name) ?></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <legend><?= __('Edit procedure requirement') ?></legend>
            </div>
            <div class="column-responsive column-80">
                <div class="procedurerequirements form content">
                    <div class="card-body card-block">
                        <?= $this->Form->create($procedurerequirement) ?>
                        <fieldset>

                            <?php
                            echo $this->Form->control('requirement_id', ['options' => $requirements, 'class' => 'form-control-success form-control', 'label' => 'requirement*']);
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
    </div>
</div>