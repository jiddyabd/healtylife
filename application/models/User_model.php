<?php
class User_model extends CI_Model{
    public function get_all()
        {$query = $this->db->get('user');
        return $query->result();
    }

    public function get_list($limit, $start){
        $this->db->from('user', $limit, $start);
        $this->db->order_by("user_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function count_all(){
        return $this->db->count_all('user');
    }

    
    public function get_by_user_id($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');
        return $query->row();
    }
    
    public function is_password_and_username_valid($username, $password){
        $this->db->where('user_id', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query->row();
    }
}
?>