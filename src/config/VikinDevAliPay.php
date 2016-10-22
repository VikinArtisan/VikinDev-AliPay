<?php

return [
    //合作身份者ID，以2088开头由16位纯数字组成的字符串
    'partner'       => '2088711460839140',

    //收款支付宝账号，以2088开头由16位纯数字组成的字符串
    'seller_id'     => '2088711460839140',

    //商户的私钥
    'private_key'   => 'MIICXgIBAAKBgQDCuXtrq0J9+RDxkt6x0wKza1Ws3NkuOBbxfFQCGiWcIi1q/wukvoNs+NjV2nzwzSSxpYiJ5iiA2helL1PRlmy5zLTQCjuLheE2x/DF9GNSu1ZY36/GDpXr7YQ/njf85X+iwaotEX4xnKHFL/qgfzMVKvd7mpCQeCeV+McT8HaWowIDAQABAoGBAL+tExduElqsVAhnmTyTyEHSsxggoMwFPFhjGNKk6Eajwe9jtRNq0TXwUolXs8rZNHiFyDxtyYrko4ffaXOSzdvxmsxM0DZhjBWpsdL/stoAaoq00iJHcAeeaGHbKsd3xxyTddIyDW0eUwHnvoIhC0ANaF68DY1vxF5/478oQluRAkEA9C1ycBOrfS6HZi2UA/hE09VTIZOlS7zjjusPhJS1IjWdGurGhGNoBTMOC9XBeB62SQ/bPJ7DkdkEHFoIUICZGQJBAMwnEiRo60TsWxRyI7To8DtuhIdjLynxglBqZoDqJ+gvKsXOW8kgfUAElv6udg02jKJvEommgfHgFTcY1mrrGRsCQBQC4X0T75r7xDb4h0foAeQGeKCo1AQn/9JHq2bnNQ0Prcd19D0HVJAQhhcsNoXcpn3IYeRO8qIyUebs7f+C+okCQQDIitDdh1slV3CZAw5kVjY2i3gQbrQT5bP3Pq32kQ4mnL7NlMrBJfMjgd65y7MXg7Bel/GD2lbnvRHaD8IBQXRlAkEA3Xgr05uTA3GSrZX2HsNIjM+6DGnHF8+PYlHdH506j5tEAdmccoJfgMp9+UTw3X5u+gF0okN3v4yzWG1vM0+j0Q==',

    //支付宝的公钥
    'public_key'    => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB',

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
