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
         App::redirect();
    }
    public static function edit(){
        return App::view('editedView', ['title' => 'Edited']);
    }
    public static function deleteUser($userId){
        if (AuthorityController::auth()) {
            DataController::deleteUserById($userId);
             App::redirect('work');
        }
    }
    public static function create(){
        return App::view('create', ['title' => 'create']);
    }
}