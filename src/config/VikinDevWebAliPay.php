<?php
return [

    //服务器异步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
    'notify_url'        => '',

    //页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
    'return_url'        => '',

    //签名方式
    'sign_type'         => strtoupper('RSA'),

    //字符编码格式 目前支持 gbk 或 utf-8
    'input_charset'     => strtolower('utf-8'),

    //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
    'transport'         => 'http',

    //产品类型，无需修改
    'service'           => "create_direct_pay_by_user",

    //防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
    'anti_phishing_key' => "",

    //客户端的IP地址 非局域网的外网IP地址，如：221.0.0.1
    'exter_invoke_ip'   => ""
];