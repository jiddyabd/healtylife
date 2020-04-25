<?php

class Dokter extends Core_Controller {
    public function __construct(){
        parent::__construct();

        if(!$this->is_user_can_access(DOKTER)){
            $this->redirect_to_home();
        }

        $this->load->model('Pasien_model');
        $this->load->model('Dokter_model');
        $this->load->model('Appointment_model');
        $this->load->model('Layanan_model');
        $this->load->model('Petugas_model');
        $this->load->model('User_model');
        $this->load->model('Jadwal_model');
    }

    public function index(){
        $this->view_title = 'List Appointment';
        $this->view_page = DIR_DOKTER_PAGES.'/view_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT);
    }

    public function dashboard(){
        $this->index();
    }

    public function view_appointment(){
        $this->view_title = 'List Appointment';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('petugas/view_appointment', $items_per_page, $this->Appointment_model->count_all());
        $data['list_appointment'] = $this->Appointment_model->get_list($items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_DOKTER_PAGES.'/view_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function view_jadwal(){
        $nama_dokter = $this->get_user_name();
        $dokter_id = $this->get_user_id();
        $this->view_title = 'List Jadwal Kerja Dokter '.$nama_dokter;

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('petugas/jadwal_dokter'.$dokter_id, $items_per_page, $this->Jadwal_model->count_all());
        $data['list_jadwal_dokter'] = $this->Jadwal_model->get_list_by_dokter_id($dokter_id, $items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_DOKTER_PAGES.'/view_jadwal';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }
    
    public function logout(){
        $this->session->unset_userdata('user_session');
        $this->session->sess_destroy();
        redirect('/login/sign_in');
    }
}
?>