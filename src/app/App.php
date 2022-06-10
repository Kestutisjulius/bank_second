<?php
namespace Bank;
use Bank\Controllers\AuthorityController;
use Bank\Controllers\HomeController;
use Bank\Controllers\LoginController;
use Bank\Controllers\MessagesController;

class App
{
    const PATH = __DIR__.'/../';
    const DOMAIN = 'kbankas.lt';

    public static function start(){
        session_start();
        MessagesController::init();
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        self::route($uri);
    }
    private static function route(array $uri){
        $method = $_SERVER['REQUEST_METHOD'];

        if ('GET' == $method && count($uri) == 1 && $uri[0] === ''){
            if (!AuthorityController::auth()) {
                return self::redirect();
            }
           return (new HomeController())->msg();
        }
        if ('GET' == $method && count($uri) == 1 && $uri[0] === 'work'){
            if (!AuthorityController::auth()) {
                return self::redirect();
            }
           return (new HomeController())->work();
        }
        if ('POST' == $method && count($uri) == 1 && $uri[0] === ''){

           return (new LoginController())->login();
        }

    }

    public static function view(string $name, array $data = []){
        extract($data);
        return require __DIR__.'./../views/'.$name.'.php';
    }
    public static function redirect($url = '') : void{
        header('Location: http://'.self::DOMAIN.'/'.$url);
    }
    public static function csrf() : string{
        return md5('jdgs75gsjbhag'.$_SERVER['HTTP_USER_AGENT']);
    }
}