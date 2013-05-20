<?php
/**
 * @author Dirk Merten
 */

class RequestTest extends PHPUnit_Framework_TestCase {

    public function testGetter() {
        $request = new dmerten\Request(array('getfoo' => 'barget'), array('postfoo' => 'barpost'), array('cookiesfoo' => 'barcookies'), array('serverfoo' => 'barcookies'));

        $this->assertEquals('barget', $request->getGet('getfoo'));
        $this->assertEquals('barpost', $request->getPost('postfoo'));
        $this->assertEquals('barcookies', $request->getCookies('cookiesfoo'));
        $this->assertEquals('barcookies', $request->getServer('serverfoo'));
    }

}
