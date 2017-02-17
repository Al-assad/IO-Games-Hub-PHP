<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/17 12:52
 * Description: 用户主页控制器
 */

class UserPage extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('base_model');
        $this->load->helper('url');
    }

    public function index($username){
        $data['user_item'] = $this->base_model->get_data_userPage($username);
        $data['user_collect'] = $this->base_model->get_data_user_collect($username);
        $data['base_url'] = base_url();
        $data['title'] = $username.'-- User Page';
        $data['canvas_count'] = 200;

        $this->load->view('basic_module/header',$data);
        $this->load->view('basic_module/canvas_nest',$data);
        $this->load->view('basic_module/navigation_bar');
        $this->load->view('basic_module/flut_button_up_gridding');

        if(count( $data['user_item'])>0){
            $this->load->view('user_page',$data);
        }else{
            $this->load->view('no_user',$data);
        }
        $this->load->view('basic_module/footer',$data);
    }

    public function singIn(){

    }
}
?>