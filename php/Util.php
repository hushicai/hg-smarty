<?php
/**
 * @file 页面脚本集合
 * @author hushicai
 */

/**
 * 读取远程json
 *
 * @param  {string} $remoteUrl 远程Url
 * @return {Object} JSON对象
 */
function readRemoteJson($remoteUrl) {
    $json = file_get_contents($remoteUrl);
    return json_decode($json, true);
}

/**
 * 读取json数据
 *
 * @param  {string} $filePath 相对于mock目录的文件路径
 * @return {Object}           json对象
 */
function readJson($filePath) {
    $filePath = Conf::$mockDir . DIRECTORY_SPERATOR . $filePath;

    $json = file_get_contents($filePath);
    return json_decode($json, true);
}
