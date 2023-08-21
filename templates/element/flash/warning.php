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
<div class="messages">
    <div class="message-warning" onclick="this.classList.add('hidden');"><i class="fa fa-lightbulb"></i><?= $message ?></div>
</div>