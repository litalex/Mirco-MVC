<?php
/**
 * @author Dirk Merten
 */
set_include_path(dirname(dirname(__FILE__)) . '/lib');

include '../inc/autloader.php';

$request = new \mmvc\Request($_GET, $_POST, $_COOKIE, $_SERVER);
$response = new \mmvc\Response();

$router = new \mmvc\Router\Router($request, '/dispatcher/demo', 'Dummy');

$controllerFactory = new \mmvc\Controller\ControllerFactory('\\mmvc\\Controller', $request, $response);

$controller = $controllerFactory->getControllerByName($router->getControllerName());
$controller->runAction($router->getActionName());

$view = new \mmvc\View\View('view/' . $router->getControllerName() . '/' . $router->getActionName() . '.phtml', $response);
$view->render();
