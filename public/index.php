<?php
error_reporting(E_ALL);
define('PHALCON_VERSION_REQUIRED', '1.2.0');
define('PHP_VERSION_REQUIRED', '5.4.0');
define('DS', DIRECTORY_SEPARATOR);
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(dirname(__FILE__)));
}
if (!defined('VENDOR_PATH')) {
    define('VENDOR_PATH', dirname(dirname(__FILE__)).'/vendor');
}
if (!defined('PUBLIC_PATH')) {
    define('PUBLIC_PATH', dirname(__FILE__));
}
if (!defined('ENGINE_PATH')) {
    define('ENGINE_PATH', VENDOR_PATH.'/temafey/phalcon-engine/Engine');
}
require_once VENDOR_PATH."/autoload.php";

try {
    require_once ROOT_PATH . "/app/Application.php";
    $application = new Application();
    $application->run();
    echo $application->getOutput();
} catch (Exception $e) {
    \Engine\Error::exception($e);
    throw $e;
}

