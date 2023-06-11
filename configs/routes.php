<?php

$routes['default_controller'] = 'user';


$routes['login'] = 'user/loginPage';
$routes['register'] = 'user/registerPage';
$routes['index'] = 'user/index';
$routes['search/(.+)'] = 'user/search/$1';
$routes['get-user/(.+)'] = 'user/getUser/$1';
