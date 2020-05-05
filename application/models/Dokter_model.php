<?php
class Dokter_model extends Core_Model{
    public function __construct(){
        parent::__construct();
        $this->table_name =  'dokter';
        $this->table_id = 'dokter_id';
    }

    public function get_list($limit, $start){
        $this->db->from('dokter', $limit, $start);
        $this->db->order_by("dokter_id", "asc");
        $this->db->where('is_delete', false);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
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