<?php

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
    <span class="badge badge-pill badge-warning">warning</span>
    <div  onclick="this.classList.add('hidden');"><i class="fa fa-lightbulb"></i><?= $message ?></div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>