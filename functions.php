<?php
/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 23:06
 */
function crash($error, $args = array()) {
    $output = array('error' => $error);
    if ($args)
        $output['args'] = $args;
    $output = json_encode($output);
    echo $output;
    die();
}