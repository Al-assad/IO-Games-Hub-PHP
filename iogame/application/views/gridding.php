<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/16 13:14
 * Description: Grdding 页面视图
 */
?>
<div class="center">

    <div class="page-header home-title">
        <h1><span class="glyphicon glyphicon-grain"></span> All IO Games
            <small>—— all io games in the gridding view (now including <?php echo count($items_list); ?> games !)</small></h1>
    </div>

<!--TODO:添加特效：鼠标覆盖游戏图片，浮现游戏数据-->

    <?php for($i=0;$i<count($items_list)-count($items_list)%4;$i+=4): ?>
    <div class="row">
        <?php for($k=$i;$k<$i+4;$k++):?>
        <div class="col-sm-4 col-md-3" >
            <div class="thumbnail thumbnail-gridding">
<!--                填充游戏主页链接-->
                <a href=""><img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$items_list[$k]['game_name']).'.png'; ?>"
                                alt="<?php echo $items_list[$k]['game_name']; ?>"/></a>
                <div class="caption img-description">
                    <div class="img-title"><?php echo ucfirst($items_list[$k]['game_name']);?></div>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
    <?php endfor; ?>

    <div class="row">
    <?php for($k=count($items_list)-count($items_list)%4;$k<count($items_list);$k++):?>
        <div class="col-sm-4 col-md-3" >
            <div class="thumbnail thumbnail-gridding">
                <!--                填充游戏主页链接-->
                <a href=""><img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$items_list[$k]['game_name']).'.png'; ?>"
                                alt="<?php echo $items_list[$k]['game_name']; ?>"/></a>
                <div class="caption img-description">
                    <div class="img-title"><?php echo ucfirst($items_list[$k]['game_name']);?></div>
                </div>
            </div>
        </div>
    <?php endfor; ?>
    </div>

</div>