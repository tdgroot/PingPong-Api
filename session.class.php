<?php
/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 0:28
 */
class Session {

    protected $socket = null;

    public function Session() {

    }

    /**
     * @return Socket
     */
    public function getSocket() {
        return $this->socket;
    }

}