<?php
/**
 * @author Dirk Merten
 */

namespace dmerten\Router;


use dmerten\Request;

/**
 * Class Router
 * @package dmerten\Router
 */
class Router {

    const DEFAULT_CONTROLLER_NAME = 'Index';
    const DEFAULT_ACTION_NAME = 'Index';

    /**
     * @var \dmerten\Request
     */
    private $request;


    /**
     * @var DispatchResult
     */
    private $dispatchResult = null;


    /**
     * @param Request $request
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }


    public function getControllerNname() {
        $this->dispatchRequest();
        return $this->dispatchResult->getControllerName();
    }

    private function dispatchRequest() {

        if ($this->dispatchResult === null) {

            $this->dispatchResult = new DispatchResult();
            $this->dispatchResult->setControllerName(self::DEFAULT_CONTROLLER_NAME);
            $this->dispatchResult->setActionName(self::DEFAULT_ACTION_NAME);


            if ($this->request->getRequestUri()) {
                $parts = explode('/', $this->request->getRequestUri());

                if (is_array($parts) && !empty($parts)) {

                    if (!empty($parts[1])) {
                        $this->dispatchResult->setControllerName($parts[1]);
                    }
                    if (!empty($parts[2])) {
                        $this->dispatchResult->setActionName($parts[2]);
                    }
                }
            }

        }

        return $this->dispatchResult;

    }

    public function getActionName() {
        $this->dispatchRequest();
        return $this->dispatchResult->getActionName();
    }

    public function getDispatchResult() {
        return $this->dispatchResult;
    }
}