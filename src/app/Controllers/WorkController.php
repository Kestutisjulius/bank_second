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
    public static function allAccountsApi(): void
    {
        echo json_encode(DataController::getDB()->showAll());
    }
    public static function deleteUserApi($userId){
            DataController::deleteUserById($userId);
    }

    public static function user($userId){
        if (AuthorityController::auth()){
        return App::view('edit', ['title' => 'Edit', 'user'=> DataController::getUserById($userId)]);
        }
         App::redirect();
    }
    public static function transfer($userId){
        if (AuthorityController::auth()){
        return App::view('transfer', ['title' => 'transfer', 'user'=> DataController::getUserById($userId)]);
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
    public static function createOpen(){
        return App::view('create', ['title' => 'create']);
    }
    public static function create(){
        $user['first_name'] = $_POST['fname'];
        $user['last_name'] = $_POST['lname'];
        $user['email'] = $_POST['email'];
        $user['gender'] = $_POST['gender'] ?? 'unknown';
        $user['ip_address'] = $_POST['ip'];
        $user['credit_card'] = $_POST['cc'];
        $user['currency'] = $_POST['currency'];
        $user['currency_code'] = $_POST['ccc'];
        $user['money'] =  "\u{20ac}".($_POST['money']);
        $user['avatar'] =  ($_POST['avatar']);

        DataController::createRecord($user);
        App::redirect('work');
    }
}