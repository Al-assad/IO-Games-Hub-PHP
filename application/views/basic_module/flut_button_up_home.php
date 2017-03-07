<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/16 13:25
 * Description: 浮动按钮
 */?>
<div class="go_top">
    <!--每一个按钮都为一个 go_top-item 类-->
    <div class="go_top-item">
        <a href="#" id="go_top"><span class="go_top-item-icon glyphicon glyphicon-chevron-up"><span class="go_top-item-text"> Top</span></span></a>
    </div>
    <div class="go_top-item">
        <?php if(!isset($_SESSION['username'])){?>
            <a href="<?php echo $base_url.'index.php/home'?>" >
                <span class="go_top-item-icon glyphicon glyphicon-home"><span class="go_top-item-text"> Home</span></span></a>
        <?php }else{ ?>
            <a href="<?php echo $base_url.'index.php/home'.'?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon'];?>" >
                <span class="go_top-item-icon glyphicon glyphicon-home"><span class="go_top-item-text"> Home</span></span></a>
        <?php } ?>
    </div>

    <div class="go_top-item">
        <a id="go_bottom"><span class="go_top-item-icon glyphicon glyphicon-chevron-down"><span class="go_top-item-text"> Bottom</span></span></a>
    </div>

</div>

