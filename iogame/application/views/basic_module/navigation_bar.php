<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/14 13:41
 * Description:导航条组件
 */
$this->load->helper('form');
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
            <li><a  data-toggle="modal" data-target="#signIn"><span class="glyphicon glyphicon-user" ></span> Sign in</a></li>
            <li><a href=""><span class="glyphicon glyphicon-envelope"></span> Email Author</a></li>
        </ul>
    </div>
</div>

<!--Sign in 按钮模态框-->
<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sign in</h4>
            </div>
            <div class="modal-body">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--Email Author 按钮模态框-->