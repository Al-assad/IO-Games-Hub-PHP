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
        $sql = "SELECT game_name,game_link,collected_count,liked_count
                FROM games_item";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }


}

?>