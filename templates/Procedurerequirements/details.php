<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Procedure $procedure
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Procedures', 'action' => 'index']) ?>">Procedures</a></li>
        <li class="breadcrumb-item active" aria-current="page">Details</li>
    </ol>
</nav>


<h2 class="title-2 m-b-35"><?= __('Details of') ?> <?= h($procedure->name) ?></h2>
<div class="col-lg-10 md-auto">
    <div class="card border border-primary">
        <div class="card-body">
            <h3>description</h3>
            <p class="card-text">
                <?= h($procedure->description) ?>
            </p>
            <h3>Requirement-list</h3>
            <?php $i = 1; ?>
            <div id="accordion">
                <div class="card">
                    <?php foreach ($procedurerequirements as $procedurerequirement) : ?>
                        <div class="card-header" id="heading<?= $i ?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $i ?>" aria-expanded="false" aria-controls="collapse">
                                    <?= h($procedurerequirement->requirement->name) ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse<?= $i ?>" class="collapse" aria-labelledby="heading<?= $i ?>"  aria-expanded="false" data-parent="#accordion">
                            <div class="card-body">
                                <?= h($procedurerequirement->requirement->description) ?>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?= $this->Form->postLink(__('<button type="button" class="btn btn-primary">
                    fill here
                </button>'), ['controller' => 'Requests', 'action' => 'add',  $procedure->id], ['class' => "button float-right", 'escape' => false]) ?>

        </div>
    </div>
</div>