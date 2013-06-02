<?php
/**
 * @author Dirk Merten
 */

namespace dmerten\Controller;


class DummyController extends Controller {


    public function indexAction() {
        $this->response->set('content', 'Hello World');
    }
}