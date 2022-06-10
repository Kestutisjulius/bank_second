<?php
if (!empty($messages)): ?>
    <div class="show-msg">
        <?php foreach ($messages as $message) : ?>
            <div class="<?=$message['type'] ?>"><?=$message['msg']?></div>
        <?php endforeach ?>
    </div>
<?php endif;