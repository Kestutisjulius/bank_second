<?php
namespace Bank\Controllers;
use Bank\App;

class HomeController
{
    public function index(){
        return App::view('home', ['title' => 'Home', 'messages'=> MessagesController::get()]);
    }
    public function work(){
        return App::view('work', ['title' => 'Work', 'messages'=> MessagesController::get()]);
    }
    public function msg(){
        return App::view('home', ['messages'=> MessagesController::get()]);
    }
}