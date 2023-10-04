<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Requests</li>
    </ol>
</nav>


<div class="requests index content">
    <h3 class="title-5 m-b-35"><?= __('Requests') ?></h3>
    <div class="float-left">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Requests', 'action' => 'request'], 'type' => 'get']) ?>
        <input class="au-input" type="text" name="search" placeholder="Search by name of user" value="<?= $this->request->getQuery('search') ?>" />
        <button class="btn btn-primary" type="submit">
            <i class="zmdi zmdi-search"></i>
        </button>
        <?= $this->Form->end() ?>
    </div>
    <div class="float-right" style="margin-left: 20rem;">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Requests', 'action' => 'request'], 'type' => 'get']) ?>
        <div class="rs-select2--light rs-select2--md">
            <select class="js-select2" name="status" onchange="submitFilterForm()">
                <option value="" <?= (!$this->request->getQuery('status')) ? 'selected' : '' ?>>
                    All requests
                </option>
                <option value="rejected" <?= ($this->request->getQuery('status') === 'rejected') ? 'selected' : '' ?>>
                    <a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'request', '?' => ['status' => 'rejected']]) ?>">rejected</a>
                </option>
                <option value="success" <?= ($this->request->getQuery('status') === 'success') ? 'selected' : '' ?>>
                    <a href="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'request', '?' => ['status' => 'success']]) ?>">success</a>
                </option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="float-right" style="margin-right: 10rem;">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-filter"></i>
            </button>
        </div>
        <?= $this->Form->end() ?>
    </div>


    <div class="table-responsive">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th><?= h('user name') ?></th>
                    <th><?= h('procedure') ?></th>
                    <th><?= h('last update') ?></th>
                    <th><?= h('status') ?></th>
                    <th class="actions"><?= h('Action') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request) : ?>
                    <tr>
                        <td><?= h($request->user->name) ?></td>
                        <td><?= h($request->procedure->name) ?></td>
                        <td><?= h($request->modified) ?></td>
                        <?php if ($request->status === 'pending') : ?>
                            <td><?= h($request->status) ?></td>
                        <?php elseif ($request->status === 'rejected') : ?>
                            <td class="denied"><?= h($request->status) ?></td>
                        <?php elseif ($request->status === 'success') : ?>
                            <td class="process"><?= h($request->status) ?></td>
                        <?php endif; ?>
                        <td class="actions">
                            <div class="table-data-feature">
                                <?= $this->Html->link(__('<i class="zmdi zmdi-eye"></i>'), ['action' => 'firstview', $request->id], ['class' => 'item', 'escape' => false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if ($requests->isEmpty()) : ?>
                    <tr>
                        <td colspan="5">No matching requests found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>