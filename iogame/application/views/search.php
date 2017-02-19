<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/18 21:41
 * Description: search 页面
 */
?>


<div class="search-center">
    <div class="page-header home-title search-title">
        <h1>= <span class="glyphicon glyphicon-search"></span> Search =</h1>
    </div>
    <form action="<?php echo $base_url.'index.php/search/index'?>" method="post">
        <div class="input-group search-input">
            <input name="search_str" type="text" class="form-control" placeholder="Search for..." value="<?php echo $str;?>">
            <?php if(isset($_SESSION['username'])){?>
                <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
                <input type="hidden" name="usericon" value="<?php echo $_SESSION['user-icon'];?>">
            <?php }?>
            <span class="input-group-btn"><button class="btn btn-default" type="submit"">
                        <span class="glyphicon glyphicon-search"></span> GO </button></span>
        </div>
    </form>
    <?php if(count($results) == 0) { ?>
        <div class="search-message">
        <p>Found nothing , please try again.</p>
        <p>If you want to introduce some other IO games to me, you can click the 'Email Author' button to sent a email to me.</p>
        </div>
    <?php }else{ ?>
        <div class="search-message">
            <p> <?php echo count($results);?> results found</p>
        </div>
     <?php  foreach($results as $item):?>
            <div class="row search-item">
                <div class="col-md-4">
                    <img class="search-img" src="<?php echo $base_url.'assets/game-img/'.str_replace('.','-',$item['game_name']).'.png'?>">
                </div>
                <div class="col-md-8" >
                    <h3><?php echo $item['game_name']?></h3>
                    <p><?php if($item['game_description'] == NULL) {
                            echo 'There is no description temporarily.';
                        }else{
                            echo substr($item['game_description'],0,250).' ...';
                        }?></p><br/>

                    <?php if(!isset($_SESSION['username'])){?>
                        <a href="<?php echo $base_url.'index.php/gamePage/index/'. $item['game_name'];?>" target="_blank">
                            <button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-king"></span> Play</button></a>
                    <?php }else{ ?>
                        <a href="<?php echo $base_url.'index.php/gamePage/index/'. $item['game_name'].'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>" target="_blank">
                            <button type="button" class="btn btn-default home-btn"><span class="glyphicon glyphicon-king"></span> Play</button></a>
                    <?php } ?>
                </div>
            </div>
            <hr/>
        <?php endforeach;
    }?>




</div>
