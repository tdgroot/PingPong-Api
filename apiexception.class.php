<?php
/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 1:24
 */
class ApiException extends Exception {

    public function ApiException($error, $code = 0, Exception $previous = null) {
        $message = '' . $error . '';
        parent::__construct($message, $code, $previous);
    }

}