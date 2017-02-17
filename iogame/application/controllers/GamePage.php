<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/16 15:21
 * Description: 游戏主页控制器
 */

class GamePage extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('base_model');
        $this->load->helper('url');
    }

    public function index($title){
        $data['title'] = ucfirst($title.'- Game Page');
        $data['base_url'] = base_url();
        $data['canvas_count'] = 210;
        $data['game_item'] = $this->base_model->get_data_gamePage($title);
        if($data['game_item']['game_description'] == null){
            $data['game_item']['game_description'] = 'No description temporarily,
            if you hava some idea, you can share it with me according email.';
        }

        $this->load->view('basic_module/header',$data);
        $this->load->view('basic_module/canvas_nest',$data);
        $this->load->view('basic_module/navigation_bar');
        $this->load->view('basic_module/flut_button_up_gridding');

        if(count( $data['game_item'])>0){
            $this->load->view('game_page',$data);
        }else{
            $this->load->view('no_game',$data);
        }
        $this->load->view('basic_module/footer',$data);

    }



}
?>

