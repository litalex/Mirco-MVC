<?php
/**
 * @author Dirk Merten
 */

namespace dmerten;


/**
 * Class Response
 * @package dmerten
 */
class Response {

    /**
     * @var array
     */
    private $data = array();


    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    /**
     * @param $key
     * @param string $default
     * @return mixed
     */
    public function get($key, $default = '') {
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }

}