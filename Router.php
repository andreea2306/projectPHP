<?php
/**
 * Created by PhpStorm.
 * User: Andreea
 * Date: 20-Nov-18
 * Time: 10:24
 */


class Router
{
    public function __construct() {
    }

    public function checkUrl($routes,$url,$param){

        if(isset($routes[$url])) {
            list($controllerObj, $action) = $this->getControllerName($routes, $url);
            $controllerObj->{$action}();
        }
        else if(preg_match('/\d+/', $url, $id))
        {
            list($controllerObj, $action) = $this->getControllerName($routes, $url);
            $controllerObj->{$action}($id);
        }
        else{
            echo "404 Not Found";
        }
    }

    /**
     * @param $routes
     * @param $url
     * @return array
     */
    public function getControllerName($routes, $url)
    {
        if(preg_match('/\d+/', $url, $id)){
            $url = str_replace($id,"{id}",$url);
        }
        $controller = $routes[$url]['controller'];
        require_once "../App/Controllers/" .$controller.".php";
        $controllerObj = new $controller();
        $action = $routes[$url]['action'];
        return array($controllerObj, $action);
    }
}