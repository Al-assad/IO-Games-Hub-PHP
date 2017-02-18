<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/18 5:11
 * Description: 具有返回上一页的popup
 */
?>

<script>
    function back(){
        window.history.back();
    }
</script>
<div class="modal fade" id="popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Message</h3>
            </div>
            <div class="modal-body">
                <h4><?php echo $message;?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="back()">OK</button>
            </div>
        </div>
    </div>
</div>

<script>$('#popup').modal()</script>;
