<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/14 13:08
 * Description: Home页面视图
 */
?>
<!--页首轮播-->
<div class="home-top">
    <div class="center-carousel">
        <div id="home-carousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                <?php for($i=1;$i<count($carousel_list);$i++): ?>
                <li data-target="#home-carousel" data-slide-to="<?php echo $i; ?>"></li>
                <?php endfor;?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo $base_url.'assets/carousel-img/'.$carousel_list[0].'.png';?>" alt="<?php echo $carousel_list[0]; ?>">
                    <!--        添加指向主页的连接            -->
                    <div class="carousel-caption">
                        <a href=""><button type="button" class="btn btn-primary">Learn more</button></a> <br/><br/>
                    </div>
                </div>
                <?php for($i=1;$i<count($carousel_list);$i++): ?>

                <div class="item">
                    <img src="<?php echo $base_url.'assets/carousel-img/'.$carousel_list[$i].'.png' ?>" alt="<?php echo $carousel_list[$i]; ?>" >
<!--        添加指向主页的连接            -->
                    <div class="carousel-caption">
                        <a href=""><button type="button" class="btn btn-primary">Learn more</button></a> <br/><br/>
                    </div>
                </div>
                <?php endfor; ?>

            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>


<!--主页面部分-->

<div class="home-center">
    <div class="page-header home-title">
        <h1><span class="glyphicon glyphicon-grain"></span> Selection  <small>——best selection for you </small></h1>
    </div>

    <?php for($i=0; $i<count($items_list)-1;$i+=2): ?>
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$items_list[$i]['game_name']).'.png'; ?>" alt="<?php echo $items_list[$i]['game_name']; ?>" />
                </div>
            </div>
            <div class="col-md-8">
                <div class="page-header">
                    <h2><?php echo ucfirst($items_list[$i]['game_name']);?></h2><!--     插入游戏数值按钮 -->
                    <p><?php echo $items_list[$i]['game_description']; ?></p>
                    <a href="<?php echo $base_url.'index.php/gamePage/'. $items_list[$i]['game_name'];?>" target="_blank">
                        <button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-king"></span> Play</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h2><?php echo ucfirst($items_list[$i+1]['game_name']);?></h2><!--  插入游戏数值按钮 -->
                    <p><?php echo $items_list[$i+1]['game_description']; ?></p>
                    <a href="<?php echo $base_url.'index.php/gamePage/'. $items_list[$i+1]['game_name'];?>" target="_blank">
                        <button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-king"></span> Play</button></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$items_list[$i+1]['game_name']).'.png'; ?>" alt="<?php echo $items_list[$i+1]['game_name']; ?>">
                </div>
            </div>

        </div>
    <?php endfor; ?>

    <div class="page-header home-title">
        <h1><span class="glyphicon glyphicon-grain"></span> Play more <small>—— more interesting games </small></h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="<?php echo $base_url;?>assets/game-img/all.png" alt="all">
            </div>
        </div>
        <div class="col-md-8">
            <div class="page-header">
                <h2>Play more</h2>
                <p>
                    you can play more io games in the gridding page!
                </p>
                <a href="<?php echo $base_url.'index.php/gridding'?>"><button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-th"></span> Play more</button></a>
            </div>
        </div>

    </div>


</div>



