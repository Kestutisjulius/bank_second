<?php

namespace Bank\Controllers;

class Conditions
{
        public static function haveMoney($id):bool
        {
            $user = DataController::getUserById($id);
            $money = substr($user['money'], 3);
            $money = str_replace(',', '.',$money);
            $money = (double)$money;

           return ($money == 0.00) ? true : false;

        }
}