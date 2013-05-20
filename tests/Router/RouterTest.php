<?php
/**
 * @author Dirk Merten
 */

class RouterTest extends PHPUnit_Framework_TestCase {

    public function testGetControllername() {
        $server = array(
            'REQUEST_URI' => '/foo/bar'
        );

        $request = new dmerten\Request(array(), array(), array(), $server);


        $router = new \dmerten\Router\Router($request);

        $this->assertEquals('foo', $router->getControllerNname());
    }

    public function testGetActionname() {
        $server = array(
            'REQUEST_URI' => '/foo/bar'
        );

        $request = new dmerten\Request(array(), array(), array(), $server);

        $router = new \dmerten\Router\Router($request);

        $this->assertEquals('bar', $router->getActionName());

    }
}
