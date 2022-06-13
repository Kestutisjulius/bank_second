<?php

use Bank\App;
use Bank\Controllers\WorkController;
use Bank\Controllers\DataController;
use Bank\DB\JsonDb;

require __DIR__.'./top.php';
?>
    <h1>all accounts</h1>
<div class="action-line">
    <form name="find" action="find" method="get">
        <label for="find">Find: </label>
        <input name="find">
        <button name="find" type="submit">Find</button>
    </form>
    <a href="create.php">Create</a>
</div>
<div class="work">
<?php
$db = (array)($accounts ?? ['empty']);
foreach ($db as $key => $value){

    foreach ($value as $r => $user){
?>
    <div class="card">
        <h3><?=$user->first_name ?></h3>
        <img src="<?= $user->avatar?>">
        <span><?= $user->id?></span>
        <h3> <?= $user->gender?></h3>
        <h5><?= $user->email?></h5>
        <h4 class="money">money: <?= $user->money?></h4>
        <a href="<?='http://kbankas.lt/user/'.$user->id?>" class="edit">edit</a>
        <a href="<?='http://kbankas.lt/user/'.$user->id?>" class="delete">delete</a>
    </div>



<?php
    }

}
?></div><?php

require __DIR__.'./bottom.php';