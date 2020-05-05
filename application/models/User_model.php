<?php
class User_model extends Core_Model{
    public function __construct(){
        parent::__construct();
        $table_name = 'user';
        $table_id = 'user_id';
    }

    public function get_list($limit, $start){
        $this->db->from('user', $limit, $start);
        $this->db->order_by("user_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function is_password_and_username_valid($username, $password){
        $this->db->where('user_id', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query->row();
    }
}
?>