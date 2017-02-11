移植网站注意事项：

* iogame目录到时候为站点的根目录 iogames_assad_site；  

* iogame/root 目录到时候为站点 iogames_assad_site\Public_HTML 公开根目录下；

* 移植时iogame/root/index.php 更改 $system_path,$application_path 变量

* 禁用PHP错误报告,iogame/root/index.php 设置 ENVIRONMENT参量为 'production' 
  


