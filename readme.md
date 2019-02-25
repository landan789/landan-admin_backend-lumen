## 首次安装步骤

[1]. 步骤一，使用 git clone 下载此仓库代码
```shell
略
```
---------------------------------------

[2]. 步骤二，安装 supervisord
```shell
略
```
---------------------------------------


[3]. 步骤三，到 项目根目录 以 composer 安装相依的 PHP 套件
```shell
composer install
```
---------------------------------------



[4]. 步骤四，应以 php, swoole, supervisord 开启 php lumen 服务
```shell
php artisan swoole:http start
```
---------------------------------------

[5]. 步骤五，访问 http://127.0.0.1:4001
```shell
curl 127.0.0.1:4001
```
---------------------------------------


## Remote debug 步骤

[1]. 步骤一，在PHPStorm，打开 debug 监听，一定要先打开，否则监听失败
```Os
略
```
---------------------------------------

[2]. 步骤二，在伺服器，执行 php debug 模式
```shell
php -dxdebug.remote_autostart=1 -dxdebug.remote_host=10.0.2.2 -dxdebug.remote_port=9000 -dxdebug.remote_enable=1 artisan swoole:http start -vvv
```
---------------------------------------


[3]. 步骤三，在PHPStorm，Resume program 完所有的 swoole 程序
```OS
略
```
---------------------------------------

[4]. 步骤四，在 PHPStorm，下你想查看的断点
```OS
略
```
---------------------------------------


[5]. 步骤五，在 浏览器，访问 http://127.0.0.1:4000 (不需要放 XDEBUG COOKIE)
```OS
略
```
---------------------------------------

## 其他注意事项

[*]. 以 php, swoole, xdebug 开启 php lumen 服务

```shell
php -dxdebug.remote_autostart=1 -dxdebug.remote_host=10.0.2.2 -dxdebug.remote_port=9000 -dxdebug.remote_enable=1 artisan swoole:http start -vvv
```
---------------------------------------


[*]. 以 php, swoole, xdebug 关闭 php lumen 服务

```shell
php artisan swoole:http stop -vvv
```
---------------------------------------

[*]. 若更改了 composer.json 的 autoload 设定，需要执行 composer install

```shell
composer install
```
---------------------------------------


[*]. 考虑好维护的问题，
     请不要忽略 configs 底下的设定档案
     对于运维 环境变数 ，统一忽略 .env, 
     由 .env 档案去修改配置
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
```shell
略
```
---------------------------------------



[*]. 考虑好维护的问题，
     lumen 的 Controller,  命名请务必使用 {单数名词 + Controller}
     lumen 的 Model        命名请务必使用 {单数名词 + Model}
     lumen 的 Middleware   命名请务必使用 {单数名词 + Middleware}
     MySQL 的 数据表        命名请务必使用 {复数名词}

     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
```shell
略
```
---------------------------------------

[*]. 考虑好维护的问题，
     请忽略 /vender 底下的 代码，
     /vender 地下的代码不要进版本库
     改用 composer.json 去控制
     这种思维是 依照 nodejs 的 npm, python 的 pip 管理思维
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
```shell
略
```
---------------------------------------
