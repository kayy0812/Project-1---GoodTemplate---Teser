<?php
if (!defined("MAIN")) exit;

ob_start();
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Autoload.php';

use Sys\Plugins\AltoRouter;
use Sys\Databases\SQLI;
use Sys\Parse;

$database        = new MYSQLI(HOST, USER, PASSWORD, DATABASES, PORT);

$altorouter      = new AltoRouter();
$var             = new Parse();