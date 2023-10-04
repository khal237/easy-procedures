<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Request> $requests
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Requests</li>
    </ol>
</nav>
<h3 class="title-5 m-b-35"><?= __('Procedures en cours') ?></h3>
<div class="row">
    <?php foreach ($requests as $request) : ?>
        <div class="col-sm-auto">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= $this->Path->template_path() ?>images/<?= h($request->procedure->image) ?>" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title"><?= h($request->procedure->name) ?></h4>
                    <p class="card-text">Date creation: <?= h($request->procedure->created) ?></p>
                    <p class="card-text"> Status:
                        <?php if ($request->status === 'Draft') : ?>
                            <span class="badge badge-warning">
                                <?= h($request->status) ?>
                            </span>
                        <?php elseif ($request->status === 'pending') : ?>
                            <span class="badge badge-primary">
                                <?= h($request->status) ?>
                            </span>
                        <?php elseif ($request->status === 'rejected') : ?>
                            <span class="badge badge-danger">
                                <?= h($request->status) ?>
                            </span>
                        <?php elseif ($request->status === 'success') : ?>
                            <span class="badge badge-success">
                                <?= h($request->status) ?>
                            </span>
                        <?php endif; ?>
                    </p>
                    <?php if ($request->status === 'Draft' || $request->status === 'pending' || $request->status === 'rejected') : ?>
                        <a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'requirementlist', $request->id]); ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'firstview', $request->id]); ?>" class="btn btn-info">View</a>
                        <?= $this->Form->postLink(__('cancel'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'class' => 'btn btn-danger']) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>