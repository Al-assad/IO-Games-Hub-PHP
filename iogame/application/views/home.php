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
                    <img class="carousel-img" src="<?php echo $base_url.'assets/carousel-img/'.$carousel_list[0].'.png';?>" alt="<?php echo $carousel_list[0]; ?>">
                    <!--        添加指向主页的连接            -->
                    <div class="carousel-caption">
                        <?php if(!isset($_SESSION['username'])){?>
                            <a href="<?php echo $base_url.'index.php/gamePage/index/'.str_replace('-','.',$carousel_list[0]);?>"><button type="button" class="btn btn-primary">Learn more</button></a> <br/><br/>
                        <?php }else{ ?>
                            <a href="<?php echo $base_url.'index.php/gamePage/index/'.str_replace('-','.',$carousel_list[0]).'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>"><button type="button" class="btn btn-primary">Learn more</button></a> <br/><br/>
                        <?php } ?>
                    </div>
                </div>
                <?php for($i=1;$i<count($carousel_list);$i++): ?>

                <div class="item">
                    <img class="carousel-img"  src="<?php echo $base_url.'assets/carousel-img/'.$carousel_list[$i].'.png' ?>" alt="<?php echo $carousel_list[$i]; ?>" >
<!--        添加指向主页的连接            -->
                    <div  class="carousel-caption">
                        <?php if(!isset($_SESSION['username'])){?>
                        <a href="<?php echo $base_url.'index.php/gamePage/index/'.str_replace('-','.',$carousel_list[$i]);?>"><button type="button" class="btn btn-primary">Learn more</button></a> <br/><br/>
                        <?php }else{ ?>
                            <a href="<?php echo $base_url.'index.php/gamePage/index/'.str_replace('-','.',$carousel_list[$i]).'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>"><button type="button" class="btn btn-primary">Learn more</button></a> <br/><br/>
                        <?php } ?>
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
<div class="row home-main">
<!--左侧精选详情页 -->
    <div class="col-md-9">
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
                    <h2><?php echo ucfirst($items_list[$i]['game_name']);?>
                    </h2><!--     插入游戏数值按钮 -->
                    <p class="home-p"><?php echo $items_list[$i]['game_description']; ?></p>

                     <span class="home-labels">
                             <span class="home-label"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Collected
                                 <span class="badge"><?php echo $items_list[$i]['collected_count']; ?></span></span>

                            <span class="home-label"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Liked
                                <span class="badge"><?php echo $items_list[$i]['liked_count']; ?></span></span>

                        </span>

                    <?php if(!isset($_SESSION['username'])){?>
                    <a href="<?php echo $base_url.'index.php/gamePage/index/'. $items_list[$i]['game_name'];?>" target="_blank">
                        <button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-king"></span> Play</button></a>
                    <?php }else{ ?>
                        <a href="<?php echo $base_url.'index.php/gamePage/index/'. $items_list[$i]['game_name'].'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>" target="_blank">
                            <button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-king"></span> Play</button></a>
                    <?php } ?>
                <br/><hr/>
                </div>
        </div>

        <div class="row">
            <div class="col-md-8">

                    <h2><?php echo ucfirst($items_list[$i+1]['game_name']);?>
                    </h2><!--  插入游戏数值按钮 -->
                    <p class="home-p"><?php echo $items_list[$i+1]['game_description']; ?></p>

                         <span class="home-labels">
                             <span class="home-label"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Collected
                                 <span class="badge"><?php echo $items_list[$i]['collected_count']; ?></span></span>

                            <span class="home-label"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Liked
                                <span class="badge"><?php echo $items_list[$i]['liked_count']; ?></span></span>

                        </span>

                    <?php if(!isset($_SESSION['username'])){?>
                    <a href="<?php echo $base_url.'index.php/gamePage/index/'. $items_list[$i+1]['game_name'];?>" target="_blank">
                        <button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-king"></span> Play</button></a>
                    <?php }else{ ?>
                    <a href="<?php echo $base_url.'index.php/gamePage/index/'. $items_list[$i+1]['game_name'].'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>" target="_blank">
                        <button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-king"></span> Play</button></a>
                    <?php } ?>

                <br/><hr/>

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
                <?php if(isset($_SESSION['username'])){?>
                <a href="<?php echo $base_url.'index.php/gridding?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon']?>"><button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-th"></span> Play more</button></a>
                <?php }else{?>
                <a href="<?php echo $base_url.'index.php/gridding'?>"><button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-th"></span> Play more</button></a>
                <?php }?>
            </div>
        </div>

    </div>


</div>
    </div>
<!-- 右侧排行版-->
    <div class="col-md-3">
        <!--collect top5-->
            <div class="btn-group-vertical home-right-gavs" role="group">
                <button type="button" class="btn btn-default home-right-title">— Collection Top 7 —</button>
                <?php foreach($top_collect_list as $item):?>

                <?php if(!isset($_SESSION['username'])){?>
                <button type="button" class="btn btn-default home-right-items">
                    <a href="<?php echo $base_url.'index.php/gamePage/index/'. $item['game_name'];?>" target="_blank">
                    <img class="top-img" src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$item['game_name']).'.png'; ?>"><br/>
                    <span class="gavs-title"><?php echo $item['game_name'];?></span><span class="badge gavs-value"><?php echo $item['collected_count'];?></span>
                    </a>
                </button>
                <?php }else{ ?>
                        <button type="button" class="btn btn-default home-right-items">
                            <a href="<?php echo $base_url.'index.php/gamePage/index/'. $item['game_name'].'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>" target="_blank">
                                <img class="top-img" src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$item['game_name']).'.png'; ?>"><br/>
                                <span class="gavs-title"><?php echo $item['game_name'];?></span><span class="badge gavs-value"><?php echo $item['collected_count'];?></span>
                                </a>
                            </button>
                    <?php } ?>
                <?php endforeach;?>
            </div>

        <!--like top5-->
        <div class="btn-group-vertical home-right-gavs" role="group">
            <button type="button" class="btn btn-default home-right-title">— Like Top 7 —</button>
            <?php foreach($top_liked_list as $item):?>

                <?php if(!isset($_SESSION['username'])){?>
                    <button type="button" class="btn btn-default home-right-items">
                        <a href="<?php echo $base_url.'index.php/gamePage/index/'. $item['game_name'];?>" target="_blank">
                            <img class="top-img" src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$item['game_name']).'.png'; ?>"><br/>
                            <span class="gavs-title"><?php echo $item['game_name'];?></span><span class="badge gavs-value"><?php echo $item['liked_count'];?></span>
                        </a>
                    </button>
                <?php }else{ ?>
                    <button type="button" class="btn btn-default home-right-items">
                        <a href="<?php echo $base_url.'index.php/gamePage/index/'. $item['game_name'].'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>" target="_blank">
                            <img class="top-img" src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$item['game_name']).'.png'; ?>"><br/>
                            <span class="gavs-title"><?php echo $item['game_name'];?></span><span class="badge gavs-value"><?php echo $item['liked_count'];?></span>
                        </a>
                    </button>
                <?php } ?>
            <?php endforeach;?>
        </div>

    </div>
</div>


