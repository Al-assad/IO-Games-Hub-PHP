<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/17 15:40
 * Description: 评论控制器
 */

class Comment extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('base_model');
        $this->load->helper('url');
    }
    public function index(){

        $comment = htmlspecialchars(trim($_POST['comment']));
        //TODO：增加评论过滤；

        if($comment == NULL || $comment == ""){
            $data['message'] = 'The comment is empty.';

        }else{
            $datas['game_name'] = $_POST['game_name'];
            $datas['user_name'] = $_POST['user_name'];
            $datas['content'] = $comment;
            $result = $this->base_model->add_comment($datas);
            if(!$result){
                $data['message'] = 'Fail to comment';
            }else{
                $data['message'] = 'comment successfully.';
            }
        }


            $_SESSION['username'] =  $datas['user_name'];

            $_SESSION['user-icon'] = $_POST['user-icon'];

        $data['title'] = ucfirst($datas['game_name'].'- Game Page');
        $data['base_url'] = base_url();
        $data['canvas_count'] = 210;
        $data['game_item'] = $this->base_model->get_data_gamePage($datas['game_name']);
        $data['comment_list'] = $this->base_model->get_comment_game($datas['game_name']);

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
        $this->load->view('basic_module/popup',$data);

    }

    public function fail(){

            $data['message'] = 'Please Sign in .';
            $data['title'] = 'comment.';
            $data['base_url'] = base_url();
            $this->load->view('basic_module/header',$data);
            $this->load->view('basic_module/popup-back',$data);

    }
}
?>