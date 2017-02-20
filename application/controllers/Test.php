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
        $this->load->helper('url');
        $data['base_url'] = base_url();
        $data['title'] = 'test';
        $data['message'] = 'test';

        $this->load->view('basic_module/header',$data);
        $this->load->view('popup',$data);
        $this->load->view('basic_module/footer',$data);
    }
}
?>