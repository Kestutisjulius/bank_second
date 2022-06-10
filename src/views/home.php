<?php

use Bank\App;

require __DIR__.'./top.php';
?>

    <div class="container">
        <div class="login">
            <h1 class="h1">login to K Bank</h1>
            <form name="login" method="post" action="">
                    <label for="name">name: </label>
                    <input name="name" type="text" class="form-control">
                    <label for="psw">password: </label>
                    <input name="psw" type="password" class="form-control">
                    <div class="btn-login">
                        <button type="submit">Login</button>
                    </div>
                <input type="hidden" name="csrf" value="<?=App::csrf()?>">
            </form>
        </div>
    </div>


<?php
require __DIR__.'./bottom.php';

