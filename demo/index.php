<?php
/**
 * @author Dirk Merten
 */

include '../inc/autloader.php';

$request = new \dmerten\Request($_GET, $_POST, $_COOKIE, $_SERVER);
$response = new \dmerten\Response();

$router = new \dmerten\Router\Router($request);

$controllerFactory = new \dmerten\Controller\ControllerFactory('\\dmerten\\Controller\\Controller', $request, $response);
$controller = $controllerFactory->getControllerByName($router->getControllerNname());
$controller->runAction($router->getActionName());