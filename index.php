<?php
/**
 * Created by PhpStorm.
 * User: Andreea
 * Date: 13-Nov-18
 * Time: 10:36
 */

//echo "aaaaaaaaaaaaaa";

//var_dump($_SERVER);
//phpinfo();

require_once "../App/config.php";
require_once "../Src/Router.php";
require_once "../App/routes.php";

ini_set("error_log",__DIR__."/../Logs/error.log");
error_reporting(E_ALL);
ini_set("display_errors",0);

if($config["env"] == "dev"){
    ini_set("display_errors",1);
}

//echo $var;

//var_dump($_SERVER["REQUEST_URI"]);
//var_dump($_SERVER["QUERY_STRING"]);

$router = new Router();
$router->checkUrl($routes,$_SERVER["REQUEST_URI"],$_SERVER["QUERY_STRING"]);