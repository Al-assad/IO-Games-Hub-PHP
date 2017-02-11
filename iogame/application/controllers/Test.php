<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * Github: https://github.com/Al-assad
 * Description: 仅仅用于调通接口
 */

class Test extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('test');
    }
}
?>