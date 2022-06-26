<?php
namespace Bank\Controllers;
use Bank\App;

class HomeController
{
    public function index(){

        return App::view('home', ['title' => 'Home', 'messages'=> MessagesController::get()]);
    }
    public function work(){
        return App::view('work', ['title' => 'Work', 'accounts'=> DataController::getDB()]);
    }
    public function msg(){
        return App::view('home', ['messages'=> MessagesController::get()]);
    }
    public function transfer(){
        return App::view('transfer', ['title' => 'Transfer', 'messages'=> MessagesController::get()]);
    }
}