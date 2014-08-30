<?php
/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 23:06
 */
function crash($error, $args = array()) {
    ob_start();
    var_dump($args);
    $args = ob_get_clean();
    $output = array('error' => $error, 'args' => $args);
    $output = json_encode($output);
    echo $output;
    die();
}