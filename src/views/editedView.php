<?php

require __DIR__.'./top.php';
$uri = explode('/', $_SERVER['REQUEST_URI']);
echo '<pre>';
print_r($_POST);



require __DIR__.'./bottom.php';
