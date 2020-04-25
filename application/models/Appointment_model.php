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

    public function get_by_id($id){
		$this->db->where('appointment_id', $id);
		return $this->db->get('appointment')->row();
    }

    public function get_list_by_dokter_id($dokter_id, $limit, $start){
        $this->db->from('appointment', $limit, $start);
        $this->db->where('dokter_id', $dokter_id);
        $this->db->order_by("appointment_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_not_acc_by_dokter_id($dokter_id, $limit, $start){
        $this->db->from('appointment', $limit, $start);
        $this->db->where('dokter_id', $dokter_id);
        $this->db->where('is_acc', false);
        $this->db->where('is_done', null);
        $this->db->order_by("appointment_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_acc_by_dokter_id($dokter_id, $limit, $start){
        $this->db->from('appointment', $limit, $start);
        $this->db->join('jadwal', 'appointment.jadwal_id = jadwal.jadwal_id');
        $this->db->where('appointment.dokter_id', $dokter_id);
        $this->db->where('is_acc', true);
        $this->db->where('is_done', null);
        $this->db->order_by("appointment_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_done_by_dokter_id($dokter_id, $limit, $start){
        $this->db->from('appointment', $limit, $start);
        $this->db->join('jadwal', 'appointment.jadwal_id = jadwal.jadwal_id');
        $this->db->join('layanan', 'appointment.layanan_id = layanan.layanan_id');
        $this->db->where('appointment.dokter_id', $dokter_id);
        $this->db->where('is_done', true);
        $this->db->order_by("appointment_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    //CUD
    public function delete($appointment_id){
		$this->db->where('appointment_id', $appointment_id);
		$this->db->delete('appointment');
    }

    public function update($appointment_id, $data){
		$this->db->where('appointment_id', $appointment_id);
		$this->db->update('appointment', $data);

    }

    public function insert($data){
		$this->db->insert('appointment', $data);
    }
}
?>