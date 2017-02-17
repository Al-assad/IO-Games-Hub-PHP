<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/17 12:53
 * Description: 用户主页
 */
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
                            <!--                填充游戏主页链接-->
                            <a href="<?php echo $base_url.'index.php/gamePage/'. $user_collect[$k]['game_name'];?>"
                               target="_blank"><img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$user_collect[$k]['game_name']).'.png'; ?>"
                                                    alt="<?php echo $user_collect[$k]['game_name']; ?>"/></a>
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
                        <a href="<?php echo $base_url.'index.php/gamePage/'. $user_collect[$k]['game_name'];?> "
                           target="_blank"><img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$user_collect[$k]['game_name']).'.png'; ?>"
                                                alt="<?php echo $user_collect[$k]['game_name']; ?>"/></a>
                        <div class="caption img-description">
                            <div class="img-title"><?php echo ucfirst($user_collect[$k]['game_name']);?></div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div><!--用户收藏-->


</div>

<!-- Email Modal -->
<div class="modal fade" id="email" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Email Al-assad</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Sent</button>
            </div>
        </div>
    </div>
</div>