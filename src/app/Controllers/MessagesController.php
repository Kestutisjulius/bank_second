<?php

namespace Bank\Controllers;

class MessagesController
{
    private static $messages;

    public static function init() :void {
        self::$messages = $_SESSION['msg'] ?? [];
        unset($_SESSION['msg']);
    }
    public static function add(string $txt, string $type):void{
        $_SESSION['msg'][]=['msg'=>$txt, 'type'=>$type];
    }
    public static function get():array {
        return self::$messages;
    }
}