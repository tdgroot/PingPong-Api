<?php

/**
 * Created by PhpStorm.
 * User: timon
 * Date: 12-9-14
 * Time: 23:24
 */
class LongPoll {

    /** @var $action string */
    protected $action = '';
    /** @var $data array */
    protected $data = array();

    public function init($action, $data) {
        $this->action = $action;
        $this->data = $data;
    }

    public function start() {
        $address = $this->data['address'];
        $port = (int)$this->data['port'];

        if (!$resource = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) crash(Error::$FAIL_SOCKET_CREATE);
        if (!socket_connect($resource, $address, $port)) crash(Error::$FAIL_SOCKET_CONNECT);

        $running = true;
        $time_elapsed = 0;
        $sleep_time = 1.5 * 1000 * 1000; // Seconds - Milliseconds - Microseconds
        $max_time = (((int)ini_get('max_execution_time')) * 0.8) * 1000 * 1000;
        $last = time();
        while ($running) {
            if ($time_elapsed >= $max_time) $last = false;
            $now = time();
            $time_elapsed .= ($now - $last);
            $last = $now;
            $result = socket_read($resource, 1024);
            if (socket_last_error($resource)) crash(Error::$FAIL_SOCKET_READ);
            if ($result) echo $result;
            if ($running) usleep($sleep_time);
        }
    }

}