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

[4]. 步骤五，访问 http://127.0.0.1:4001
```shell
curl 127.0.0.1:4001
```
---------------------------------------

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
     对于运维 环境变数 ，统一由 .env 档案去修改配置
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
```shell
略
```
---------------------------------------



[*]. 考虑好维护的问题，
     Controller,  命名请务必使用 {单数名词 + Controller}
     Model        命名请务必使用 {单数名词 + Model}
     Middleware   命名请务必使用 {单数名词 + Middleware}

     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
     ！！！！！！！！！！！！！！！！！！！！！！！
```shell
略
```
---------------------------------------
