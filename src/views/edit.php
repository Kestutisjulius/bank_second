<?php

use Bank\App;
use Bank\Controllers\WorkController;
use Bank\Controllers\DataController;
use Bank\Controllers\ExchangesController;
use Bank\Services\Cache;
require __DIR__.'./top.php';
$uri = explode('/', $_SERVER['REQUEST_URI']); //[0] => /user/5)
$moneyTxt = (substr($user['money'],3));
$money = (int)str_replace(',','',$moneyTxt) / 100;
//session_start();
$cache = new Cache();
$output = $cache->get();
    $_SESSION['visual'] = 'CACHE';
    if (null === $output){
    $_SESSION['visual'] = 'LIVE';
    $output = ExchangesController::conversation($money ?? 1,'EUR' ?? 'USD', $user['currency_code']);
    $cache->set($output);
    }
?>
    <div class="container">
        <div class="login">
            <img src="<?= $user['avatar'] ?? 'no name'?>">
            <h1 class="h1"><?= $user['first_name'] ?? 'no name'?></h1>
            <form name="edit" method="post" action="<?= App::url('editedView')?>">
                <input name="id" type="number" value="<?= $user['id'] ?? 'no id'?>" hidden>
                <label for="fname">first name: </label>
                <input name="fname" type="text" class="form-control" value="<?= $user['first_name'] ?? 'no name'?>">
                <label for="lname">last name: </label>
                <input name="lname" type="text" class="form-control" value="<?= $user['last_name'] ?? 'no name'?>">
                <label for="email">email: </label>
                <input name="email" type="email" class="form-control" value="<?= $user['email'] ?? 'no name'?>">
                <label for="ip">ip address: </label>
                <input name="ip" type="text" class="form-control" value="<?= $user['ip_address'] ?? 'no name'?>">
                <label for="cc">credit Card: </label>
                <input name="cc" type="text" class="form-control" value="<?= $user['credit_card'] ?? 'no name'?>">
                <label for="currency">currency: </label>
                <input name="currency" type="txt" class="form-control" value="<?= $user['currency'] ?? 'no name'?>">
                <label for="ccc">currency code: </label>
                <input name="ccc" type="txt" class="form-control" value="<?= $user['currency_code'] ?? 'no name'?>">
                <div class="fundInEur"><strong>have: <?= $user['money'].' Euro'?> and <?= $output ?> in <?= $user['currency']?></strong></div>
                <div style="color: blue; margin-left: 200px;"><?= $_SESSION['visual']?></div>
                <div class="btn-login">
                    <button type="submit"><strong>save</strong></button>
                </div>
                <input type="hidden" name="csrf" value="<?=App::csrf()?>">
            </form>
        </div>
    </div>


<?php
    unset ($_SESSION['visual']);
require __DIR__.'./bottom.php';

