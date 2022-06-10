<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\Controllers\MessagesController;
class LoginController
{
    public function login(){
        $users = json_decode(file_get_contents(App::PATH.'data/users.json'));
        foreach ($users as $user){
            if (strtolower($_POST['name']) != strtolower($user->name)){
                continue;
            }
            if (md5($_POST['psw']) != $user->psw){
                MessagesController::add('wrong', 'alert');
                return App::redirect();
            } else {
                AuthorityController::authAdd($user);
                MessagesController::add('Hello '.$user->full_name, 'success');
                return App::redirect('work');
            }
        }


    }
}