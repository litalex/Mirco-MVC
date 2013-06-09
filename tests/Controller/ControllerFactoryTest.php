<?php
/**
 * @author Dirk Merten
 */

class ControllerFactoryTest extends PHPUnit_Framework_TestCase {

    public function testGetControllerByName() {
        $request = new \mmvc\Request(array(), array(), array(), array());
        $controllerFactory = new \mmvc\Controller\ControllerFactory('\\mmvc\\Controller', $request, new \mmvc\Response());

        $controller = $controllerFactory->getControllerByName('Dummy');

        $this->assertInstanceOf('\\mmvc\\Controller\\Controller', $controller);
    }

}