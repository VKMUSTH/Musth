<?php

require realpath('..') . '/library/ZFExt/Bootstrap.php';
 
ZFExt_Bootstrap::run();


// Define path to application directory
if (!defined('APPLICATION_PATH')) {
    define('APPLICATION_PATH', 
        realpath(dirname(__FILE__) . '/../application'));
}
 
if (!defined('APPLICATION_ROOT')) {
    define('APPLICATION_ROOT', realpath(dirname(__FILE__) . '/..'));
}

// Define application environment 
if (!defined('APPLICATION_ENV')) {
    if (getenv('APPLICATION_ENV')) {
        $env = getenv('APPLICATION_ENV');
    } else {
        $env = 'production';
    }
    define('APPLICATION_ENV', $env);
}

// Ensure library/ is on include_path 
set_include_path(
    APPLICATION_ROOT . '/library' . PATH_SEPARATOR
    . APPLICATION_ROOT . '/vendor' . PATH_SEPARATOR
    . get_include_path()
);

/** Zend_Application */ 
require_once 'Zend/Application.php';

// Create application, bootstrap, and run 
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_ROOT . '/config/application.ini'
);
 
$application->bootstrap()->run();
