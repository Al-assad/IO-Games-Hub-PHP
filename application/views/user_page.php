<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/17 12:53
 * Description: 用户主页
 */
$this->load->helper('form');
?>


<div class="user-center">

<!-- 用户信息-->
    <div class="row">
        <div class="user-icon">
            <div class="thumbnail">
                <img src="<?php echo $base_url.'assets/user-icon/icon-'.$user_item['user_icon'].'.png'; ?>"
                     alt="<?php echo $user_item['user_icon']; ?>" width="200"/>
             </div>
        </div>
        <div class="user-message">
            <h1><span class="glyphicon glyphicon-leaf"></span> = <?php echo $user_item['user_name'];?> = </h1>
            <hr/><br/>
            <p>Create in : <?php echo $user_item['create_date'];?></p>
            <p>Collect games : <?php echo count($user_collect);?></p>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#changePassword">
                <span class="glyphicon glyphicon-credit-card"></span> Change password</button>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#email">
                <span class="glyphicon glyphicon-envelope"></span> Email Author</button>
        </div>
    </div>


<!--用户收藏-->
    <div class="page-header home-title">
        <h1><span class="glyphicon glyphicon-folder-close"></span> Collection</h1>
    </div>
    <div class="collect">

        <?php for($i=0;$i<count($user_collect)-count($user_collect)%6;$i+=6): ?>
            <div class="row">
                <?php for($k=$i;$k<$i+6;$k++):?>
                    <div class="col-sm-2 col-md-2" >
                        <div class="thumbnail thumbnail-gridding">
                            <?php if(!isset($_SESSION['username'])){?>
                            <a href="<?php echo $base_url.'index.php/gamePage/index/'. $user_collect[$k]['game_name'];?>"
                               target="_blank"><img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$user_collect[$k]['game_name']).'.png'; ?>"
                                                    alt="<?php echo $user_collect[$k]['game_name']; ?>"/></a>
                            <?php }else{ ?>
                                <a href="<?php echo $base_url.'index.php/gamePage/index/'. $user_collect[$k]['game_name'].'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>"
                                   target="_blank"><img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$user_collect[$k]['game_name']).'.png'; ?>"
                                                        alt="<?php echo $user_collect[$k]['game_name']; ?>"/></a>
                            <?php } ?>
                            <div class="caption img-description">
                                <div class="img-title"><?php echo ucfirst($user_collect[$k]['game_name']);?></div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>

        <div class="row">
            <?php for($k=count($user_collect)-count($user_collect)%6;$k<count($user_collect);$k++):?>
                <div class="col-sm-2 col-md-2" >
                    <div class="thumbnail thumbnail-gridding">
                        <?php if(!isset($_SESSION['username'])){?>
                        <a href="<?php echo $base_url.'index.php/gamePage/index/'. $user_collect[$k]['game_name'];?> "
                           target="_blank"><img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$user_collect[$k]['game_name']).'.png'; ?>"
                                                alt="<?php echo $user_collect[$k]['game_name']; ?>"/></a>
                        <?php }else{ ?>
                        <a href="<?php echo $base_url.'index.php/gamePage/index/'. $user_collect[$k]['game_name'].'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?> "
                           target="_blank"><img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$user_collect[$k]['game_name']).'.png'; ?>"
                                                alt="<?php echo $user_collect[$k]['game_name']; ?>"/></a>
                        <?php } ?>
                        <div class="caption img-description">
                            <div class="img-title"><?php echo ucfirst($user_collect[$k]['game_name']);?></div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<!--用户 have played-->



<!-- Email Modal -->
<div class="modal fade" id="email" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Email Al-assad <small>&lt;yulinying_1994@outlook.com&gt;</small></h3>
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

<!--change password model-->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change password</h4>
            </div>
            <div class="modal-body">

                <?php echo form_open('userPage/changePassword');?>
                <div class="input-group">
                    <span class="input-group-addon input-span" id="baisc-addon1"> Old Password </span>
                    <input type="text" name="old_password" class="form-control" placeholder="Please enter the old password" aria-describedby="basic-addon1">
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon input-span" id="baisc-addon2"> New Password</span>
                    <input type="text" name="new_password" class="form-control" placeholder="Please enter the new password" aria-describedby="basic-addon2">
                </div><br/>
                <input type="hidden" name="user_name" value="<?php echo $_SESSION['username'];?>">
                <div class="sign-btns">
                    <input type="reset" class="btn btn-default" value="Reset"/>
                    <input type="submit" class="btn btn-primary" value="Save"/>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>