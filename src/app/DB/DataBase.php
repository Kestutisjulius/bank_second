<?php

namespace Bank\DB;

interface DataBase
{
    function create(array $userData) : void;

    function update(int $userId, array $userData) : void;

    function delete(int $userId) : void;

    function getUserById(int $userId) : array;

    function showAll() : array;
}

