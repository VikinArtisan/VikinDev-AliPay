#AliPay in laravel5.3

[![License](https://poser.pugx.org/vikin/alipay/license)](https://packagist.org/packages/vikin/alipay)
[![Total Downloads](https://poser.pugx.org/vikin/alipay/downloads)](https://packagist.org/packages/vikin/alipay)

>Laravel的支付宝支付package

##安装

这是一个标准的composer包,你可以在laravel根目录下执行下面的命令来进行安装:

```bash
composer require vikin/alipay
```
或者在你的composer.json文件中添加:

```bash
"vikin/alipay" : "0.7"
```
然后执行下面的命令进行安装:

```bash
composer update
```
##使用

####1、在`config/app.php`的`providers`数组中添加:

```php
\Vikin\AliPay\AliPayServiceProvider::class
```
####2、在`config/app.php`的`aliases`数组中添加:

```php
'AliPay' => \Vikin\AliPay\AliPay::class
```
####3、发布配置文件

```bash
php artisan vendor:publish
```

####4、配置

>1、`config/VikinDevAliPay.php`公共参数 <br>
>2、`config/VikinDevWapAliPay.php`wap支付参数 <br>
>3、`config/VikinDevWebAliPay.php`web支付参数

填写好三个参数文件;

####6、使用

>web支付

```php
//设置订单号
AliPay::setOrderNO($orderId);
//设置订单名称
AliPay::setOrderName($orderName);
//设置订单价格
AliPay::setOrderPrice($price);
//设置订单内容
AliPay::setOrderContent($orderDescription);
//跳转至支付页
return redirect()->to(AliPay::webRequest());
```
>wap支付

```php
//设置订单号
AliPay::setOrderNO($orderId);
//设置订单名称
AliPay::setOrderName($orderName);
//设置订单价格
AliPay::setOrderPrice($price);
//设置订单内容
AliPay::setOrderContent($orderDescription);
//跳转至支付页
return redirect()->to(AliPay::wapRequest());
```

