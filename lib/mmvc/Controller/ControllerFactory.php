<?php
/**
 * @author Dirk Merten
 */

namespace mmvc\Controller;


use mmvc\Request;
use mmvc\Response;

/**
 * Class ControllerFactory
 * @package mmvc\Controller
 */
class ControllerFactory {

    const CONTROLLER_NAME_POSTFIX = 'Controller';

    /**
     * @var \mmvc\Request
     */
    private $request;

    /**
     * @var \mmvc\Response
     */
    private $response;

    private $nameSpace = '';

    /**
     * @param $namespace
     * @param Request $request
     * @param Response $response
     */
    public function __construct($namespace, Request $request, Response $response) {
        $this->nameSpace = $namespace;
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param $name
     * @return Controller
     */
    public function getControllerByName($name) {
        $name = $this->nameSpace . '\\' . ucfirst($name) . self::CONTROLLER_NAME_POSTFIX;
        $controller = new $name($this->request, $this->response);

        return $controller;
    }
}