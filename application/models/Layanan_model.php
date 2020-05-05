<?php
class Layanan_model extends Core_Model{
    public function __construct(){
        parent::__construct();
        $this->table_name =  'layanan';
        $this->table_id = 'layanan_id';
    }

    public function get_list($limit, $start){
        $this->db->from('layanan', $limit, $start);
        $this->db->order_by("layanan_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>