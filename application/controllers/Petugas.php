<?php

class Petugas extends Core_Controller {
    public function __construct(){
        parent::__construct();

        if(!$this->is_user_can_access(PETUGAS)){
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
        $this->view_title = 'Dashboard';
        $this->view_page = DIR_PETUGAS_PAGES.'/dashboard';
        $this->show_layout(LOGGEDIN_LAYOUT);
    }

    public function dashboard(){
        $this->index();
    }

    public function view_user(){
        $this->view_title = 'List User Immunihealth';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('petugas/view_user', $items_per_page, $this->User_model->count_all());
        $data['list_user'] = $this->User_model->get_list($items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_PETUGAS_PAGES.'/table_user';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function view_pasien(){
        $this->view_title = 'List Pasien Immunihealth';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('petugas/view_pasien', $items_per_page, $this->Pasien_model->count_all());
        $data['list_pasien'] = $this->Pasien_model->get_list($items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_PETUGAS_PAGES.'/table_pasien';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);

    }

    public function view_dokter(){
        $this->view_title = 'List Dokter Immunihealth';
        $this->view_page = DIR_PETUGAS_PAGES.'/table_dokter';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->paginate('petugas/view_dokter', $items_per_page, $this->Dokter_model->count_all());
        $data['list_dokter'] = $this->Dokter_model->get_list($items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->show_layout(LOGGEDIN_LAYOUT, $data);
        
    }

    public function jadwal_dokter($dokter_id){
        $data['dokter'] = $this->Dokter_model->get_by_dokter_id($dokter_id);

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $this->paginate('petugas/jadwal_dokter/'.$dokter_id, $items_per_page, $this->Jadwal_model->count_all());
        $data['list_jadwal_dokter'] = $this->Jadwal_model->get_list_by_dokter_id($dokter_id, $items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_title = 'Jadwal Dokter '.$data['dokter']->nama_dokter;  
        $this->view_page = DIR_PETUGAS_PAGES.'/table_jadwal_dokter';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function view_layanan(){
        $this->view_title = 'List Layanan Immunihealth';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $this->paginate('petugas/view_layanan', $items_per_page, $this->Layanan_model->count_all());
        $data['list_layanan'] = $this->Layanan_model->get_list($items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_PETUGAS_PAGES.'/table_layanan';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);

    }

    //Appointment
    public function view_appointment(){
        $this->view_title = 'List Permintaan Appointment';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->paginate('petugas/view_appointment', $items_per_page, $this->Appointment_model->count_all());
        $data['list_appointment'] = $this->Appointment_model->get_list($items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_PETUGAS_PAGES.'/table_jadwal_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function delete_appointment($appointment_id){

    }

    public function accept_appointment($appointment_id){
        $this->view_title = 'Accept Appointment';

        $data['appointment'] = $this->Appointment_model->get_by_id($appointment_id);
        $data['list_layanan'] = $this->Layanan_model->get_all();
        $data['list_available_dokter'] = $this->Dokter_model->get_available_dokter_by_date($data['appointment']->tgl_waktu_permintaan);

        foreach($data['list_available_dokter'] as $dokter){
            $dokter->hari_on_id = $this->get_day_on_indonesia($dokter->hari);
        }

        $this->view_page = DIR_PETUGAS_PAGES.'/accept_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function submit_accept_appointment($appointment_id){
        $jadwal_id = explode(" | ",$this->input->post('jadwal_dokter'))[0];
        $dokter_id = explode(" | ",$this->input->post('jadwal_dokter'))[1];
        $data = array(
            "jadwal_id" => $jadwal_id,
            "dokter_id" => $dokter_id,
            "is_acc" => true
        );

        $this->Appointment_model->update($appointment_id, $data);
        redirect('petugas/view_appointment');
    }

    public function view_petugas(){
        $this->view_title = 'List Petugas Immunihealth';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->paginate('petugas/view_petugas', $items_per_page, $this->Layanan_model->count_all());
        $data['list_petugas'] = $this->Petugas_model->get_list($items_per_page, $data['curr_page']);


        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_PETUGAS_PAGES.'/table_petugas';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }


    public function logout(){
        $this->session->unset_userdata('user_session');
        $this->session->sess_destroy();
        redirect('/login/sign_in');
    }
}
?>