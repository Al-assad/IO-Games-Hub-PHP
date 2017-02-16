移植网站注意事项：



* 移植时iogame/root/index.php 更改 $system_path,$application_path 变量

* 更改数据库连接的配置文件

* 禁用PHP错误报告,iogame/root/index.php 设置 ENVIRONMENT参量为 'production'

   
移动application,system,SQL console 文件夹到站点根目录之外，（或者屏蔽这两个文件夹，同时nginx引入.htaccsess文件）

* iogame目录到时候为站点的根目录 iogames_assad_site；  

* iogame/root 目录到时候为站点 iogames_assad_site\Public_HTML 公开根目录下；


  


