<?php
define("JASPERCLIENT_ROOT", __DIR__ . "/src/");

spl_autoload_register(function($class) {
$location = JASPERCLIENT_ROOT . $class . '.php';
$location = str_replace("\\", "/", $location);

if(!is_readable($location)) return;

require_once $location;
});

?>