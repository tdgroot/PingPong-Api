<?php
/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 0:45
 */
class Socket {

    protected $address = '';
    protected $port = 0;
    protected $resource = null;
    protected $connected = false;

    /**
     * @param $data array
     */
    public function __construct($data) {
        $this->init($data);
    }

    /**
     * @param $data
     */
    private function init($data) {
        if (!isset($data['address'])) crash(Error::$NO_ADDRESS);
        if (!isset($data['port'])) crash(Error::$NO_PORT);
        $this->address = $data['address'];
        $this->port = (int) $data['port'];

        if (($this->resource = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) === false) {
            crash(Error::$FAIL_SOCKET_CREATE);
        }
    }

    /**
     * @param $action string
     * @param $data array
     */
    public function send($action, $data) {

    }

    /**
     * @param $message
     */
    protected function send_raw($message) {
        if (socket_sendto($this->resource, $message, strlen($message), 0, $this->address, $this->port) === false) {
            crash(Error::$FAIL_SOCKET_SEND, array('address' => $this->address, 'port' => $this->port, 'message' => $message));
        }
        return true;
    }

    /**
     * @return string
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * @return int
     */
    public function getPort() {
        return $this->port;
    }

    /**
     * @return null|resource
     */
    public function getResource() {
        return $this->resource;
    }

    /**
     * @return boolean
     */
    public function isConnected() {
        return $this->connected;
    }

}