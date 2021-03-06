<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/17 22:15
 * Description:
 */
?>


<div class="sign-in-center">

    <div class="sign-in-title">
        <h1>= Sign in =</h1>
    </div>
    <hr/>

    <div class="sign-in-content">
        <p><?php echo validation_errors(); echo $error_message; ?></p><br/>
        <?php echo form_open('userPage/signIn');?>
        <div class="input-group">
            <span class="input-group-addon" id="baisc-addon3"> User name </span>
            <input type="text" name="user_name" class="form-control" value="<?php echo $_POST['user_name']; ?>"
                   placeholder="Please enter your user name" aria-describedby="basic-addon3">
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon" id="baisc-addon4"> Password   </span>
            <input type="password" name="password" class="form-control" value="<?php echo $_POST['password']; ?>"
                   placeholder="Please enter your password" aria-describedby="basic-addon4">
        </div><br/>
        <div class="input-group">
            <span class="input-group-addon" id="baisc-addon5"> Check </span>
            <input type="password" name="check" class="form-control" placeholder="Please enter your password Again" aria-describedby="basic-addon5">
        </div><br/>
        <div class="sign-btns">
            <input type="reset" class="btn btn-default" value="Reset"/>
            <input type="submit" class="btn btn-primary" value="Sign in"/>
        </div>
        </form>
    </div>

</div>

