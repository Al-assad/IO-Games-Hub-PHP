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
            <?php if(!isset($_SESSION['username'])){?>
                <li><a href="<?php echo $base_url.'index.php/welcome'?>">
                        <span class="glyphicon glyphicon-eye-open"></span> Welcome</a></li>
                <li><a href="<?php echo $base_url.'index.php/home'; ?>">
                        <span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="<?php echo $base_url.'index.php/gridding'?>">
                        <span class="glyphicon glyphicon-th"></span> Gridding</a></li>

            <?php }else{?>
            <li><a href="<?php echo $base_url.'index.php/welcome'?>">
                    <span class="glyphicon glyphicon-eye-open"></span> Welcome</a></li>
            <li><a href="<?php echo $base_url.'index.php/home?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon']; ?>">
                    <span class="glyphicon glyphicon-home"></span> Home</a></li>

            <li><a href="<?php echo $base_url.'index.php/gridding?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon']?>">
                    <span class="glyphicon glyphicon-th"></span> Gridding</a></li>
            <?php }?>
        </ul>

        <ul class="nav navbar-nav navbar-right" >

            <?php if(!isset($_SESSION['username'])){
                echo '<li><a data-toggle="modal" data-target="#signIn"><span class="glyphicon glyphicon-user" ></span> Log in</a></li>';
            }else{
                echo '<li><a href="'.$base_url.'index.php/userPage/index/'.$_SESSION['username'].'">
                <img src="'.$base_url.'assets/user-icon/icon-'.$_SESSION['user-icon'].'.png'.'"
                width="22px" >  -'.$_SESSION['username'].'</a></li>';
            }?>
            <li><a data-toggle="modal" data-target="#email"><span class="glyphicon glyphicon-envelope"></span> Email Author</a></li>
        </ul>

        <!--search tools-->
        <form class="navbar-form navbar-right" action="<?php echo $base_url.'index.php/search/index'?>" method="post">
            <div class="input-group">
                <input name="search_str" type="text" class="form-control" placeholder="Search for..." >
                <?php if(isset($_SESSION['username'])){?>
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
                    <input type="hidden" name="usericon" value="<?php echo  $_SESSION['user-icon'];?>">
                <?php }?>
                <span class="input-group-btn"><button class="btn btn-default" type="submit"">
                        <span class="glyphicon glyphicon-search"></span></button></span>
            </div>
        </form>

    </div>
</div>

<!--log in 按钮模态框-->
<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <!--Sign in 、Login切换标签页-->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#log_tab" aria-controls="sign_tab" role="tab" data-toggle="tab">Log in</a></li>
                    <li role="presentation" ><a href="#sign_tab" aria-controls="login_tab" role="tab" data-toggle="tab">Sign in</a></li>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </ul>

                <!--控制模型-->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="log_tab">
                        <div class="sign-tab">

                            <?php echo form_open('userPage/logIn');?>
                            <div class="input-group">
                                <span class="input-group-addon input-span" id="baisc-addon1"> User name </span>
                                <input type="text" name="user_name" class="form-control" placeholder="Please enter your user name" aria-describedby="basic-addon1">
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon input-span" id="baisc-addon2"> Password   </span>
                                <input type="password" name="password" class="form-control" placeholder="Please enter your password" aria-describedby="basic-addon2">
                            </div><br/>
                            <div class="sign-btns">
                                <input type="reset" class="btn btn-default" value="Reset"/>
                                <input type="submit" class="btn btn-primary" value="Log in"/>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="sign_tab">
                            <div class="sign-tab">

                                <?php echo form_open('userPage/signIn');?>
                                <div class="input-group">
                                    <span class="input-group-addon input-span" id="baisc-addon3"> User name </span>
                                    <input type="text" name="user_name" class="form-control" placeholder="Please enter your user name" aria-describedby="basic-addon3">
                                </div>
                                <br/>
                                <div class="input-group">
                                    <span class="input-group-addon input-span" id="baisc-addon4"> Password   </span>
                                    <input type="password" name="password" class="form-control" placeholder="Please enter your password" aria-describedby="basic-addon4">
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon input-span" id="baisc-addon5"> Check </span>
                                    <input type="password" name="check" class="form-control" placeholder="Please enter your password Again" aria-describedby="basic-addon5">
                                </div><br/>
                                <div class="sign-btns">
                                    <input type="reset" class="btn btn-default" value="Reset"/>
                                    <input type="submit" class="btn btn-primary" value="Sign in"/>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Email Author 按钮模态框-->
<div class="modal fade" id="email" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Email Al-assad <small> &lt;yulinying_1994@outlook.com&gt;</small></h3>
            </div>
            <div class="modal-body">
                <p>You can write down what you think about this simple site, and also if you want to share some other
                    IO game with me.</p>
                <?php echo form_open('email/index');?>
                <textarea name="content" class="form-control email-textarea" rows="30" placeholder="write something"></textarea>
                <div class="email-btn"><input type="submit" class="btn btn-primary" value="sent" ></div>
                <input type="hidden" name="username" value="<?php if(isset($_SESSION['username'])){
                    echo $_SESSION['username']; }else{ echo 'no name';
                }?>">
                </form>

            </div>
        </div>
    </div>
</div>
