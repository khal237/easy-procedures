<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'request']) ?>">all Requests</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'firstview' ,$requestrequirement->request_id]) ?>">firstview</a></li>
        <li class="breadcrumb-item active" aria-current="page">Raison</li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <legend><?= __('Raison') ?></legend>
            </div>
            <div class="column-responsive column-80">
                <div class="procedures form content">
                    <div class="card-body card-block">
                        <?= $this->Form->create() ?>
                        <?php
                        echo $this->Form->control('raison', ['class' => 'form-control-success form-control', 'type' => 'textarea', 'label' => 'raison*']);
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