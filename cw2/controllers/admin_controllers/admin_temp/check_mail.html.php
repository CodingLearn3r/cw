<p>Messages from users:</p>
<?php foreach($senders as $sender): ?>
        <h3>From: <?= htmlspecialchars($sender['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
    <br>
        <?php $messages = allMessagesBySender($pdo, $sender['sender']); ?>
        <?php foreach ($messages as $message): ?>
        <p><?= nl2br(htmlspecialchars($message['content'], ENT_QUOTES, 'UTF-8')); ?>
        <br>
        <span class="message-date">Date_time: <?= htmlspecialchars($message['date_time'], ENT_QUOTES, 'UTF-8'); ?></span>
        </p>
        <br>
        <?php endforeach; ?>
<?php endforeach; ?>

    
    