<?php
/**
 * Created by PhpStorm.
 * User: liuliping
 * Date: 2019/7/31
 * Time: 13:20
 */
namespace Yanmin\Ymtest\api\v1;

use Yanmin\Ymtest\Api;

class Index extends Api
{
    /**
     * @return object
     */
    public function index()
    {
        return 'test';
    }
}