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
        <?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
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
        <?php endif; ?>
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
                                        <br>
                                        <strong>Raison:</strong>
                                        <?= ($requestrequirements->raison) ?>
                                        </br>

                                    <?php elseif ($requestrequirements->status === 'success') : ?>
                                        <p class="card-text float-left">
                                            Status
                                            <span class="badge badge-success"><?= __('success') ?></span>
                                        </p>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="table-data-feature">
                                    <?php if ($requestrequirements->value == null) :  ?>
                                        <a href="<?= $this->Url->build([
                                                        'controller' => 'Requests', 'action' => 'view',
                                                        $requestrequirements->id
                                                    ]); ?>" class="item float-right">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                    <?php elseif ($requestrequirements->value != null) :  ?>
                                        <a href="<?= $this->Url->build('/template/images/' . $requestrequirements->value, ['_full' => true]) ?>" target="_blank" class="item float-right">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
                                        <?= $this->Form->postLink(
                                            __(
                                                '<i class="fa fa-check"></i> '
                                            ),
                                            ['controller' => 'Requests', 'action' => 'approuverequirement', $requestrequirements->id],
                                            ['confirm' => __('Are you sure you want to approve requirement?'), 'class' => 'item', 'escape' => false]
                                        ) ?>
                                        <?= $this->Form->postLink(
                                            __(
                                                '<i class="fa fa-close"></i> '
                                            ),
                                            ['controller' => 'Requests', 'action' => 'rejectrequirement', $requestrequirements->id],
                                            ['confirm' => __('Are you sure you want to reject requirement?'), 'class' => 'item', 'escape' => false]
                                        ) ?>
                                    <?php endif; ?>
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
    <div style="margin-left: 20rem;">
        <div class="button float-left">
            <?= $this->Form->postLink(
                '<button class= "btn btn-success"><i class="fa fa-check-circle"></i> Approud</button>',
                ['controller' => 'Requests', 'action' => 'approudrequest', $request->id],
                ['confirm' => __('Are you sure you want to approve request?'), 'class' => 'button float-right', 'escape' => false]
            ); ?>
        </div>

        <div class="button ml-2 float-left" style="margin-left: 0.5rem;">
            <?= $this->Form->postLink(
                '<button class= "btn btn-danger"><i class="fa fa-times-circle"></i> Reject</button>',
                ['controller' => 'Requests', 'action' => 'rejectrequest', $request->id],
                ['confirm' => __('Are you sure you want to reject request?'), 'class' => 'button float-right', 'escape' => false]
            ) ?>
        </div>
    </div>
<?php endif; ?>