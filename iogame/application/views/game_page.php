<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/16 15:21
 * Description: 游戏主页
 */
$this->load->helper('form');
?>

<div class="gamePage-center">

<!-- 游戏页面展示区-->
    <div class="page-header home-title">
        <h1><span class="glyphicon glyphicon-grain"></span><?php echo ucfirst($game_item['game_name']); ?></h1>
    </div>

    <div class="row">
        <div class="col-md-4 col-lg-4" style="margin-right:4%">
            <div class="thumbnail gamePage-thumbnail">
                <img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$game_item['game_name']).'.png'; ?>"
                     alt="<?php echo $game_item['game_name']; ?>"/>
            </div>
        </div>
        <div class="col-md-7 col-lg-7">
            <h2><?php echo ucfirst($game_item['game_name']);?>
<!-- TODO：添加交互事件，点击修改数据库数据，同时对用户进行验证-->
                <span class="game-value">
                    <a href=""><button class="btn btn-default gamePage-btn collected-btn" type="button"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Collected
                            <span class="badge"><?php echo $game_item['collected_count']; ?></span></button></a>
                    <a href=""><button class="btn btn-default gamePage-btn liked-btn" type="button"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Liked
                            <span class="badge"><?php echo $game_item['liked_count']; ?></span></button></a>
                </span>
            </h2>
            <hr/>
            <p><?php echo $game_item['game_description']; ?></p>
            <br/>
            <a href="<?php echo $game_item['game_link']?>" target="_blank">
                <button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-king"></span> Play Now</button></a>
        </div>
    </div><br/><br/>


<!-- 评论区 -->
    <div class="page-header home-title">
        <h1><span class="glyphicon glyphicon-blackboard"></span> Comment Area</h1>
    </div>

<!--    <div class="row comment-unit">
        <div class="col-md-3">
            <img src="<?php /*echo $base_url.'assets/';*/?>" width="50px">;
            <p>assad</p>
        </div>
        <div class="col-md-7">
            <p></p>
        </div>
        <hr/>
    </div>-->

    <!--评论框 -->
    <div class="comment-input">
        <?php echo form_open('gamePage/get_comment');?>
        <textarea class="form-control" rows="6" placeholder="Please enter your comment."></textarea>
        <input type="submit" name="submit" value="Comment" class="btn btn-default comment-btn" /></div>
    </div>


</div>


