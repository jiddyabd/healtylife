<?php

class Petugas extends Core_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Pasien_model');
        // $this->load->model('Dokter_model');
        // $this->load->model('Obat_model');
        // $this->load->model('Appointment_model');
        // $this->load->model('Layanan_model');
        // $this->load->model('Petugas_model');
    }

    public function index(){
        //TODO Just load the dashboard
    }

    public function dashboard(){

    }

    public function view_pasien(){

    }

    public function view_dokter(){
        
    }

    public function view_obat(){

    }

    public function view_appointment(){

    }

    public function view_layanan(){

    }

    public function edit_jadwal_dokter(){

    }
    
}
?>