<?php
require_once 'Config.php';

$altorouter->setBasePath($altorouter::BasePath(HOME));

$altorouter->addRoutes(array(
	array('GET', '/link/', TEMP . '/Home.php', 'link'),
));

$match = $altorouter->match();
    if ($match) {
        if (is_readable($match["target"])) { 
            $var->parse_get($match["params"]);
            $var->parse_get(array("page" => $match["name"]));   
            require_once $match["target"];
        }
    }
