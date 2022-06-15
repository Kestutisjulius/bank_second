<?php

use Bank\App;
use Bank\Controllers\DataController;

require __DIR__.'./top.php';
$uri = explode('/', $_SERVER['REQUEST_URI']);
$user = DataController::getUserById($_POST['id']);
$user['first_name'] = $_POST['fname'];
$user['last_name'] = $_POST['lname'];
$user['email'] = $_POST['email'];
$user['ip_address'] = $_POST['ip'];
$user['credit_card'] = $_POST['cc'];
$user['currency'] = $_POST['currency'];
$user['currency_code'] = $_POST['ccc'];
DataController::saveUser($_POST['id'], $user);
App::redirect('work');
require __DIR__.'./bottom.php';
