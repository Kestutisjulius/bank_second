<?php
namespace Bank;
use Bank\Controllers\AuthorityController;
use Bank\Controllers\HomeController;
use Bank\Controllers\LoginController;
use Bank\Controllers\MessagesController;
use Bank\Controllers\WorkController;

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
           return (new HomeController())->index();
        }
        if ('POST' == $method && count($uri) == 1 && $uri[0] === ''){
           return (new LoginController())->login();
        }
        if ('POST' == $method && count($uri) == 1 && $uri[0] === 'logout'){
           return (new LoginController())->logout();
        }
        if ('POST' == $method && count($uri) == 1 && $uri[0] === 'editedView'){
           return (new WorkController())->edit();
        }
        if ('GET' == $method && count($uri) == 1 && $uri[0] === 'work'){
           return (new WorkController())->allAccounts();
        }
        if ('GET' == $method && count($uri) == 2 && $uri[0] === 'user'){
           return (new WorkController())->user($uri[1]);
        }
        if ('GET' == $method && count($uri) == 2 && $uri[0] === 'transfer'){
           return (new WorkController())->transfer($uri[1]);
        }
        if ('GET' == $method && count($uri) == 1 && $uri[0] === 'create'){
           return (new WorkController())->createOpen();
        }
        if ('POST' == $method && count($uri) == 1 && $uri[0] === 'create'){
           return (new WorkController())->create();
        }
        if ('POST' == $method && count($uri) == 2 && $uri[0] === 'deleteUser'){
           return (new WorkController())->deleteUser($uri[1]);
        }

    }

    public static function view(string $name, array $data = []){
        extract($data);
        return require __DIR__.'./../views/'.$name.'.php';
    }
    public static function redirect($url = '') : void{
        header('Location: http://'.self::DOMAIN.'/'.$url);
    }
    public static function url($url = ''){
        return 'http://'.self::DOMAIN.'/'.$url;
    }
    public static function csrf() : string{
        return md5('jdgs75gsjbhag'.$_SERVER['HTTP_USER_AGENT']);
    }

}