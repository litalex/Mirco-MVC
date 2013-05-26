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
     * @var string
     */
    private $webRoot = '';

    /**
     * @var string
     */
    private $defaultControllerName = '';

    /**
     * @param Request $request
     * @param $webRoot
     * @param string $defaultControllerName
     */
    public function __construct(Request $request, $webRoot, $defaultControllerName = '') {
        $this->request = $request;
        $this->webRoot = $webRoot;
        $this->defaultControllerName = $defaultControllerName ? $defaultControllerName : self::DEFAULT_CONTROLLER_NAME;
    }

    public function getControllerNname() {
        $this->dispatchRequest();
        return $this->dispatchResult->getControllerName();
    }

    private function dispatchRequest() {

        if ($this->dispatchResult === null) {

            $this->dispatchResult = new DispatchResult();
            $this->dispatchResult->setControllerName($this->defaultControllerName);
            $this->dispatchResult->setActionName(self::DEFAULT_ACTION_NAME);

            $requestUri = $this->request->getRequestUri();
            if ($requestUri) {

                if (strpos($requestUri, $this->webRoot) === 0) {
                    $length = strlen($this->webRoot);
                    $requestUri = substr($requestUri, $length);
                }

                $parts = explode('/', $requestUri);

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