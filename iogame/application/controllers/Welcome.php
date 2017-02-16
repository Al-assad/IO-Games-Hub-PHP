<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/16 14:14
 * Description: Welcome页面的控制器
 */

class Welcome extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $data['title'] = 'Welcome-IO Games Hub';
        $data['canvas_count'] = 210;
        $data['base_url'] = base_url();
        $this->load->view('basic_module/header',$data);
        $this->load->view('basic_module/canvas_nest',$data);
        $this->load->view('welcome');
    }
}
?>