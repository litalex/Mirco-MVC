<?php
/**
 * @author Dirk Merten
 */

namespace mmvc\Router;


use mmvc\Request;

/**
 * Class Router
 * @package mmvc\Router
 */
class Router {

    const DEFAULT_CONTROLLER_NAME = 'Index';
    const DEFAULT_ACTION_NAME = 'Index';
    /**
     * @var \mmvc\Request
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

    /**
     * @return string
     */
    public function getControllerName() {
        $this->dispatchRequest();
        return $this->dispatchResult->getControllerName();
    }

    /**
     * @return DispatchResult|null
     */
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

                    if (!empty($parts[0])) {
                        $this->dispatchResult->setControllerName($parts[0]);
                    }
                    if (!empty($parts[1])) {
                        $this->dispatchResult->setActionName($parts[1]);
                    }
                }
            }

        }

        return $this->dispatchResult;

    }

    /**
     * @return string
     */
    public function getActionName() {
        $this->dispatchRequest();
        return $this->dispatchResult->getActionName();
    }

    /**
     * @return DispatchResult|null
     */
    public function getDispatchResult() {
        return $this->dispatchResult;
    }
}