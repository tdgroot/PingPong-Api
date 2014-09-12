<?php

/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 0:28
 */
class Arguments {

    /** @var string */
    protected $method = '';
    /** @var string */
    protected $action = '';
    /** @var array */
    protected $data = array();

    public function __construct() {
        $this->init();
    }

    private function init() {
        if (!isset($_POST['method'])) crash(Error::$NO_METHOD);
        if (!isset($_POST['action'])) crash(Error::$NO_ACTION);
        if (!isset($_POST['data'])) crash(Error::$NO_DATA);
        $this->method = $_POST['method'];
        $this->action = $_POST['action'];
        $this->data = json_decode($_POST['data']);
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