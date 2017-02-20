<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/18 21:39
 * Description: 查找控制器
 */

class Search extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('base_model');
    }
    public function index(){
        if(isset($_POST['username'])){
            $_SESSION['username'] = $_POST['username'];
        }
        if(isset($_POST['usericon'])){
            $_SESSION['user-icon'] = $_POST['usericon'];
        }

         $str = htmlspecialchars(trim($_POST['search_str']));
         $data['results'] = $this->base_model->search($str);



         $data['title'] = 'Search-IO Games Hub';
         $data['base_url'] = base_url();
         $data['canvas_count'] = 170;
         $data['str'] = $str;


         $this->load->view('basic_module/header',$data);
         $this->load->view('basic_module/canvas_nest',$data);
         $this->load->view('basic_module/navigation_bar');
         $this->load->view('basic_module/flut_button_up_home');
         $this->load->view('search',$data);
         $this->load->view('basic_module/footer',$data);
    }
}
?>