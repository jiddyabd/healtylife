<?php
class Petugas_model extends Core_Model{
    public function __construct(){
        parent::__construct();
        $table_naem = 'petugas';
        $table_id = 'petugas_id';
    }

    public function get_list($limit, $start){
        $this->db->from('petugas', $limit, $start);
        $this->db->order_by("petugas_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function is_password_and_username_valid($username, $password){
        $this->db->where('petugas_id', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('petugas');
        return $query->row();
    }
}
?>