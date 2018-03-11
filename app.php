<?php
require_once "./classes/Router.php";
require_once "./classes/Controller.php";

/* modely */
require_once "./models/Player.php";
require_once "./models/Game.php";
require_once "./models/Tank.php";

/* controllers */
require_once "./controllers/GameController.php";
require_once "./controllers/HomeController.php";

/* knihovny */
require_once "./lib/smarty/Smarty.class.php";

session_start();

try {
    $router = new Router();
    $controller = $router->getControllerClass();

    $controller = new $controller($router->getAction(), $router->getParameters());

    $controller->render();


} catch (\Exception $e) {
    print_r($e->getMessage());
}












