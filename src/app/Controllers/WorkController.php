<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\Controllers\DataController;
use Bank\DB\JsonDb;

class WorkController
{
    public static function allAccounts(){
        return App::view('work', ['title' => 'Work', 'accounts'=> DataController::getDB()]);
    }
    public static function user($userId){
        if (AuthorityController::auth()){
        return App::view('edit', ['title' => 'Edit', 'user'=> DataController::getUserById($userId)]);
        }
        return App::redirect();
    }
    public static function edit(){
        $user['first_name'] = $_POST['fname'];
        $user['last_name'] = $_POST['lname'];
        $user['email'] = $_POST['email'];
        $user['ip_address'] = $_POST['ip'];
        $user['credit_card'] = $_POST['cc'];
        $user['currency'] = $_POST['currency'];
        $user['currency_code'] = $_POST['ccc'];

        return App::view('editedView', ['title' => 'Edited', 'user'=> DataController::saveUser((int)$_POST['id'], $user)]);
    }
}