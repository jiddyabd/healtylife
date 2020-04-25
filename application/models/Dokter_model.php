<?php
class Dokter_model extends CI_Model{
    public function get_all()
        {$query = $this->db->get('dokter');
        return $query->result();
    }

    public function get_list($limit, $start){
        $this->db->from('dokter', $limit, $start);
        $this->db->order_by("dokter_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function count_all(){
        return $this->db->count_all('dokter');
    }

    
    public function get_by_dokter_id($dokter_id){
        $this->db->where('dokter_id', $dokter_id);
        $query = $this->db->get('dokter');
        return $query->row();
    }

    public function is_password_and_username_valid($username, $password){
        $this->db->where('dokter_id', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('dokter');
        return $query->row();
    }

    public function get_available_dokter_by_date($date){
        $this->db->join('jadwal', 'dokter.dokter_id = jadwal.dokter_id');
        $this->db->where("jadwal.hari = DAYNAME('".$date."')");
        $this->db->where("TIME('".$date."') BETWEEN `jadwal`.`waktu_mulai` AND `jadwal`.`waktu_selesai`");
        $query = $this->db->get('dokter');
        return $query->result();
    }
}
?>