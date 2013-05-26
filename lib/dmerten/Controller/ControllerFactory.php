<?php
/**
 * @author Dirk Merten
 */

namespace dmerten\Controller;


use dmerten\Request;
use dmerten\Response;

/**
 * Class ControllerFactory
 * @package dmerten\Controller
 */
class ControllerFactory {

    const CONTROLLER_NAME_POSTFIX = 'Controller';

    /**
     * @var \dmerten\Request
     */
    private $request;

    /**
     * @var \dmerten\Response
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