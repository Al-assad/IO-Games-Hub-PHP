<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/17 20:48
 * Description:
 */
?>

<div class="sign-in-center">



    <div class="sign-in-title">
        <h1>= Log in =</h1>
    </div>
    <hr/>

    <div class="sign-in-content">
        <p><?php echo validation_errors(); echo $error_message; ?></p><br/>
    <?php echo form_open('userPage/logIn');?>
    <div class="input-group">
        <span class="input-group-addon" id="baisc-addon1"> User name </span>
        <input type="text" name="user_name" class="form-control" value="<?php echo $_POST['user_name']; ?>" placeholder="Please enter your user name" aria-describedby="basic-addon1">
    </div>
    <br/>
    <div class="input-group">
        <span class="input-group-addon" id="baisc-addon2"> Password   </span>
        <input type="password" name="password" class="form-control" value="<?php echo $_POST['password']; ?>" placeholder="Please enter your password" aria-describedby="basic-addon2">
    </div><br/>
    <div class="sign-in-btns">
        <input type="reset" class="btn btn-default" value="Reset"/>
        <input type="submit" class="btn btn-primary" value="Log in"/>
    </div>
        </form>
    </div>

</div>


