<?php

final class Tupss
{
    public static function run()
    {
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
        define('CONFIG_PATH', TUPSS_PATH . '/config');
        define('DATA_PATH', TUPSS_PATH . '/data');
        define('LIB_PATH', TUPSS_PATH . '/lib');
        define('CORE_PATH', LIB_PATH . '/core');
        define('FUNCTION_PATH', LIB_PATH . '/function');
        define('ROOT_PATH', dirname(TUPSS_PATH));
        //应用目录
        define('APP_PATH', ROOT_PATH.'/'.APP_NAME);
        echo ROOT_PATH;
    }


}

Tupss::run();