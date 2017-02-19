<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/14 13:18
 * Description: Home页面的数据库处理
 */
class Base_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //返回home页面所需的数据的基础数据
    public function get_data_home(){
        $sql = "SELECT game_name,game_description,collected_count,liked_count
                FROM games_item
                WHERE game_description IS NOT NULL ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    //放回gridding页面所需的数据
    public function get_data_gridding(){
        $sql = "SELECT game_name,collected_count,liked_count
                FROM games_item";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    //返回 game page 所需的的数据
    public function get_data_gamePage($title){
        $sql = "SELECT game_name,game_link,game_description,collected_count,liked_count
                FROM games_item
                WHERE game_name = '$title'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }

    //返回 user page 所需的数据
    public function get_data_userPage($user_name){
        $sql = "SELECT user_name,user_password,user_icon,create_date
                FROM users
                WHERE user_name = '$user_name'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }

    public function get_data_user_collect($user_name){
        $sql = "SELECT game_name
                FROM games_item
                WHERE game_id IN (SELECT game_id
                                  FROM games_collect
                                  WHERE user_id = (SELECT user_id
                                                    FROM users
                                                    WHERE user_name = '$user_name'))";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    //登录界面验证
    public function validate_log_in($data){
        $username = $data['username'];
        $password = $data['password'];

        $sql = "SELECT user_name
                FROM users
                WHERE user_name = '$username'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        if($result['user_name'] == NULL){
            return 'no name';
        }
        $sql = "SELECT user_name
                FROM users
                WHERE user_name = '$username' AND user_password = PASSWORD('$password')";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        if($result['user_name'] == NULL){
            return 'no password';
        }else{
            return 'pass';
        }
    }


    //用户注册
    public function sign_in($data){
        $username = $data['username'];
        $password = $data['password'];
        $sql = "SELECT user_name
                FROM users
                WHERE user_name = '$username'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        if($result['user_name'] != NULL){
            return FALSE;
        }

        $icon = rand(1,9);

        $sql = "INSERT INTO users (user_name,user_password,create_date,user_icon)
                VALUE('$username',PASSWORD('$password'),CURDATE(),'$icon')";
        $this->db->query($sql);
        $result = $this->db->affected_rows();
        if($result > 0){

            //向新用户随机推荐7个的游戏
            $sql = "SELECT game_id FROM games_item";
            $game_list = $this->db->query($sql)->result_array();
            $random_keys = array_rand($game_list,7);

            $sql = "SELECT user_id from users where user_name = '$username'";
            $user_id = $this->db->query($sql)->row_array()['user_id'];
            $sql = "INSERT INTO games_collect VALUE(?,'$user_id')";
            for($i=0;$i<7;$i++){
                $this->db->query($sql,array($game_list[$random_keys[$i]]['game_id']));
            }
            return TRUE;
        }else{
            return FALSE;
        }

    }

    //获取用户图片
    public function get_user_icon($user_name){
        $sql = "SELECT user_icon
                FROM users
                WHERE user_name = '$user_name'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result['user_icon'];
    }

    //更改密码
    public function set_password($data){
        $username = $data['username'];
        $old_password = $data['old_password'];
        $new_password = $data['new_password'];

        $sql = "UPDATE users
                SET user_password = PASSWORD('$new_password')
                WHERE user_name = '$username'";
        $this->db->query($sql);
        $result = $this->db->affected_rows();
        if($result > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    //提交评论
    public function add_comment($datas){
        $game_name = $datas['game_name'];
        $user_name = $datas['user_name'];
        $content = $datas['content'];
        $sql = "INSERT INTO comment (game_id,user_id,content,create_time)
                VALUE ((SELECT game_id FROM games_item WHERE game_name = '$game_name'),
                (SELECT user_id FROM users WHERE user_name = '$user_name'),
                '$content',
                NOW())";
        $this->db->query($sql);
        $result = $this->db->affected_rows();
        if($result > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    //获取一个game的所有评论
    public function get_comment_game($game_name){
        $sql = "SELECT users.user_name as user_name,users.user_icon as user_icon,comment.content as content ,comment.create_time as create_time
                FROM comment INNER JOIN users ON comment.user_id = users.user_id
                WHERE comment.game_id = (SELECT game_id
                                          FROM games_item
                                          WHERE game_name = '$game_name')
                ORDER BY comment.create_time ASC
                ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    //collected game
    public function add_collected($datas){
        $game_name = $datas['game_name'];
        $user_name = $datas['user_name'];

        $sql = "SELECT game_id
                FROM games_collect
                WHERE game_id = (SELECT game_id FROM games_item WHERE game_name = '$game_name')
                AND  user_id = (SELECT user_id FROM users WHERE user_name = '$user_name')";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if(count($result) >0 ){
            return FALSE;
        }
        $sql = "INSERT INTO games_collect
                VALUE ((SELECT game_id FROM games_item WHERE game_name = '$game_name'),
                (SELECT user_id FROM users WHERE user_name = '$user_name'))";
        $query = $this->db->query($sql);

        $sql = "UPDATE games_item
                SET collected_count = collected_count + 1
                WHERE game_name = '$game_name'";
        $query = $this->db->query($sql);
        return TRUE;


    }
    //like game
    public function add_liked($datas){
        $game_name = $datas['game_name'];
        $user_name = $datas['user_name'];

        $sql = "SELECT game_id
                FROM games_like
                WHERE game_id = (SELECT game_id FROM games_item WHERE game_name = '$game_name')
                AND  user_id = (SELECT user_id FROM users WHERE user_name = '$user_name')";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if(count($result) >0 ){
            return FALSE;
        }
        $sql = "INSERT INTO games_like
                VALUE ((SELECT game_id FROM games_item WHERE game_name = '$game_name'),
                (SELECT user_id FROM users WHERE user_name = '$user_name'))";
        $query = $this->db->query($sql);

        $sql = "UPDATE games_item
                SET liked_count = liked_count + 1
                WHERE game_name = '$game_name'";
        $query = $this->db->query($sql);
        return TRUE;
    }

    //检测 当前页面 collect，like按钮的状态
    public function check_collect($datas){
        $game_name = $datas['gamename'];
        $user_name = $datas['username'];

        $sql = "SELECT game_id
                FROM games_collect
                WHERE game_id = (SELECT game_id FROM games_item WHERE game_name = '$game_name')
                AND  user_id = (SELECT user_id FROM users WHERE user_name = '$user_name')";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if(count($result) >0 ){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function check_like($datas){
        $game_name = $datas['gamename'];
        $user_name = $datas['username'];

        $sql = "SELECT game_id
                FROM games_like
                WHERE game_id = (SELECT game_id FROM games_item WHERE game_name = '$game_name')
                AND  user_id = (SELECT user_id FROM users WHERE user_name = '$user_name')";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if(count($result) >0 ){
            return TRUE;
        }else{
            return FALSE;
        }
    }



    //返回排行版数据
    public function get_top_collected($num){
        $sql = "SELECT  game_name,collected_count
                FROM games_item
                ORDER BY collected_count DESC ,liked_count desc
                LIMIT ".$num;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function get_top_liked($num){
        $sql = "SELECT  game_name,liked_count
                FROM games_item
                ORDER BY liked_count DESC ,collected_count desc
                LIMIT ".$num;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    //取消collected记录
    public function cancel_collected($datas){
        $game_name = $datas['game_name'];
        $user_name = $datas['user_name'];
        $sql = "DELETE FROM games_collect
                WHERE game_id = (SELECT game_id FROM games_item WHERE game_name = '$game_name')
                AND  user_id = (SELECT user_id FROM users WHERE user_name = '$user_name')";
        $query = $this->db->query($sql);
        $result = $this->db->affected_rows();
        if(count($result) >0 ){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    //取消liked记录
    public function cancel_liked($datas){
        $game_name = $datas['game_name'];
        $user_name = $datas['user_name'];
        $sql = "DELETE FROM games_like
                WHERE game_id = (SELECT game_id FROM games_item WHERE game_name = '$game_name')
                AND  user_id = (SELECT user_id FROM users WHERE user_name = '$user_name')";
        $query = $this->db->query($sql);
        $result = $this->db->affected_rows();
        if(count($result) >0 ){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    //查找数据:
    public function search($str){
//TODO：优化查找算法
        $sql = "SELECT game_name,game_description
                FROM games_item
                WHERE game_name LIKE '%$str%'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }


}

?>