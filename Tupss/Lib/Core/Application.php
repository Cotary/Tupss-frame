<?php


namespace Lib\Core;

/**
 * Class Application
 * @package Lib\Core
 */
final class Application
{
    public static function run()
    {
        self::_init();
        self::_set_url();
        spl_autoload_register(array(__CLASS__, '_autoload'));//自动载入
        self::_create_demo();
        self::_app_run();
    }

    private static function _init()
    {
        //加载配置项（用户配置的优先级更高）
        C(require CONFIG_PATH . '/config.php');
        $userPath = APP_CONFIG_PATH . '/config.php';

        $userConfig = <<<EOF
<?php
return array(
//配置项=>配置值
);
EOF;
        is_file($userPath) || file_put_contents($userPath, $userConfig);
        C(require $userPath);

        //设置默认时区
        date_default_timezone_set(C('DEFAULT_TIME_ZONE'));
        //SESSION
        C('SESSION_AUTO_START') && session_start();
    }

    private static function _set_url()
    {
        // P($_SERVER);
        $path = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
        $path = str_replace('\\', '/', $path);
        define('__APP__', $path);
        define('__ROOT__', dirname(__APP__));
        define('__TPL__', __ROOT__ . '/' . APP_NAME . '/Tpl');
        define('__PUBLIC__', __TPL__ . '/Public');

    }

    /**
     * @param $className 自动载入
     */
    private static function _autoload($className)
    {

    }

    /**
     * 创建默认控制器
     */
    private static function _create_demo()
    {
        $path = APP_CONTROLLER_PATH . '/IndexController.class.php';
        $str = <<<EOF
<?php

class IndexController
{
    public function index()
    {
        echo 'Welcome To Tupss!';
    }
}
EOF;
        is_file($path) || file_put_contents($path, $str);
    }

    private static function _app_run()
    {
echo 1222;
             $track=debug_backtrace();
             ob_start();

             echo 999;
             var_dump('fasd');
             //return 123;
             debug_print_backtrace();
             $aa=ob_get_clean();
             print_r($track);
             print_r($aa);



    }
}