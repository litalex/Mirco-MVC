<?php
/**
 * @author Dirk Merten
 */

namespace mmvc\Controller;


use mmvc\Request;
use mmvc\Response;

/**
 * Class Controller
 * @package mmvc\Controller
 */
abstract class Controller {

    /**
     * @var \mmvc\Request
     */
    protected $request;

    /**
     * @var \mmvc\Response
     */
    protected $response;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param $action
     * @throws \BadMethodCallException
     */
    public function runAction($action) {
        $method = strtolower($action) . 'Action';
        if (!method_exists($this, $method)) {
            throw new \BadMethodCallException("Action $action is not implemented!");
        }

        $this->$method();
    }


}