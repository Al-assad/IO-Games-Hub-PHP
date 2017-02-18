<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/16 14:17
 * Description: Welcome 页面的视图
 */
$this->load->helper('form');?>
<div class="center-welcome">
    <div class="page-header">
        <h1 class="welcome-title">
            IO Games Hub
            <br/><small>just enjoy io games</small>
        </h1>
    </div>
    <div class="welcome-inner">
        <a data-toggle="modal" data-target="#signIn" >
            <button class="btn btn-default welcome-btn" type="button"><span class="glyphicon glyphicon-ok-sign"></span> Sign in</button></a>
        <a href="<?php echo $base_url.'index.php/home';?>">
            <button class="btn btn-default welcome-btn" type="button"><span class="glyphicon glyphicon-sunglasses"></span> Visitor</button></a>
    </div>
</div>

<!--Sign in 按钮模态框-->
<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!--Sign in 、Login切换标签页-->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#sign_tab" aria-controls="sign_tab" role="tab" data-toggle="tab">Sign in</a></li>
                    <li role="presentation" ><a href="#login_tab" aria-controls="login_tab" role="tab" data-toggle="tab">Log in</a></li>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </ul>

                <!--控制模型-->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="sign_tab">
                        <div class="sign-tab">

                            <?php echo form_open('userPage/signIn');?>
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
                                <input type="submit" class="btn btn-primary" value="Sign in"/>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="login_tab">
                        <div role="tabpanel" class="tab-pane active" id="sign_tab">
                            <div class="sign-tab">

                                <?php echo form_open('userPage/logIn');?>
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
                                    <input type="submit" class="btn btn-primary" value="Log in"/>
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

<div class="welcome-bottom">
    <a href="https://github.com/Al-assad/IO-Games-Hub-PHP">
        <img class="icon" src="<?php echo $base_url.'assets/icon-img/github2.png'; ?>" width="23px"/></a> @Al-assad in 2017
</div>


</body>
</html>

