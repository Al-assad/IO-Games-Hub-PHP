<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/14 13:08
 * Description: Home页面的控制器
 */

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('base_model');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('directory');
    }

    public function index(){

        //获取carousel-img下所有文件的文件名,并对其进行预处理
        $list = directory_map('./assets/carousel-img/');
        for($i=0;$i<count($list);$i++){
            $list[$i] = explode('.',$list[$i])[0];
        }



        //填充传输数据
        $data['title'] = 'Home-IO Games Hub';
        $data['base_url'] = base_url();
        $data['canvas_count'] = 160;

        $data['carousel_list'] = $list;
        $data['items_list'] = $this->base_model-> get_data_home();   //获取数据库初始数据


        $this->load->view('basic_module/header',$data);
        $this->load->view('basic_module/canvas_nest',$data);
        $this->load->view('basic_module/navigation_bar');
        $this->load->view('basic_module/flut_button_up_gridding');
        $this->load->view('home',$data);
        $this->load->view('basic_module/footer',$data);


    }

}
?>