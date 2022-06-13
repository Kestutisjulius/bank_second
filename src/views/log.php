<?php
use Bank\App;
use Bank\Controllers\AuthorityController;
?>
<?php if (AuthorityController::auth()) : ?>
<div class="authority">
    <span><?=AuthorityController::authName()?></span>
    <form action="<?= App::url('logout')?>" method="post">
        <button type="submit">Logout</button>
    </form>
</div>
<?php endif ?>


