<?php
/**
 * @author Dirk Merten
 */

namespace mmvc\Controller;


class DummyController extends Controller {


    public function indexAction() {
        $this->response->set('content', 'Hello World');
    }
}