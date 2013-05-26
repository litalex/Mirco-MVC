<?php
/**
 * @author Dirk Merten
 */

class RouterTest extends PHPUnit_Framework_TestCase {

    public function testGetControllerName() {
        $server = array(
            'REQUEST_URI' => '/foo/bar'
        );

        $request = new dmerten\Request(array(), array(), array(), $server);

        $router = new \dmerten\Router\Router($request, '/', 'Dummy');

        $this->assertEquals('foo', $router->getControllerName());
    }

    public function testGetActionName() {
        $server = array(
            'REQUEST_URI' => '/foo/bar'
        );

        $request = new dmerten\Request(array(), array(), array(), $server);

        $router = new \dmerten\Router\Router($request, '/', 'Dummy');

        $this->assertEquals('bar', $router->getActionName());

    }
}
