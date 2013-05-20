<?php
/**
 * @author Dirk Merten
 */

class ControllerFactoryTest extends PHPUnit_Framework_TestCase {

    public function testGetControllerByName() {
        $request = new \dmerten\Request(array(), array(), array(), array());
        $controllerFactory = new \dmerten\Controller\ControllerFactory('dmerten\\Controller\\', $request, new \dmerten\Response());

        $controller = $controllerFactory->getControllerByName('Dummy');

        $this->assertInstanceOf('\\dmerten\\Controller\\Controller', $controller);
    }

}