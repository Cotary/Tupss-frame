<?php

use Lib\Core\Application;

final class Tupss
{
    public static function run()
    {
        //var_dump(111);die;
        self::_set_const();   //设置常量
        self::_create_dir();   //创建应用文件夹
        self::_import_file();  //载入所需文件
        Application::run();
    }

    private static function _set_const()
    {
        //后面都有 /
        $rootPath = str_replace('\\', '/', __FILE__);
        define('TUPSS_PATH', dirname($rootPath));
        define('CONFIG_PATH', TUPSS_PATH . '/Config');
        define('DATA_PATH', TUPSS_PATH . '/Data');
        define('LIB_PATH', TUPSS_PATH . '/Lib');
        define('CORE_PATH', LIB_PATH . '/Core');
        define('FUNCTION_PATH', LIB_PATH . '/Function');
        define('ROOT_PATH', dirname(TUPSS_PATH));
        //应用目录
        define('APP_PATH', ROOT_PATH . '/' . APP_NAME);
        define('APP_CONFIG_PATH', APP_PATH . '/Config');
        define('APP_CONTROLLER_PATH', APP_PATH . '/Controller');
        define('APP_TPL_PATH', APP_PATH . '/Tpl');
        define('APP_PUBLIC_PATH', APP_TPL_PATH . '/Public');

    }

    private static function _create_dir()
    {
        $arr = array(
            APP_PATH,
            APP_CONFIG_PATH,
            APP_CONTROLLER_PATH,
            APP_TPL_PATH,
            APP_PUBLIC_PATH
        );
        foreach ($arr as $item) {
            is_dir($item) || mkdir($item, 0777, true);
        }
    }

    private static function _import_file()
    {
        $fileArr = array(
            FUNCTION_PATH . '/function.php',
            CORE_PATH . '/Application.php'
        );
        foreach ($fileArr as $item) {
            require $item;
        }
    }
}

Tupss::run();