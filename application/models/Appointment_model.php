<?php
class Appointment_model extends Core_Model{

  public function __construct(){
    parent::__construct();
    $table_naem = 'appointment';
    $table_id = 'appointmnent_id';
  }

  public function get_list($limit, $start){
      $this->db->from('appointment', $limit, $start);
      $this->db->order_by("appointment_id", "asc");
      $this->db->limit($limit, $start);
      $query = $this->db->get();
      return $query->result();
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
      $this->db->where('is_done IS NULL');
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
      $this->db->where('is_done IS NULL');
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

  public function get_list_pasien_riwayat_appointment($pasien_id, $limit, $start){
    $this->db->from('appointment', $limit, $start);
    $this->db->join('dokter', 'appointment.dokter_id = dokter.dokter_id');
    $this->db->join('jadwal', 'appointment.jadwal_id = jadwal.jadwal_id');
    $this->db->join('layanan', 'appointment.layanan_id = layanan.layanan_id');
    $this->db->where('appointment.user_id', $pasien_id);
    $this->db->where('is_done', true);
    $this->db->order_by("appointment_id", "asc");
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_list_pasien_appointment_mendatang($user_id, $limit, $start){
    $this->db->from('appointment', $limit, $start);
    $this->db->join('dokter', 'appointment.dokter_id = dokter.dokter_id', 'left');
    $this->db->join('jadwal', 'appointment.jadwal_id = jadwal.jadwal_id', 'left');
    $this->db->join('layanan', 'appointment.layanan_id = layanan.layanan_id');
    $this->db->where('appointment.user_id', $user_id);
    $this->db->where('is_acc IS NULL');
    $this->db->or_where('(is_acc = TRUE and is_done = FALSE)');
    $this->db->order_by("appointment_id", "asc");
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
}
?>