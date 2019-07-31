<?php
/**
 * Created by PhpStorm.
 * User: liuliping
 * Date: 2019/7/29
 * Time: 9:53
 */

return [
    // 应用调试模式
    'app_debug'              => true,
    // 路由是否完全匹配
    'route_complete_match'   => true,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '\app\common\ApiException',

    'secret'=>'yanmin',
    'version'=>1,
];