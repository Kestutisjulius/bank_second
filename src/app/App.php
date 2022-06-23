<?php
namespace Bank;
use Bank\Controllers\AuthorityController;
use Bank\Controllers\DataController;
use Bank\Controllers\HomeController;
use Bank\Controllers\LoginController;
use Bank\Controllers\MessagesController;
use Bank\Controllers\WorkController;
use Bank\DB\JsonDb;

class App
{

    const PATH = __DIR__.'/../';
    const DOMAIN = 'kbankas.lt';


    public static function start(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
        header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");
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
        //API-----------------------------------//
        if ('GET' == $method && count($uri) == 2 && $uri[0] === 'api' && $uri[1] === 'work'){
            return (new WorkController())->allAccountsApi();
        }

        if ('PUT' == $method && count($uri) == 3 && $uri[0] === 'api' && $uri[1] === 'work'){
            return (new WorkController())->editApi($uri[2]);
        }


        if ('POST' == $method && count($uri) == 1 && $uri[0] === 'api' && $uri[1] === 'create'){
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData, 1);
            return (new WorkController())->createApi($data);
        }

        if ('DELETE' == $method && count($uri) == 3 && $uri[0] === 'api' && $uri[1] === 'deleteUser'){
            return (new WorkController())->deleteUserApi($uri[2]);
        }
        //API-----------------------------------//
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
        header('Content-Type: application/json');

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