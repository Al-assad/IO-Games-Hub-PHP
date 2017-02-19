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
        $this->load->helper(array('url','form','directory'));
        $this->load->library(array('form_validation','session'));
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


    //用户登录
    public function logIn(){
        //表单常规验证
        $this->form_validation->set_rules('user_name','Username','required|htmlspecialchars|trim');
        $this->form_validation->set_rules('password','Password','required|htmlspecialchars|trim');
        if($this->form_validation->run() == FALSE){
            $data['title'] = 'Log in error';
            $data['base_url'] = base_url();
            $data['canvas_count'] = 200;
            $data['error_message'] = '';
            $this->load->view('basic_module/header',$data);
            $this->load->view('basic_module/navigation_bar');
            $this->load->view('basic_module/canvas_nest',$data);
            $this->load->view('log_in',$data);
            $this->load->view('basic_module/footer',$data);
        }else{
            //数据库查询
            $user_data['username'] = $_POST['user_name'];
            $user_data['password'] = $_POST['password'];

            $result  = $this->base_model->validate_log_in($user_data);

            if($result == 'no name' || $result == 'no password'){
                $data['title'] = 'Sign in error';
                $data['base_url'] = base_url();
                $data['canvas_count'] = 200;
                if($result == 'no name' ){
                    $data['error_message'] = 'There is not such a user name.';
                }else{
                    $data['error_message'] = 'The password is wrong.';
                }
                $this->load->view('basic_module/header',$data);
                $this->load->view('basic_module/navigation_bar');
                $this->load->view('basic_module/canvas_nest',$data);
                $this->load->view('log_in',$data);
                $this->load->view('basic_module/footer',$data);

            }else{
                //将信息添加到session
                $user_data['username'] = $_POST['user_name'];
                $user_data['user-icon'] = $this->base_model->get_user_icon($user_data['username']);
                $this->session->set_userdata($user_data);

                //跳转到home页面
                $list = directory_map('./assets/carousel-img/');
                for($i=0;$i<count($list);$i++){
                    $list[$i] = explode('.',$list[$i])[0];
                }
                $data['title'] = 'Home-IO Games Hub';
                $data['base_url'] = base_url();
                $data['canvas_count'] = 160;
                $data['carousel_list'] = $list;
                $data['items_list'] = $this->base_model-> get_data_home();   //获取数据库初始数据
                $data['message'] = 'Hello,'. $user_data['username'].'! Welcome to IO Games Hub';
                $data['top_collect_list'] = $this->base_model->get_top_collected(7);
                $data['top_liked_list'] = $this->base_model->get_top_liked(7);

                $this->load->view('basic_module/header',$data);
                $this->load->view('basic_module/canvas_nest',$data);
                $this->load->view('basic_module/navigation_bar');
                $this->load->view('basic_module/flut_button_up_gridding');
                $this->load->view('home',$data);
                $this->load->view('basic_module/footer',$data);
                $this->load->view('basic_module/popup',$data);
            }

        }
    }

    //用户注册
    public function signIn(){
        //表单常规验证
        $this->form_validation->set_rules('user_name','Username','required|htmlspecialchars|trim');
        $this->form_validation->set_rules('password','Password','required|htmlspecialchars|trim');
        $this->form_validation->set_rules('check','Password','required|htmlspecialchars|trim');
        if($this->form_validation->run() == FALSE || trim($this->input->post('password')) != trim($this->input->post('check'))){
            $data['title'] = 'Sign in error';
            $data['base_url'] = base_url();
            $data['canvas_count'] = 200;
            $data['error_message'] = '';
            if(trim($this->input->post('password')) != trim($this->input->post('check'))){
                $data['error_message'] = 'Two passwords are not the same';
            }
            $this->load->view('basic_module/header',$data);
            $this->load->view('basic_module/navigation_bar');
            $this->load->view('basic_module/canvas_nest',$data);
            $this->load->view('sign_in',$data);
            $this->load->view('basic_module/footer',$data);
        }else{
            //数据库查询
            $user_data['username'] = $_POST['user_name'];
            $user_data['password'] = $_POST['password'];

            $result  = $this->base_model->sign_in($user_data);

            if($result == FALSE){
                $data['title'] = 'Log in error';
                $data['base_url'] = base_url();
                $data['canvas_count'] = 200;
                $data['error_message'] = 'The user name aleardy exists.';
                $this->load->view('basic_module/header',$data);
                $this->load->view('basic_module/navigation_bar');
                $this->load->view('basic_module/canvas_nest',$data);
                $this->load->view('sign_in',$data);
                $this->load->view('basic_module/footer',$data);

            }else{
                //将信息添加到session
                $user_data['username'] = $_POST['user_name'];
                $user_data['user-icon'] = $this->base_model->get_user_icon($user_data['username']);
                $this->session->set_userdata($user_data);

                $this->index($user_data['username']);
                $data['message'] =  'Hello,'. $user_data['username'].'! Welcome to IO Games Hub</p>
                                    <p>The system recommend 7 IO Games randomly to you.</p>
                                    <p>You can cancel the collection in the game page.</p>';
                $this->load->view('basic_module/popup',$data);
            }
        }
    }

    // 更改密码
    public function changePassword(){
        $user_data['username'] = $_POST['user_name'];
        $user_data['old_password'] = $_POST['old_password'];
        $user_data['new_password'] = $_POST['new_password'];
        $this->form_validation->set_rules('old_password', 'Password', 'required|htmlspecialchars|trim');
        $this->form_validation->set_rules('new_password', 'Password', 'required|htmlspecialchars|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->index($_SESSION['username']);
        }else{
            $datas['username'] = $_SESSION['username'];
            $datas['old_password'] = $user_data['old_password'];
            $datas['new_password'] = $user_data['new_password'];
            $result = $this->base_model->set_password($datas);
            if($result){
                $data['message'] = 'The password is changed.';
                $this->index($datas['username']);
                $this->load->view('popup',$data);
            }else{
                $data['message'] = 'Fail to change password.';
                $this->index($datas['username']);
                $this->load->view('basic_module/popup',$data);
            }
        }

    }


}
?>