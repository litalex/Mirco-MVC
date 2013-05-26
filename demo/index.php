<?php
/**
 * @author Dirk Merten
 */
set_include_path(dirname(dirname(__FILE__)) . '/lib');

include '../inc/autloader.php';

$request = new \dmerten\Request($_GET, $_POST, $_COOKIE, $_SERVER);
$response = new \dmerten\Response();

$router = new \dmerten\Router\Router($request, '/dispatcher/demo', 'Dummy');

$controllerFactory = new \dmerten\Controller\ControllerFactory('\\dmerten\\Controller', $request, $response);

$controller = $controllerFactory->getControllerByName($router->getControllerName());
$controller->runAction($router->getActionName());

var_dump($response);