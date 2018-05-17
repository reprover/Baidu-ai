# baidu-ai
百度AI封装

##用法：
首先引入composer
> composer require reprover/baidu-ai
当前最新版本1.2

> php artisan vendor:publish

在config/ai.php中配置apiKey等信息

已经注册Facade

用法：

```php

$result = Ai::Nlp()->topic('标题','这里是测试文本');
dump($result);

```

用法和百度官方sdk一致

https://ai.baidu.com/docs#/


