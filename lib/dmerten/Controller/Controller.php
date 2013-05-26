<?php
/**
 * @author Dirk Merten
 */

namespace dmerten\Controller;


use dmerten\Request;
use dmerten\Response;

/**
 * Class Controller
 * @package dmerten\Controller
 */
abstract class Controller {

    /**
     * @var \dmerten\Request
     */
    private $request;

    /**
     * @var \dmerten\Response
     */
    private $response;

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