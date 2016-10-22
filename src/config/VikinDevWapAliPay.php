<?php

return [
    //服务器异步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
    'notify_url' => '',

    //页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
    'return_url' => '',

    //产品类型，无需修改
    'service'    => "alipay.wap.create.direct.pay.by.user"
];