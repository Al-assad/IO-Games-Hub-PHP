<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/14 13:41
 * Description:导航条组件
 */
?>

<div class="navbar navbar-inverse ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-globe"></span>  IO Games Hub</a>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="<?php echo $base_url.'index.php/welcome'?>">
                    <span class="glyphicon glyphicon-eye-open"></span> Welcome</a></li>
            <li><a href="<?php echo $base_url.'index.php/home'?>">
                    <span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="<?php echo $base_url.'index.php/gridding'?>">
                    <span class="glyphicon glyphicon-th"></span> Gridding</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" >
            <li><a href=""><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
            <li><a href=""><span class="glyphicon glyphicon-envelope"></span> Email Author</a></li>
        </ul>
    </div>
</div>
