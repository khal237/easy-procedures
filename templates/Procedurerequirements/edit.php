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
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedures', 'action' => 'index']) ?>">procedures</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedurerequirements', 'action' => 'index']) ?>">proprieties</a></li>
        <li class="breadcrumb-item active" aria-current="page">edit <?= h($procedurerequirement->name) ?></li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <legend><?= __('Edit Procedurerequirement') ?></legend>
            </div>
            <div class="column-responsive column-80">
                <div class="procedurerequirements form content">
                    <div class="card-body card-block">
                        <?= $this->Form->create($procedurerequirement) ?>
                        <fieldset>

                            <?php
                            echo $this->Form->control('name', ['class' => 'form-control-success form-control']);
                            echo $this->Form->control('procedure_id', ['options' => $procedures, 'class' => 'form-control-success form-control']);
                            echo $this->Form->control('requirement_id', ['options' => $requirements, 'class' => 'form-control-success form-control']);
                            ?>
                        </fieldset>
                        <div class="card-footer">
                            <?= $this->Form->button(__('Submit')) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>