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

        $data['total_pasien'] = $this->Pasien_model->count_all();
        $data['total_dokter'] = $this->Dokter_model->count_all();
        $data['total_layanan'] = $this->Layanan_model->count_all();
        $data['total_appointment'] = $this->Appointment_model->count_all();
        // $data['total_appointment'] = 


        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function dashboard(){
        $this->index();
    }

    public function view_user(){
        $this->view_title = 'List User Immunihealth';

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->paginate('petugas/view_user', $items_per_page, $this->User_model->count_all_not_deleted());
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

    //Dokter
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

    public function tambah_dokter(){
        $data_dokter = array(
            "dokter_id" => $this->input->post('dokter_id'),
            "nama_dokter" => $this->input->post('nama_dokter'),
            "password" => $this->input->post('password'),
            "is_delete" => false
        );

        if(strlen($this->input->post('dokter_id')) < 6){
            $this->show_error_toast('Karakter Id harus lebih dari 6');
            redirect('petugas/view_dokter');
        }

        if(strlen($this->input->post('password')) < 8){
            $this->show_error_toast('Karakter Password harus lebih dari 6');
            redirect('petugas/view_dokter');
        }

        if($this->input->post('password') == $this->input->post('cpassword')){
            $is_success = $this->Dokter_model->insert($data_dokter);
            if($is_success){
                $this->show_success_toast('Berhasil menambahkan data dokter.');
            }else{
                $this->show_error_toast('Gagal menambahkan data dokter');
            }
        }else{
            $this->show_error_toast('Kolom password dan konfirmasi harus sama');
        }
        redirect('petugas/view_dokter');
        
    }

    public function update_dokter($dokter_id){
        $data_dokter = array(
            "nama_dokter" => $this->input->post('nama_dokter')
        );
        
        $is_success = $this->Dokter_model->update($data_dokter, $dokter_id);
        if($is_success){
            $this->show_success_toast('Berhasil mengupdate nama dokter.');
        }else{
            $this->show_error_toast('Gagal mengupdate nama dokter');
        }
        redirect('petugas/view_dokter');

    }

    public function hapus_dokter($dokter_id){
        $data_dokter = array(
            "is_delete" => true
        );
        $is_success = $this->Dokter_model->update($data_dokter, $dokter_id);

        if($is_success){
            $this->show_success_toast('Berhasil menghapus data dokter.');
        }else{
            $this->show_error_toast('Gagal menghapus data dokter');
        }
        redirect('petugas/view_dokter');
    }
    //End dokter

    //Jadwal dokter
    public function jadwal_dokter($dokter_id){
        $data['dokter'] = $this->Dokter_model->get_by_id($dokter_id);

        //Paginate
        $items_per_page = 10;
        $data['curr_page'] = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $this->paginate('petugas/jadwal_dokter/'.$dokter_id, $items_per_page, $this->Jadwal_model->count_list_by_dokter_id($dokter_id));
        $data['list_jadwal_dokter'] = $this->Jadwal_model->get_list_by_dokter_id($dokter_id, $items_per_page, $data['curr_page']);
        $data['pagination'] = $this->pagination->create_links();
        //End Paginate

        $data['dokter_id'] = $dokter_id;
        $this->view_title = 'Jadwal Dokter '.$data['dokter']->nama_dokter;  
        $this->view_page = DIR_PETUGAS_PAGES.'/table_jadwal_dokter';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);
    }

    public function tambah_jadwal(){
        $data_jadwal = array(
            "hari" => $this->input->post('hari'),
            "waktu_mulai" => $this->input->post('waktu_mulai'),
            "waktu_selesai" => $this->input->post('waktu_selesai'),
            "dokter_id" => $this->input->post('dokter_id'),
            "is_delete" => false
        );

        $is_success = $this->Jadwal_model->insert($data_jadwal);
        if($is_success){
            $this->show_success_toast('Berhasil menambah jadwal dokter.');
        }else{
            $this->show_error_toast('Gagal menambah jadwal dokter');
        }

        redirect('petugas/jadwal_dokter/'.$this->input->post('dokter_id'));
    }

    public function update_jadwal($jadwal_id, $dokter_id){
        $data_jadwal = array(
            "hari" => $this->input->post('hari'),
            "waktu_mulai" => $this->input->post('waktu_mulai'),
            "waktu_selesai" => $this->input->post('waktu_selesai')
        );

        $is_success = $this->Jadwal_model->update($data_jadwal, $jadwal_id);
        if($is_success){
            $this->show_success_toast('Berhasil menambah jadwal dokter.');
        }else{
            $this->show_error_toast('Gagal menambah jadwal dokter');
        }

        redirect('petugas/jadwal_dokter/'.$dokter_id);
    }

    public function hapus_jadwal($jadwal_id, $dokter_id){
        $data_jadwal = array(
            "is_delete" => true
        );

        $is_success = $this->Jadwal_model->update($data_jadwal, $jadwal_id);
        if($is_success){
            $this->show_success_toast('Berhasil menghapus jadwal dokter.');
        }else{
            $this->show_error_toast('Gagal menghapus jadwal dokter');
        }

        redirect('petugas/jadwal_dokter/'.$dokter_id);
    }
    //End Jadwal dokter

    //Daftar layanan
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

    public function tambah_layanan(){
        $data_layanan = array(
            "jenis_layanan" => $this->input->post('jenis_layanan'),
            "grup" => $this->input->post('grup')
        );

        $is_success = $this->Layanan_model->insert($data_layanan);
        if($is_success){
            $this->show_success_toast('Berhasil menambahkan data layanan.');
        }else{
            $this->show_error_toast('Gagal menambahkan data layanan');
        }
        redirect('petugas/view_layanan');
    }

    public function edit_layanan($layanan_id){
        $data_layanan = array(
            "jenis_layanan" => $this->input->post('jenis_layanan'),
            "grup" => $this->input->post('grup')
        );

        $is_success = $this->Layanan_model->update($data_layanan, $layanan_id);
        if($is_success){
            $this->show_success_toast('Berhasil mengupdate data layanan.');
        }else{
            $this->show_error_toast('Gagal mengupdate data layanan');
        }
        redirect('petugas/view_layanan');

    }

    public function hapus_layanan($layanan_id){
        $is_success = $this->Layanan_model->delete($layanan_id);
        if($is_success){
            $this->show_success_toast('Berhasil menghapus data layanan.');
        }else{
            $this->show_error_toast('Gagal menghapus data layanan');
        }
        redirect('petugas/view_layanan');
    }

    //End daftar layanan

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

    public function view_detail_appointment($appointment_id){
        $this->view_title = 'Detail Appointment';

        $data['appointment'] = $this->Appointment_model->get_by_id($appointment_id);
        $data['list_layanan'] = $this->Layanan_model->get_all();
        $data['list_available_dokter'] = $this->Dokter_model->get_available_dokter_by_date($data['appointment']->tgl_waktu_permintaan);

        foreach($data['list_available_dokter'] as $dokter){
            $dokter->hari_on_id = $this->get_day_on_indonesia($dokter->hari);
        }

        $this->view_page = DIR_PETUGAS_PAGES.'/detail_appointment';
        $this->show_layout(LOGGEDIN_LAYOUT, $data);

    }


    public function hapus_appointment($appointment_id){
        $is_success = $this->Appointment_model->delete($appointment_id);
        if($is_success){
            $this->show_success_toast('Berhasil menghapus data appointment.');
        }else{
            $this->show_error_toast('Gagal menghapus data appointment');
        }

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

        $is_success = $this->Appointment_model->update($data, $appointment_id);
        if($is_success){
            $this->show_success_toast('Berhasil meng-accept data appointment.');
        }else{
            $this->show_error_toast('Gagal meng-accept data appointment');
        }
        redirect('petugas/view_appointment');
    }

    public function deny_appointment(){
        $data = array(
            "is_acc" => false
        );

        $is_success = $this->Appointment_model->update($data, $appointment_id);
        if($is_success){
            $this->show_success_toast('Berhasil menolak jadwal appointment ini.');
        }else{
            $this->show_error_toast('Gagal menolak jadwal appointment ini');
        }
        redirect('petugas/view_appointment');

    }
    //End appointment


    // Daftar petugas
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
    
    public function tambah_petugas(){
        $data_petugas = array(
            "petugas_id" => $this->input->post('petugas_id'),
            "nama_petugas" => $this->input->post('nama_petugas'),
            "password" => $this->input->post('password')
        );

        //Validation
        if(strlen($this->input->post('password')) < 8){
            $this->show_error_toast('Password petugas harus lebih dari 7 karakter');
            redirect('petugas/view_petugas');
        }

        if(strlen($this->input->post('petugas_id')) < 6){
            $this->show_error_toast('Id petugas harus lebih dari 6 karakter');
            redirect('petugas/view_petugas');
        }

        if($this->input->post('password') != $this->input->post('cpassword')){
            $this->show_error_toast('Kolom password dan konfirmasi harus sama');
            redirect('petugas/view_petugas');
        }

        $is_success = $this->Petugas_model->insert($data_petugas);
        if($is_success){
            $this->show_success_toast('Berhasil menambah data petugas.');
        }else{
            $this->show_error_toast('Gagal menambah data petugas');
        }
        redirect('petugas/view_petugas');
    }

    public function edit_petugas($id){
        $data_petugas = array(
            "nama_petugas" => $this->input->post('nama_petugas')
        );

        $is_success = $this->Petugas_model->update($data_petugas, $id);
        if($is_success){
            $this->show_success_toast('Berhasil mengupdate data petugas.');
        }else{
            $this->show_error_toast('Gagal mengupdate data petugas');
        }

        if($id == $this->get_user_id()){
            $user_session_data = array(
                "id" => $this->get_user_id(),
                "nama" => $this->input->post('nama_petugas'),
                "role" => PETUGAS,
            );
            $this->session->set_userdata("user_session", $user_session_data);
        }
        redirect('petugas/view_petugas');
    }

    public function hapus_petugas($id){
        $is_success = $this->Petugas_model->delete($id);
        if($is_success){
            $this->show_success_toast('Berhasil mengupdate data petugas.');
        }else{
            $this->show_error_toast('Gagal mengupdate data petugas');
        }
        redirect('petugas/view_petugas');
    }
    //End daftar petugas

    public function edit_profile(){
        $this->view_title = 'My Profile';
        $this->view_page = DIR_PETUGAS_PAGES.'/edit_profile';
        $this->show_layout(LOGGEDIN_LAYOUT);
    }

    public function submit_edit_profile(){
        if($this->input->post('password') != null || $this->input->post('password') != ''){
            if(strlen($this->input->post('password')) < 8){
                $this->show_error_toast('Password anda harus lebih dari 8 karakter');
                redirect('petugas/edit_profile');
            }
            if($this->input->post('password') != $this->input->post('cpassword')){
                $this->show_error_toast('Kolom password dan konfirmasi harus sama');
                redirect('petugas/edit_profile');
            }
            $data_profile = array(
                "nama_petugas" => $this->input->post('user_name'),
                "password" => $this->input->post('password'),
            );
        }else{
            $data_profile = array(
                "nama_petugas" => $this->input->post('user_name')
            );
        }

        $is_success = $this->Petugas_model->update($data_profile, $this->get_user_id());
        if($is_success){
            //Update session
            $user_session_data = array(
                "id" => $this->get_user_id(),
                "nama" => $this->input->post('user_name'),
                "role" => PETUGAS,
            );
            $this->session->set_userdata("user_session", $user_session_data);

            $this->show_success_toast('Berhasil mengupdate data profile anda.');
        }else{
            $this->show_error_toast('Gagal mengupdate data profile anda');
        }
        
        redirect('petugas/edit_profile');
    }

    public function logout(){
        $this->session->unset_userdata('user_session');
        $this->session->sess_destroy();
        redirect('/login/sign_in');
    }
}
?>