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
     * @return mixed
     */
    public function get($key) {
        return $this->data[$key];
    }

}