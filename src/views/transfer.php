<?php

use Bank\App;
use Bank\Controllers\MessagesController;
use Bank\Controllers\WorkController;
use Bank\Controllers\DataController;
use Bank\DB\JsonDb;

require __DIR__.'./top.php';
$uri = explode('/', $_SERVER['REQUEST_URI']); //[0] => /user/5)
$moneyTxt = (substr($user['money'] ?? '€123',3));
$money = (int)str_replace(',','',$moneyTxt) / 100;
$user = DataController::getUserById($uri[2]);
print_r($user ?? 'no User');
$db = new JsonDb('ACC_DATA');
    echo '<pre>';
    echo '<br>';

    for ($i = 0; $i < 10; $i++){

        echo '<br>';
        print_r($db->showAll()[rand(1,1000)]->credit_card ?? $db->showAll()[rand(1,1000)]->credit_card);
    }
?>
    <h1 class="h1_transfer">transfer to</h1>

    <form action="" name="transfer" method="post" class="transfer_form">
        <input name="i" hidden value="<?= $uri[2]?>">
        <label for="cc">credit Card: </label>
        <input name="cc" type="text" class="form-cc">
        <label for="sum">sum: €</label>
        <input name="sum" type="text" class="form-cc">
        <div class="btn-transfer">
            <button type="submit"><strong>transfer</strong></button>
        </div>

    </form>


<?php



require __DIR__.'./bottom.php';
