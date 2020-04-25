<?php

class Petugas extends Core_Controller {
    public function __construct(){
        parent::__construct();

        $this->session->set_userdata("role", PETUGAS); // For development
        //Uncomment for role checking
        if(!$this->is_user_can_access(PETUGAS)){
            $this->redirect_to_home();
        }

        $this->load->model('Pasien_model');
        // $this->load->model('Dokter_model');
        // $this->load->model('Obat_model');
        // $this->load->model('Appointment_model');
        // $this->load->model('Layanan_model');
        // $this->load->model('Petugas_model');
    }

    public function index(){
        //TODO Just load the dashboard
        $this->view_title = 'Imunihealth - Dashboard Petugas';
        $this->view_page = DIR_PETUGAS_PAGES.'/dashboard';
        $this->show_layout(LOGGEDIN_LAYOUT);
    }

    public function dashboard(){
        $this->index();
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