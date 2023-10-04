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
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'firstview', $requestrequirement->request_id]) ?>">firstview</a></li>
            <li class="breadcrumb-item active" aria-current="page">View information</li>
        </ol>
    </nav>
<?php endif; ?>
<?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'request']) ?>">Requests</a></li>
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'firstview', $requestrequirement->request_id]) ?>">firstview</a></li>
            <li class="breadcrumb-item active" aria-current="page">View information</li>
        </ol>
    </nav>
<?php endif; ?>
<h3 class="title-3 m-b-35"><?= __(' vue sur le requirement') ?></h3>

<div class="row">
    <?php if (!empty($requestrequirement)) : ?>
        <div class="col-lg-8 m-auto">
            <h3><?= h($requestrequirement->procedurerequirement->requirement->name) ?></h3>
            <?php if ($requestrequirement->value == null) : ?>
                <?php foreach ($requestrequirement->requestrequirementproprieties as $requestrequirementpropriety) : ?>
                    <table class=" table table-data3">
                        <tr>
                            <td><?= h($requestrequirementpropriety->requirementpropriety->name) ?></td>
                            <td class="text-right"><?= h($requestrequirementpropriety->value) ?></td>
                        </tr>
                    </table>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if ($user->id_role == 2 || $user->id_role == 3) : ?>
        <?php if ($requestrequirement->status === 'pending') : ?>
            <div class="col-lg-5" style="margin-top: 1rem;">
                <div class="button ml-2 float-left">
                    <?= $this->Form->postLink(
                        __(
                            '<button type="button" class="btn btn-success"> <i class="fa fa-check"></i> approud</button>'
                        ),
                        ['controller' => 'Requests', 'action' => 'approuverequirement', $requestrequirement->id],
                        ['confirm' => __('Are you sure you want to approve requirement?'), 'escape' => false]
                    ) ?>
                </div>
                <div class="button ml-2 float-left" style="margin-left: 0.5rem;">
                    <?= $this->Form->postLink(
                        __(
                            '<button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> reject</button>'
                        ),
                        ['controller' => 'Requests', 'action' => 'rejectrequirement', $requestrequirement->id],
                        ['confirm' => __('Are you sure you want to reject requirement?'), 'escape' => false]
                    ) ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>