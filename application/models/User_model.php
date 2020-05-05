<?php
class User_model extends Core_Model{
    public function __construct(){
        parent::__construct();
        $this->table_name =  'user';
        $this->table_id = 'user_id';
    }

    public function get_list($limit, $start){
        $this->db->from('user', $limit, $start);
        $this->db->where('is_delete', false);
        $this->db->order_by("user_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_not_deleted(){
        $this->db->where('is_delete', false);
        $this->db->from("user");
        return $this->db->count_all_results();
    }
    
    public function is_password_and_username_valid($username, $password){
        $this->db->where('user_id', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query->row();
    }
}
?>