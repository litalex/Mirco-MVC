<?php
/**
 * @author Dirk Merten
 */

namespace dmerten\Controller;


use dmerten\Request;
use dmerten\Response;

abstract class Controller {

    private $request;

    private $response;

    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }


}