<?php
define('_DIR_ROOT', str_replace('\\', '/', __DIR__));

// XỬ lý http root 
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$folder = str_replace($_SERVER['DOCUMENT_ROOT'], '', _DIR_ROOT);

$web_root = $web_root . $folder;
define('_WEB_ROOT', $web_root);

$configs_dir = scandir('configs');
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;
        }
    }
}


//require_once 'configs/routes.php'; //
require_once 'core/Route.php'; // Load route class
require_once 'app/App.php'; // Load app 

// Kiem tra config va load database
if (!empty($config['database'])) {
    $db_config = array_filter($config['database']);
    if (!empty($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/Database.php';
    }
}

require_once 'core/Model.php'; // 

require_once 'core/Controller.php'; // Load base controller
