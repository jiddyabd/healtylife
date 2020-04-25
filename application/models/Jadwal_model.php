<?php
class Jadwal_model extends CI_Model{
    public function get_all()
        {$query = $this->db->get('jadwal');
        return $query->result();
    }

    public function get_list($limit, $start){
        $this->db->from('jadwal', $limit, $start);
        $this->db->order_by("jadwal_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function count_all(){
        return $this->db->count_all('jadwal');
    }

    public function get_list_by_dokter_id($dokter_id, $limit, $start){
        $this->db->from('jadwal', $limit, $start);
        $this->db->where('dokter_id', $dokter_id);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_by_jadwal_id($jadwal_id){
        $this->db->where('jadwal_id', $jadwal_id);
        $query = $this->db->get('jadwal');
        return $query->row();
    }
}
?>