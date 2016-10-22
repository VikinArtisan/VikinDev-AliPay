#AliPay in laravel5.3

[![License](https://poser.pugx.org/vikin/alidayu/license)](https://packagist.org/packages/vikin/alidayu)
[![Total Downloads](https://poser.pugx.org/vikin/alidayu/downloads)](https://packagist.org/packages/vikin/alidayu)

>Laravel的支付宝支付package

##安装

这是一个标准的composer包,你可以在laravel根目录下执行下面的命令来进行安装:

```bash
composer require vikin/alidayu
```
或者在你的composer.json文件中添加:

```bash
"vikin/alidayu" : "~1.0"
```
然后执行下面的命令进行安装:

```bash
composer update
```
##使用

####1、在`config/app.php`的`providers`数组中添加:

```php
\Vikin\Alidayu\AlidayuServiceProvider::class
```
####2、在`config/app.php`的`aliases`数组中添加:

```php
'Alidayu' => \Vikin\Alidayu\Facade\Alidayu::class
```
####3、发布配置文件

```bash
php artisan vendor:publish
```
当看到下面提示时

```bash
Copied File [/vendor/vikin/alidayu/Config/alidayu.php] To [/config/alidayu.php]
```
说明配置文件已经成功迁移到你项目的config目录下;

####4、打开`config/alidayu.php`并填写上应用key

```php
return [
    'appkey'    => '',
    'secretKey' => ''
];
```
key值在阿里大于中获取:[前往阿里大于](https://www.alidayu.com/)

####5、发送短信

```php
$return = Alidayu::send([ 
    'code' => 验证码, 
    'product' => '公司名称', 
    'phone' => 接收对象, 
    'template_id' => '短信模板ID' 
    ], '签名');
```
其中`$return`是阿里大于发送结果返回值,值类型为`array`;

