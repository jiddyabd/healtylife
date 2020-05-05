<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_Model extends CI_Model {
    //Attirbutes
    protected $table_name;
    protected $table_id;
    

    public function get_all(){
        $query = $this->db->get($table_name);
        return $query->result();
    }

    public function count_all(){
        return $this->db->count_all($table_name);
    }

    public function get_by_id($id){
        $this->db->where($table_id, $id);
        return $this->db->get($table_name)->row();
    }

    public function delete($id){
        $this->db->where($table_id, $id);
        $this->db->delete($table_name);
    }

    public function update($id, $data){
        $this->db->where($table_id, $id);
        $this->db->update($table_name, $data);
    }

    public function insert($data){
        $this->db->insert($table_name, $data);
    }
}