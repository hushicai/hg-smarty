<?php
require_once('./common.php');

$service->assign(array(
    'test'=>123
));
$service->display('test.tpl');