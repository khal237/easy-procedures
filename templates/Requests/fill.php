<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 * @var \App\Enum\RequirementTypes REQUIREMENT_TYPES
 */
?>
<nav style="--bs-breadcrumb-divider: '>' ; " aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Procedures', 'action' => 'index']) ?>">Procedure</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'requirementlist', $request->id]) ?>">Requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">Fill requirement</li>
    </ol>
</nav>
<div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-header">
            <legend><?= h($requirement->name) ?></legend>
        </div>
        <div class="card-body card-block">
            <?= $this->Form->create(null, ['enctype' => 'multipart/form-data']) ?>

            <?php if ($requirement->requirementtype_id == 3) : ?>
                <?php foreach ($requirementproprieties as $requirementpropriety) : ?>
                    <?= $this->Form->control($requirementpropriety->name, [
                        'type' => $requirementpropriety->type, 
                        'class' => 'form-control-success form-control', 
                        'label' =>$requirementpropriety->label, 
                        'required' => true, 
                        'value' => !empty($requestRequirement) 
                            ? $this->Requests->getPropertyValue($requirementpropriety->id, $requestRequirement->requestrequirementproprieties) 
                            : ''  
                    ]); ?>
                <?php endforeach; ?>

            <?php elseif ($requirement->requirementtype_id == 4) : ?>
                <?= $this->Form->control('file', ['type' => 'file', 'class' => 'form-control-success form-control', 'required' => true]); ?>
            <?php endif; ?>

            <div class="card-footers">
                <button type="submit" class="btn btn-primary">
                    <i class="zmdi zmdi-circle-o"></i> Submit
                </button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>