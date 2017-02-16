<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/16 14:17
 * Description: Welcome 页面的视图
 */?>
<div class="center-welcome">
    <div class="page-header">
        <h1 class="welcome-title">
            IO Games Hub
            <br/><small>just enjoy io games</small>
        </h1>
    </div>
    <div class="welcome-inner">
        <a href="">
            <button class="btn btn-default welcome-btn" type="button"><span class="glyphicon glyphicon-ok-sign"></span> Sign in</button></a>
        <a href="<?php echo $base_url.'index.php/home';?>">
            <button class="btn btn-default welcome-btn" type="button"><span class="glyphicon glyphicon-sunglasses"></span> Visitor</button></a>
    </div>
</div>

<div class="welcome-bottom">
    <a href="https://github.com/Al-assad/IO-Games-Hub-PHP">
        <img class="icon" src="<?php echo $base_url.'assets/icon-img/github2.png'; ?>" width="23px"/></a> @Al-assad in 2017
</div>


</body>
</html>

