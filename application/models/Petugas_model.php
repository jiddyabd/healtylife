<?php
class Petugas_model extends CI_Model{
    public function get_all()
        {$query = $this->db->get('petugas');
        return $query->result();
    }

    public function get_list($limit, $start){
        $this->db->from('petugas', $limit, $start);
        $this->db->order_by("petugas_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function count_all(){
        return $this->db->count_all('petugas');
    }

    public function is_password_and_username_valid($username, $password){
        $this->db->where('petugas_id', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('petugas');
        return $query->row();
    }
}
?>