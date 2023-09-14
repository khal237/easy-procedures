<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<?php if ($user->id_role == 1) : ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'index']) ?>">my procedure</a></li>
            <li class="breadcrumb-item active" aria-current="page">View information </li>
        </ol>
    </nav>
<?php endif; ?>
<?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'request']) ?>">Requests</a></li>
            <li class="breadcrumb-item active" aria-current="page">View information of <?= h($request->procedure->name) ?></li>
        </ol>
    </nav>
<?php endif; ?>
<div class="row">
    <h3 class="title-5 m-b-35"><?= __(' information  soumit sur la procedure') ?> <?= h($request->procedure->name) ?> <?= __('de') ?> <?= h($request->user->name) ?></h3>
    <div class="col-md-4 order-md-2">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">information <?= h($request->user->name) ?> </strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" src="<?= $this->Path->template_path() ?>images/icon/avatar-01.png" alt="Card image cap">
                    <h5 class="text-sm-center mt-2 mb-1"><?= h($request->user->name) ?> <?= h($request->user->surname) ?></h5>
                    <div class="location text-sm-center">
                        <i class="fa fa-link"></i> <?= h($request->user->email) ?>
                    </div>
                    <div class="location text-sm-center">
                        <i class="fa fa-phone"></i> <?= h($request->user->phonenumber) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 order-md-1">
        <div class="card">
            <div class="card-body">
                <?php if (!empty($request->requestrequirements)) : ?>
                    <?php foreach ($request->requestrequirements as $requestrequirements) : ?>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><?= h($requestrequirements->procedurerequirement->requirement->name) ?></h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?= h($requestrequirements->procedurerequirement->requirement->description) ?></p>
                            </div>
                            <div class="card-footer">
                                <?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
                                    <?php if ($requestrequirements->status === 'pending') : ?>
                                        <p class="card-text float-left">
                                            Status
                                            <span class="badge badge-primary"><?= __('pending') ?></span>
                                        </p>
                                    <?php elseif ($requestrequirements->status === 'rejected') : ?>
                                        <p class="card-text float-left">
                                            Status
                                            <span class="badge badge-danger"><?= __('rejected') ?></span>
                                        </p>
                                    <?php elseif ($requestrequirements->status === 'success') : ?>
                                        <p class="card-text float-left">
                                            Status
                                            <span class="badge badge-success"><?= __('success') ?></span>
                                        </p>
                                    <?php endif; ?>
                                <?php endif;?>
                                <div class="table-data-feature">
                                    <a href="<?= $this->Url->build([
                                                    'controller' => 'Requests', 'action' => 'view',
                                                    $requestrequirements->id
                                                ]); ?>" class="item float-right">
                                        <i class="zmdi zmdi-eye"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
    <div class="button float-left">
        <?= $this->Form->postLink(
            '<button class= "btn btn-primary"><i class="fa fa-check-circle"></i> Approud</button>',
            ['controller' => 'Requests', 'action' => 'statustwo', $request->id],
            ['class' => 'button float-right', 'escape' => false]
        ); ?>
    </div>

    <div class="button ml-2 float-left" style="margin-left: 0.5rem;">
        <?= $this->Form->postLink(
            '<button class= "btn btn-primary"><i class="fa fa-times-circle"></i> Rejet</button>',
            ['controller' => 'Requests', 'action' => 'statustree', $request->id],
            ['class' => 'button float-right', 'escape' => false]
        ) ?>
    </div>
<?php endif; ?>