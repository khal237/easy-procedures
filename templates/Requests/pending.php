<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Test', 'action' => 'index']) ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Requests</li>
    </ol>
</nav>


<div class="requests index content">
    <h3 class="title-5 m-b-35"><?= __('Requests') ?></h3>
    <div>
        <form class="form-header" action="" method="POST">
            <input class="au-input " type="text" name="search" placeholder="Search for datas &amp; reports..." />
            <button class="au-btn--submit" type="submit">
                <i class="zmdi zmdi-search"></i>
            </button>
        </form>
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
                    <?php if ($request->status === 'pending' ) : ?>
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
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>