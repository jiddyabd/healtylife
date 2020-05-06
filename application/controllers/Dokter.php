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
        $this->view_appointment();
    }

    public function dashboard(){
        $this->index();
    }

    public function view_appointment(){
        $this->view_title = 'List Appointment';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('dokter/view_appointment', $items_per_page, $this->Appointment_model->count_all());
        $data['list_appointment'] = $this->Appointment_model->get_all_acc_by_dokter_id($this->get_user_id(), $items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $data['list_layanan'] = $this->Layanan_model->get_all();

        $this->view_page = DIR_DOKTER_PAGES.'/view_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function submit_finish_appointment($appointment_id){
        $data = array(
            "is_done" => true,
            "notes" => $this->input->post('resume')
        );

        $is_success = $this->Appointment_model->update($data,$appointment_id);
        if($is_success){
            $this->show_success_toast('Berhasil mengupdatew "finish" appointment.');
        }else{
            $this->show_error_toast('Gagal mengupdate appointment');
        }
        redirect('dokter');
    }

    public function view_jadwal(){
        $nama_dokter = $this->get_user_name();
        $dokter_id = $this->get_user_id();
        $this->view_title = 'List Jadwal Kerja Dokter '.$nama_dokter;

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('dokter/jadwal_dokter'.$dokter_id, $items_per_page, $this->Jadwal_model->count_list_by_dokter_id($this->get_user_id()));
        $data['list_jadwal_dokter'] = $this->Jadwal_model->get_list_by_dokter_id($dokter_id, $items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $this->view_page = DIR_DOKTER_PAGES.'/view_jadwal';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function riwayat_kerja(){
        $this->view_title = 'Riwayat Kerja';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('dokter/view_appointment', $items_per_page, $this->Appointment_model->count_all());
        $data['list_appointment'] = $this->Appointment_model->get_all_done_by_dokter_id($this->get_user_id(), $items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $data['list_layanan'] = $this->Layanan_model->get_all();

        $this->view_page = DIR_DOKTER_PAGES.'/riwayat_kerja';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);

    }

    
    public function edit_profile(){
        $this->view_title = 'My Profile';
        $this->view_page = DIR_DOKTER_PAGES.'/edit_profile';
        $this->show_layout(LOGGEDIN_LAYOUT);
    }

    public function submit_edit_profile(){
        if(($this->input->post('password') != null || $this->input->post('password') != '') || $this->input->post('cpassword') != null || $this->input->post('cpassword') != ''){
            if(strlen($this->input->post('password')) < 8){
                $this->show_error_toast('Password anda harus lebih dari 8 karakter');
                redirect('user/edit_profile');
            }
            if($this->input->post('password') != $this->input->post('cpassword')){
                $this->show_error_toast('Kolom password dan konfirmasi harus sama');
                redirect('user/edit_profile');
            }
            $data_profile = array(
                "nama_dokter" => $this->input->post('user_name'),
                "password" => $this->input->post('password')
            );
        }else{
            $data_profile = array(
                "nama_dokter" => $this->input->post('user_name')
            );
        }

        $is_success = $this->Dokter_model->update($data_profile, $this->get_user_id());
        if($is_success){
            //Update session
            $user_session_data = array(
                "id" => $this->get_user_id(),
                "nama" => $this->input->post('user_name'),
                "role" => DOKTER,
            );
            $this->session->set_userdata("user_session", $user_session_data);

            $this->show_success_toast('Berhasil mengupdate data profile anda.');
        }else{
            $this->show_error_toast('Gagal mengupdate data profile anda');
        }
        
        redirect('dokter/edit_profile');
    }
    
    public function logout(){
        $this->session->unset_userdata('user_session');
        $this->session->sess_destroy();
        redirect('/login/sign_in');
    }
}
?>