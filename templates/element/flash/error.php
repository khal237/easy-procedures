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
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    <span class="badge badge-pill badge-danger">error</span>
    <div  onclick="this.classList.add('hidden');"><i class="fa fa-times-circle"></i><?= $message ?></div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>