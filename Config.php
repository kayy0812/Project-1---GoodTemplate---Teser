<?php
/**
 * Project by kayy0812
 * @version 1.0.0
 * Github: kayy0812
 */
define('MAIN', true);
define('HOME', dirname(__FILE__) . '/');
define('TEMP', dirname(__FILE__) . '/Resources/');

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASES', 'vanloc');
define('PORT', NULL);

ini_set('display_errors', true);
require_once './Systems/Init.php';