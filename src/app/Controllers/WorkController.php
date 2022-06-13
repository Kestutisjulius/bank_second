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
        return App::view('edit', ['title' => 'Edit', 'user'=> DataController::getUserById($userId)]);
    }
}