<?php
/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 0:54
 */
require_once('apiexception.class.php');
require_once('functions.php');

class Error {

    public static $NO_METHOD = 0x01;
    public static $NO_ACTION = 0x02;
    public static $NO_DATA = 0x03;
    public static $NO_ADDRESS = 0x04;
    public static $NO_PORT = 0x05;

    public static $FAIL_SOCKET_CREATE = 0x10;
    public static $FAIL_SOCKET_CONNECT = 0x11;
    public static $FAIL_SOCKET_SEND = 0x12;

}