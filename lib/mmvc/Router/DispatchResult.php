<?php
/**
 * @author Dirk Merten
 */

namespace mmvc\Router;


/**
 * Class DispatchResult
 * @package mmvc\Router
 */
class DispatchResult {

    /**
     * @var string
     */
    private $controllerName = '';

    /**
     * @var string
     */
    private $actionName = '';

    /**
     * @param string $actionName
     */
    public function setActionName($actionName) {
        $this->actionName = $actionName;
    }

    /**
     * @return string
     */
    public function getActionName() {
        return $this->actionName;
    }

    /**
     * @param string $controllerName
     */
    public function setControllerName($controllerName) {
        $this->controllerName = $controllerName;
    }

    /**
     * @return string
     */
    public function getControllerName() {
        return $this->controllerName;
    }

}