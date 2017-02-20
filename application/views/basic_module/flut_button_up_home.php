<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/16 13:25
 * Description: 浮动按钮
 */?>

<div class="flut">
    <a href="#">
        <button type="button" class="btn btn-default" data-toggle="tooltip" data-palcement="top" title="Top">
            <span class="glyphicon glyphicon-eject"></span></button>
    </a>
    <br/><br/>
    <?php if(!isset($_SESSION['username'])){?>
    <a href="<?php echo $base_url.'index.php/home'?>">
        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Gridding">
            <span class="glyphicon glyphicon-home"></span></button>
    </a>
    <?php }else{ ?>
        <a href="<?php echo $base_url.'index.php/home'.'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>">
            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Gridding">
                <span class="glyphicon glyphicon-home"></span></button>
        </a>
    <?php } ?>
</div>
