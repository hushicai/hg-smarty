<?php
/**
 * @file 全局配置
 * @author hushicai
 */

date_default_timezone_set("PRC");
ini_set('error_reporting', E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

/**
 * 全局配置类
 */
class Conf {
    // 项目根目录
    static $documentRoot;

    // fe资源baseUrl
    // 默认为服务器根目录下src目录
    // 注意这里配置的是一个url，从根目录`/`开始
    static $baseUrl = '/src';

    // 默认为项目根目录下的views目录
    static $tplDir = 'views';

    // 默认为项目根目录下的mock目录
    static $mockDir = 'mock';

    static $phpServiceDir = 'php';

    static $smartyLibsDir = 'smarty';

    /**
     * @param {Array} $config['baseUrl']
     *                $config['tplDir']
     *                $config['mockDir']
     *                $config['phpServiceDir']
     *                $config['smartyLibsDir']
     */
    static function init($config = array()) {
        self::$documentRoot = $_SERVER['DOCUMENT_ROOT'];
        self::$tplDir = self::$documentRoot . DIRECTORY_SEPARATOR . self::$tplDir;
        self::$mockDir = self::$documentRoot . DIRECTORY_SEPARATOR . self::$mockDir;
        self::$phpServiceDir = self::$documentRoot . DIRECTORY_SEPARATOR . self::$phpServiceDir;
        self::$smartyLibsDir = self::$documentRoot . DIRECTORY_SEPARATOR . self::$smartyLibsDir;
    }
}

// 初始化项目环境
Conf::init();

require_once(Conf::$phpServiceDir . DIRECTORY_SEPARATOR . 'Util.php');
require_once(Conf::$phpServiceDir . DIRECTORY_SEPARATOR . 'Service.php');
