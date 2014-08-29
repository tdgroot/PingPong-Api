<?php

/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 0:28
 */
class Arguments {

    protected $method = '';
    protected $action = '';
    protected $data = array();

    public function Arguments() {
        if (!isset($_POST['method'])) throw new ApiException(Error::$NO_METHOD);
        if (!isset($_POST['action'])) throw new ApiException(Error::$NO_ACTION);
        if (!isset($_POST['data'])) throw new ApiException(Error::$NO_DATA);
        $this->method = $_POST['method'];
        $this->action = $_POST['action'];
        $this->data = $_POST['data'];
    }

    public function init() {
        return true;
    }

    /**
     * @return string
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getData() {
        return $this->data;
    }

}