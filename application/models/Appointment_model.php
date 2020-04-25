<?php
class Appointment_model extends CI_Model{
    public function get_all()
        {$query = $this->db->get('appointment');
        return $query->result();
    }

    public function get_list($limit, $start){
        $this->db->from('appointment', $limit, $start);
        $this->db->order_by("appointment_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function count_all(){
        return $this->db->count_all('appointment');
    }
}
?>