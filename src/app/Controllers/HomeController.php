<?php
namespace Bank\Controllers;
use Bank\App;

class HomeController
{
    public function index(){
        return App::view('home', ['title' => 'Login to K Bank']);
    }
    public function work(){
        return App::view('work', ['title' => 'work with K Bank']);
    }
    public function msg(){
        return App::view('home', ['messages'=> MessagesController::get()]);
    }
}