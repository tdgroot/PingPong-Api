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
require_once('longpoll.class.php');

class Core {

    /** @var $arguments Arguments */
    protected $arguments = null;
    /** @var $session Session */
    protected $session = null;
    /** @var $socket Socket  */
    protected $socket = null;
    /** @var $longpoll LongPoll */
    protected $longpoll = null;
    /** @var $result string */
    protected $result = '';

    public function __construct() {
        $this->arguments = new Arguments();
        $this->session = new Session();
        $this->longpoll = new LongPoll();
    }

    public function init() {
        if ($this->session->getSocket()) {
            $this->socket = $this->session->getSocket();
        } else {
            $this->socket = new Socket($this->arguments->getData());
        }
        $this->session->setSocket($this->socket);
    }

    public function resolveData() {
        $method = $this->arguments->getMethod();
        $action = $this->arguments->getAction();
        $data = $this->arguments->getData();
        if ($method === 'send') {
            $this->socket->send($action, $data);
        } else if ($method === 'request') {
            $this->longpoll->init($action, $data);
            $this->longpoll->start();
        }
    }

    public function createResult() {

    }

    public function getResult() {
        return $this->result;
    }

}