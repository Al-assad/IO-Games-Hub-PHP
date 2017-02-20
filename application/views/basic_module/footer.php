<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/14 13:33
 * Description: 底部页脚
 */
?>
<div class="navbar bar-bottom">
    <hr/>
        <ul class="nav navbar-nav">
            <?php if(!isset($_SESSION['username'])){?>
                <li><a href="<?php echo $base_url.'index.php/welcome'?>" class="bar-a">
                        <span class="glyphicon glyphicon-eye-open"></span> Welcome</a></li>
                <li><a href="<?php echo $base_url.'index.php/home'; ?>" class="bar-a">
                        <span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="<?php echo $base_url.'index.php/gridding'?>" class="bar-a">
                        <span class="glyphicon glyphicon-th"></span> Gridding</a></li>

            <?php }else{?>
                <li><a href="<?php echo $base_url.'index.php/welcome'?>" class="bar-a">
                        <span class="glyphicon glyphicon-eye-open"></span> Welcome</a></li>
                <li><a href="<?php echo $base_url.'index.php/home?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon']; ?>" class="bar-a">
                        <span class="glyphicon glyphicon-home"></span> Home</a></li>

                <li><a href="<?php echo $base_url.'index.php/gridding?username='.$_SESSION['username'].'&usericon='.$_SESSION['user-icon']?>" class="bar-a">
                        <span class="glyphicon glyphicon-th"></span> Gridding</a></li>
            <?php }?>
        </ul>
</div>
<div class="home-bottom">
    <a href="https://github.com/Al-assad/IO-Games-Hub-PHP" target="_blank"><img class="icon" src="<?php echo $base_url; ?>/assets/icon-img/github2.png" width="23px"/></a> @Al-assad in 2017
</div>
</body>
</html>


