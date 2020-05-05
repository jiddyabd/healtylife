<?php
class Jadwal_model extends Core_Model{
    public function __construct(){
        parent::__construct();
        $this->table_name =  'jadwal';
        $this->table_id = 'jadwal_id';
    }

    public function get_list($limit, $start){
        $this->db->from('jadwal', $limit, $start);
        $this->db->where('is_delete', false);
        $this->db->order_by("jadwal_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    
    public function count_list_by_dokter_id($dokter_id){
        $this->db->where('dokter_id', $dokter_id);
        $this->db->where('is_delete', false);
        $this->db->from("jadwal");
        return $this->db->count_all_results();
    }

    public function get_list_by_dokter_id($dokter_id, $limit, $start){
        $this->db->from('jadwal', $limit, $start);
        $this->db->where('is_delete', false);
        $this->db->where('dokter_id', $dokter_id);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>