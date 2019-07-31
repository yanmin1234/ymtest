<?php
/**
 * Created by PhpStorm.
 * User: liuliping
 * Date: 2019/7/29
 * Time: 10:52
 */

namespace Yanmin\Ymtest;

use think\exception\Handle;

class ApiException extends Handle
{
    /**
     * http状态码
     * @var unknown
     */
    public $httpCode = 500;


    public function render(\Exception $e)
    {
        $this->httpCode = !empty($e->getCode()) ? $e->getCode() : $this->httpCode;
        if(config('app.app_debug') === true){
            return parent::render($e);
        }else{
            return show(-1, $e->getMessage(), [], $this->httpCode);
        }
    }
}