<?php
/**
 * @file 公共模块
 * @author hushicai
 */


require('../php/Conf.php');

// 每一个页面都对应一个service
$service = new Service(array(
    // 设置公共数据
    'tplData'=>array(
        'baseUrl'=>Conf::$baseUrl
    )
));