<?php
/**
 * Created by PhpStorm.
 * User: TIMONDESKTOP
 * Date: 30-8-14
 * Time: 0:26
 */
header('Content-Type: application/json');

require_once('config.php');
require_once('core.class.php');

$core = new Core();
$core->init();
$core->resolveData();
$core->createResult();

echo $core->getResult();

die();