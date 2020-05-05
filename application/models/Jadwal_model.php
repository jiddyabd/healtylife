<?php
class Jadwal_model extends Core_Model{
    public function __construct(){
        parent::__construct();
        $table_naem = 'jadwal';
        $table_id = 'jadwal_id';
    }

    public function get_list($limit, $start){
        $this->db->from('jadwal', $limit, $start);
        $this->db->order_by("jadwal_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_list_by_dokter_id($dokter_id, $limit, $start){
        $this->db->from('jadwal', $limit, $start);
        $this->db->where('dokter_id', $dokter_id);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>