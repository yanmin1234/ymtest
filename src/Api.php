<?php
/**
 * Created by PhpStorm.
 * User: liuliping
 * Date: 2019/7/29
 * Time: 9:48
 */

namespace Yanmin\Ymtest;

use think\App;
use think\Request;
use think\Controller;


class Api extends Controller
{

    private $headers = '';

    public function __construct()
    {
        parent::__construct();
//dump(request()->url());die;
//        self::testSign();
        /** 验证sign */
//        if(config('app.app_debug') === false) {
//            self::checkSign();
//        }

        self::checkSign();
    }


    protected function checkSign()
    {
        $headers = request()->header();
        // 验证参数中是否有签名
        if(!isset($headers['sign']) || empty($headers['sign'])){
            exception('签名不存在',400);
        }

        if(!isset($headers['timestamp']) || empty($headers['timestamp'])){
            exception('参数不合法',400);
        }

        if(time() - $headers['timestamp'] > 600){
            exception('验证失效， 请重新发送请求',400);
        }

        $sign = self::getSign([
            'timestamp'=>$headers['timestamp'],
            'username'=>$headers['username'],
            'version'=>$headers['version']
        ]);
//dump($sign);
        if($sign != $headers['sign']){
            exception('请求不合法',400);
        }



    }


    protected function testSign()
    {
        $data = array(
            'username' => '123@qq.com',
            'version' => 'v'.config('api.version'),
            'timestamp' => time()
        );
        $sign = self::getSign($data);
        dump($sign);die;
    }


    protected static function getSign($data)
    {
        $secret = config('api.secret');

        ksort($data);
        // 生成url的形式
        $params = http_build_query($data);
//        dump($params);
        // 生成sign
        $sign = strtoupper(md5($params . $secret));

        return $sign;
    }

}