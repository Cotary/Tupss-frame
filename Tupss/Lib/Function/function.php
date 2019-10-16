<?php
function P($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
//1.加载配置项（用户配置的优先级更高） C(CONFIG);
//2.读取配置项C('CODE_LEN)
//3.临时改变配置项
//4.读取全部配置项
/**
 * @param null $var
 * @param null $value
 * @return array|mixed|void|null
 */
function C($var=null, $value=null){

    static $config=array();
    if (is_array($var)){
        $config=array_merge($config,array_change_key_case($var,CASE_UPPER));
        return ;
    }
    if (is_string($var)){
        $var=strtoupper($var);
        if (!is_null($value)){
            $config[$var]=$value;
            return ;
        }
        return isset($config[$var])?$config[$var]:null;

    }
    if (is_null($var)&&is_null($value)){
        return $config;
    }

}