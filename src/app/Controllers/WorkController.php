<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\Controllers\DataController;
use Bank\DB\JsonDb;

class WorkController
{
    public static function allAccounts(){

        return App::view('work', ['title' => 'Work', 'accounts'=> DataController::getDB(), 'messages' => MessagesController::get()]);
    }
    public static function allAccountsApi(): void
    {
        echo json_encode(DataController::getDB()->showAll());
    }
    public static function deleteUserApi($userId){

            DataController::deleteUserById($userId);
    }
    public static function editApi($id){

        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, 1);
         DataController::getDB()->update($id, $data);
    }
    public static function createApi(): void
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, 1);
        DataController::createRecord($data);
    }

    public static function user($userId){
        if (AuthorityController::auth()){
        return App::view('edit', ['title' => 'Edit', 'user'=> DataController::getUserById($userId)]);
        }
         App::redirect();
    }

    public static function transfer($userId){
        if (AuthorityController::auth()){
        return App::view('transfer', ['title' => 'transfer', 'user'=> DataController::getUserById($userId), 'messages'=> MessagesController::get()]);
        }
         App::redirect();
    }
    public static function transferComplete(){

    foreach (DataController::getDB()->showAll() as $value){
        if ($value->credit_card == $_POST['cc']){
            $toUser = $value;
        }
    }
        $user = DataController::getUserById($_POST['i']);
        $toUser = (array)$toUser;
        $moneyTxt = (substr($user['money'] ?? '€123',3));
        $money = (int)str_replace(',','',$moneyTxt) / 100;
        $moneyToUser = (substr($toUser['money'] ?? '€123',3));
        $moneyTo = (int)str_replace(',','',$moneyToUser) / 100;
        $money -= $_POST['sum'];
        $moneyTo += $_POST['sum'];
        $user['money'] = '€'."$money";
        $toUser['money'] = '€'."$moneyTo";
        DataController::saveUser($user['id'], $user);
        DataController::saveUser($toUser['id'], $toUser);
        MessagesController::add('All success', 'success');
        return (new HomeController())->transfer();
    }

    public static function edit(){
        return App::view('editedView', ['title' => 'Edited']);
    }
    public static function deleteUser($userId){
        $user = DataController::getUserById($userId);
        if (AuthorityController::auth() && Conditions::haveMoney($userId)) {
            DataController::deleteUserById($userId);
             App::redirect('work');
        } else {
            MessagesController::add($user['first_name'].' '.'still have money', 'alert');
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