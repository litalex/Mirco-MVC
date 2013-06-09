<?php
/**
 * @author Dirk Merten
 */

namespace mmvc\View;


use mmvc\Response;

class View {

    /**
     * @var Response
     */
    private $response;

    /**
     * Path to template
     * @var string
     */
    private $template;

    public function __construct($templateName, Response $response) {
        $this->response = $response;
    }


    public function render() {
        $render = function ($template, $response) {
            include $template;
        };

        $render($this->template, $this->response);
    }


}