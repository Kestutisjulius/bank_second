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
    public static function saveUser($id, $user){
         self::getDB()->update($id, $user);
    }
    public static function deleteUserById($userId){
         self::getDB()->delete($userId);
    }
}