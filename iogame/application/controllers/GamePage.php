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

        if(isset($_GET['username'])){
            $_SESSION['username'] = $_GET['username'];
        }
        if(isset($_GET['usericon'])){
            $_SESSION['user-icon'] = $_GET['usericon'];
        }

        //检验是collect，like按钮状态
        $datas['gamename'] = $title;
        $datas['username'] = isset($_GET['username'])?$_GET['username']:'';

        $data['collect'] = $this->base_model->check_collect($datas);
        $data['like']  = $this->base_model->check_like($datas);


        $data['title'] = ucfirst($title.'- Game Page');
        $data['base_url'] = base_url();
        $data['canvas_count'] = 210;
        $data['game_item'] = $this->base_model->get_data_gamePage($title);
        $data['comment_list'] = $this->base_model->get_comment_game($title);

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

    public function collect(){
        $datas['game_name'] = $_GET['gamename'];
        $datas['user_name'] = $_GET['username'];
        $collect = $_GET['collect'];

        if($collect == FALSE) {
            $result = $this->base_model->add_collected($datas);
            if($result == FALSE){
                $data['title'] = 'collect.';
                $data['base_url'] = base_url();
                $data['message'] = 'You have already colllected this game, you can check it in the user page.</p>
                               <p>If the collected count is not operating properly, you can refresh the page</p>';
                $this->load->view('basic_module/header',$data);
                $this->load->view('basic_module/popup-back',$data);
            }else{
                $this->index( $datas['game_name']);
            }
        }else{
            $result = $this->base_model->cancel_collected($datas);

            if($result == FALSE){
                $data['title'] = 'cancel_collect.';
                $data['base_url'] = base_url();
                $data['message'] = 'Fail to cancel the collection,please try again.';
                $this->load->view('basic_module/header',$data);
                $this->load->view('basic_module/popup-back',$data);
            }else{
                $this->index( $datas['game_name']);
            }
        }




    }

    public function like(){
        $datas['game_name'] = $_GET['gamename'];
        $datas['user_name'] = $_GET['username'];

        $like = $_GET['like'];

        if($like == FALSE){
            $result = $this->base_model->add_liked($datas);

            if($result == FALSE){
                $data['title'] = 'like.';
                $data['base_url'] = base_url();
                $data['message'] = 'You have already give a like to this game, you can check it in the user page.</p>
                               <p>If the collected count is not operating properly, you can refresh the page</p>';
                $this->load->view('basic_module/header',$data);
                $this->load->view('basic_module/popup-back',$data);
            }else{
                $this->index( $datas['game_name']);
            }
        }else{
            $result = $this->base_model->cancel_liked($datas);

            if($result == FALSE){
                $data['title'] = 'like.';
                $data['base_url'] = base_url();
                $data['message'] = 'Fail to cancel the collection,please try again.';
                $this->load->view('basic_module/header',$data);
                $this->load->view('basic_module/popup-back',$data);
            }else{
                $this->index( $datas['game_name']);
            }
        }



    }






}
?>

