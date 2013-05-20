<?php
namespace dmerten;
/**
 * @author Dirk Merten
 */

class Request {

    private $get;

    private $post;

    private $cookies;

    private $server;


    public function __construct(array $get, array $post, array $cookies, array $server) {
        $this->get = $get;
        $this->post = $post;
        $this->cookies = $cookies;
        $this->server = $server;
    }


    /**
     * @param $key
     * @param string $default
     * @return mixed
     */
    public function getGet($key, $default = '') {
        return isset($this->get[$key]) ? $this->get[$key] : $default;
    }

    /**
     * @param $key
     * @param string $default
     * @return mixed
     */
    public function getPost($key, $default = '') {
        return isset($this->post[$key]) ? $this->post[$key] : $default;
    }

    /**
     * @param $key
     * @param string $default
     * @return mixed
     */
    public function getServer($key, $default = '') {
        return isset($this->server[$key]) ? $this->server[$key] : $default;
    }

    /**
     * @return string
     */
    public function getRequestUri() {
        return $this->getServer('REQUEST_URI');
    }

    /**
     * @param $key
     * @param string $default
     * @return mixed
     */
    public function getCookies($key, $default = '') {
        return isset($this->cookies[$key]) ? $this->cookies[$key] : $default;
    }
}