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
    protected $udpSocket = null;

    /**
     * @param $data array
     * @throws ApiException
     */
    public function Socket($data) {
        if (!isset($data['address'])) throw new ApiException(Error::$NO_ADDRESS);
        if (!isset($data['port'])) throw new ApiException(Error::$NO_PORT);
        $this->address = $data['address'];
        $this->port = (int) $data['port'];

        if (($this->udpSocket = socket_create(AF_INET, SOCK_STREAM, SOL_UDP)) === false) {
            throw new ApiException(Error::$FAIL_SOCKET_CREATE);
        }
    }

    public function connect() {

    }

}