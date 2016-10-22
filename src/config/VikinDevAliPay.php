<?php

return [
    //合作身份者ID，以2088开头由16位纯数字组成的字符串
    'partner'       => '',

    //收款支付宝账号，以2088开头由16位纯数字组成的字符串
    'seller_id'     => '',

    //商户的私钥
    'private_key'   => '',

    //支付宝的公钥
    'public_key'    => '',
    //签名方式
    'sign_type'     => strtoupper('RSA'),

    //字符编码格式
    'input_charset' => strtolower('utf-8'),

    //ca证书路径地址，用于curl中ssl校验, 请保证cacert.pem文件在当前文件夹目录中
    'cacert'        => base_path('vendor/vikindev-alipay/src/pem/cacert.pem'),

    //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
    'transport'     => 'http',

    // 支付类型 ，无需修改
    'payment_type'  => "1",
];
