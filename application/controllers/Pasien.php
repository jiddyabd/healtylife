<?php

class Pasien extends Core_Controller {
    public function __construct()
    {
		parent::__construct();
        if(!$this->is_user_can_access(PASIEN)){
            $this->redirect_to_home();
        }
        $this->load->model('Pasien_model');
        $this->load->model('Appointment_model');
        $this->load->model('Dokter_model');
        $this->load->model('Jadwal_model');
        $this->load->model('User_model');
        $this->load->model('Layanan_model');
    }
    
    public function index(){
        $this->daftar_appointment();
    }
    
    public function appointment(){
        $this->view_title = 'List Appointment';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('pasien/appointment', $items_per_page, $this->Appointment_model->count_all());
        $data['list_appointment'] = $this->Appointment_model->get_list($items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_PASIEN_PAGES.'/view_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function daftar_appointment(){
        $this->view_title = "Daftar Appointment";
        $data['list_layanan'] = $this->Layanan_model->get_all();

        $this->view_page = DIR_PASIEN_PAGES.'/daftar_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function submit_appointment(){
        $data_pasien = array(
            "nama_pasien" => $this->input->post('nama_pasien'),
            "tanggal_lahir" => $this->input->post('tgl_lahir_pasien'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin_pasien')
        );
        $data_appointment = array(
            "tgl_waktu_permintaan" => $this->input->post('tgl_waktu_permintaan'),
            "nama_wali" => $this->input->post('nama_wali'),
            "nama_pasien" => $this->input->post('nama_pasien'),
            "tanggal_lahir" => $this->input->post('tgl_lahir_pasien'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin_pasien'),
            "user_id" => $this->get_user_id(),
            "layanan_id" => $this->input->post('jenis_layanan'),
            "jadwal_id" => null,
            "is_acc" => null,
            "is_done" => null,
            "is_denied" => null,
        );

        $is_success_data_pasien = $this->Pasien_model->insert($data_pasien);
        $is_success_data_appointment = $this->Appointment_model->insert($data_appointment);
        if($is_success_data_pasien && $is_success_data_appointment){
            $this->show_success_toast('Berhasil menambahkan appointment.');
        }else{
            $this->show_error_toast('Gagal menambahkan appointment');
        }
        redirect('pasien/appointment_mendatang');
    }

    public function appointment_mendatang(){
        $this->view_title = 'Appointment Mendatang';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('pasien/appointment_mendatang', $items_per_page, $this->Appointment_model->count_all());
        $data['list_appointment'] = $this->Appointment_model->get_list_pasien_appointment_mendatang($this->get_user_id(), $items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_PASIEN_PAGES.'/pasien_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);

    }

    public function riwayat_appointment(){
        $this->view_title = 'Riwayat Appointment';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('pasien/riwayat_appointment', $items_per_page, $this->Appointment_model->count_all());
        $data['list_appointment'] = $this->Appointment_model->get_list_pasien_riwayat_appointment($this->get_user_id(), $items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_PASIEN_PAGES.'/history_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);


    }

    public function logout(){
        $this->session->unset_userdata('user_session');
        $this->session->sess_destroy();
        redirect('/login/sign_in');
    }
    
}
?>