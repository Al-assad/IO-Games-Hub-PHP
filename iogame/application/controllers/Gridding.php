<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/16 13:12
 * Description: Gridding页面控制器
 */

class Gridding extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->model('base_model');
        $this->load->helper('url');
    }

    public function index(){
        $data['items_list'] = $this->base_model->get_data_gridding();
        $data['title'] = 'Gridding-IO Games Hub';
        $data['base_url'] = base_url();
        $data['canvas_count'] = 160;

        $this->load->view('basic_module/header',$data);
        $this->load->view('basic_module/canvas_nest',$data);
        $this->load->view('basic_module/navigation_bar');
        $this->load->view('basic_module/flut_button_up_home');
        $this->load->view('gridding',$data);
        $this->load->view('basic_module/footer',$data);



    }

}

?>