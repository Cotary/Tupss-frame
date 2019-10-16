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
        self::init();
    }

    private static function init()
    {
        //加载配置项（用户配置的优先级更高）
        C(include CONFIG_PATH . '/config.php');
        $userPath = APP_CONFIG_PATH . '/config.php';

        $userConfig = <<<str
<?php
return array(
//配置项=>配置值
);
str;
        is_file($userPath) || file_put_contents($userPath, $userConfig);
        C(include $userPath);

        //设置默认时区
        date_default_timezone_set(C('DEFAULT_TIME_ZONE'));
        //SESSION
        C('SESSION_AUTO_START') && session_start();
    }

}