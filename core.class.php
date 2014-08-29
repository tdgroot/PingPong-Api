<?php
/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 0:26
 */
require_once('arguments.class.php');
require_once('error.class.php');
require_once('socket.class.php');
require_once('session.class.php');

class Core {

    /** @var $arguments Arguments */
    protected $arguments = null;
    /** @var $session Session */
    protected $session = null;
    /** @var $socket Socket  */
    protected $socket = null;

    public function Core() {
        $this->arguments = new Arguments();
        $this->session = new Session();
    }

    public function init() {
        if ($this->session->getSocket()) {
            $this->socket = $this->session->getSocket();
        } else {
            $this->socket = new Socket($this->arguments->getData());
        }
    }

}