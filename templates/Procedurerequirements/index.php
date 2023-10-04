<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Procedure $procedure
 * @var iterable<\App\Model\Entity\Procedurerequirement> $procedurerequirements
 */
?>
<?php if ($user->id_role == 3) : ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedures', 'action' => 'index']) ?>">Procedures</a></li>
            <li class="breadcrumb-item active" aria-current="page">Proprieties</li>
        </ol>
    </nav>
    <div class="procedurerequirements index content">

        <div class="button float-right">
            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal">
                <i class="zmdi zmdi-plus"></i> Add New
            </button>
        </div>
        <h3 class="title-5 m-b-35"><?= __('procedure requirement of') ?> <?= $procedure->name ?></h3>
        <div class="table-responsive">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th><?= ('requirement') ?></th>
                        <th><?= ('created') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($procedurerequirements as $procedurerequirement) : ?>
                        <?php if($procedurerequirement->deleted == 0):?>
                        <tr>
                            <td><?= h($procedurerequirement->requirement->name) ?></td>
                            <td><?= h($procedurerequirement->created) ?></td>
                            <td class="actions">
                                <div class="table-data-feature">
                                    <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete"></i>'), ['action' => 'delete',  $procedurerequirement->id], ['confirm' => __('Are you sure you want to delete # {0}?',  $procedurerequirement->id), 'class' => 'item', 'escape' => false]) ?>
                                </div>
                            </td>
                        </tr>
                        <?php endif;?>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- modal small -->
    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Add requirement on procedure </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $this->Form->create() ?>

                    <fieldset>
                        <?php
                        echo $this->Form->control('requirement_id', ['options' => $requirements, 'multiple' => true, 'label' => 'requirement', 'class' => 'form-control-success form-control', 'label' => 'requirement*']);
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
    <!-- end modal small -->
<?php endif; ?>
<?php if ($user->id_role == 1) : ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedures', 'action' => 'index']) ?>">Procedures</a></li>
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedures', 'action' => 'description', $procedure->id]) ?>">Description</a></li>
            <li class="breadcrumb-item active" aria-current="page">Requirement</li>
        </ol>
    </nav>
    <div class="row">
        <?php foreach ($procedurerequirements as $procedurerequirement) : ?>
            <div class="col-lg-auto">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $this->Path->template_path() ?>images/remplir.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"> <?= h($procedurerequirement->requirement->name) ?></h5>
                        <p class="card-text"><?= h($procedurerequirement->requirement->description) ?></p>
                        <a href="<?= $this->Url->build(['controller' => 'requirementproprieties', 'action' => 'index', $procedurerequirement->requirement->id]); ?>" class="btn btn-primary">full here</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>