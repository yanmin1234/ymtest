<?php
/**
 * Created by PhpStorm.
 * User: liuliping
 * Date: 2019/7/31
 * Time: 12:03
 */

namespace Yanmin\Ymtest;

use think\Controller;

class YanminController extends Controller
{
    public function index()
    {
        return '这是一个基于tp测试包';
    }
}