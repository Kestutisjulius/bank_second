<?php

namespace Bank\Controllers;

use Bank\DB\JsonDb;

class DataController
{


    public static function getDB(){
       return new JsonDb('ACC_DATA');
    }

    public static function getUserById($id){
        $user = (self::getDB()->getUserById($id));
        return $user;
    }

}