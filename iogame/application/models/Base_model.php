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






}

?>