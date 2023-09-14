    <?php
    /**
     * @var \App\View\AppView $this
     * @var \App\Model\Entity\Procedure $procedure
     * @var \App\View\Helper\RequestsHelper $Requests
     */
    ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'test', 'action' => 'index']) ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'procedures', 'action' => 'index']) ?>">Procedures</a></li>
            <li class="breadcrumb-item active" aria-current="page">Requirement</li>
        </ol>
    </nav>
    <h3 class="title-5 m-b-35"><?= __('Requirements') ?></h3>
    <div class="row">
        <?php foreach ($procedurerequirements as $procedurerequirement) : ?>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><?= h($procedurerequirement->requirement->name) ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= h($procedurerequirement->requirement->description) ?></p>
                    </div>
                    <div class="card-footer">
                        <?php
                        $requestRequirement = $this->Requests->getRequestRequirement(
                            $procedurerequirement->id,
                            $request->requestrequirements
                        );

                        if (is_null($requestRequirement)) :
                        ?>
                            <p class="card-text float-left">
                                Status
                                <span class="badge badge-secondary"><?= __("Not fill") ?></span>
                            </p>

                            <a href="<?= $this->Url->build([
                                            'controller' => 'Requests', 'action' => 'fill',
                                            $procedurerequirement->id, $request->id
                                        ]); ?>" class="btn btn-primary float-right">
                                <i class="fa fa- mr-1"></i>
                                <?= __("Fill") ?>
                            </a>
                            <?php else : if ($requestRequirement->status == 'pending') { ?>
                                <p class="card-text float-left">
                                    Status
                                    <span class="badge badge-primary"><?= __("pending") ?></span>
                                </p>
                                <a href="<?= $this->Url->build([
                                                'controller' => 'Requests', 'action' => 'fill',
                                                $procedurerequirement->id, $request->id
                                            ]); ?>" class="btn btn-primary float-right">
                                    <i class="fa fa- mr-1"></i>
                                    <?= __("Edit") ?>
                                </a>
                                <br>
                                last update:
                                <?= ($requestRequirement->modified) ?>
                                </br>
                            <?php } elseif ($requestRequirement->status == 'rejected') { ?>
                                <p class="card-text float-left">
                                    Status:
                                    <span class="badge badge-danger"><?= __("rejected") ?></span>
                                </p>
                                <br>
                                <p class="card-text ">
                                    <strong>Raison:</strong>
                                    <?= ($requestRequirement->raison) ?>
                                </p>
                                </br>

                            <?php } elseif ($requestRequirement->status == 'success') { ?>
                                <p class="card-text float-left">
                                    Status
                                    <span class="badge badge-success"><?= __("success") ?></span>
                                </p>

                        <?php }
                        endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-lg-6 offset-5">
        <?php if ($request->status === 'Draft') : ?>
            <?= $this->Form->postLink(
                __(
                    '<button type="button" class="btn btn-primary"> Request Approbation</button>'
                ),
                ['controller' => 'Requests', 'action' => 'status', $request->id],
                ['escape' => false]
            ) ?>
        <?php elseif ($request->status === 'pending') : ?>
            <?= $this->Form->postLink(
                __(
                    '<button type="button" class="btn btn-primary"> cancel aprobations</button>'
                ),
                ['controller' => 'Requests', 'action' => 'cancelstatus', $request->id],
                ['escape' => false]
            ) ?>
        <?php endif; ?>
    </div>