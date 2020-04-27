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
    
    // public function index(){
    //     $this->load->view('templates/header_index.php');
    //     $this->load->view('index.php');
    //     $this->load->view('templates/footer_index.php');
    // }
    
    // public $data = array(
    //     "nama_pasien" => "Ari Wilyan",
    // );

    // public function landing_pasien(){
    //     $this->view_page = 'login_pasien';
    //     $this->view_title ="Imunihealth - Masuk ke Pasien";
    //     $this->show_layout(LANDING_LAYOUT);
    // }

    // public function home(){
    //     $this->view_page = 'home_pasien';
    //     $this->view_title = 'Imunihealth - Beranda Pasien';
    //     $this->show_layout(LANDING_LAYOUT);
    // }

    // public function login_pasien(){
    //     $cek = $this->Pasien_model->login_check();
    //     if ($cek > 0) {
    //         $login = [
    //             "username" => $this->input->post('username',true),
    //             // "email" => $this->input->post('email',true)
    //         ];
    //         $this->session->set_userdata("login", $login);
    //         redirect("pasien/home");
    //     } else {
    //         $this->session->set_flashdata('success', 'Username atau Password salah. Periksa kembali');
    //         redirect("pasien/landing_pasien");
    //     }
    // }

    // public function do_login(){
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     $result = $this->Pasien_model->read($username, $password);

    //     if (count($result) != 0){
    //         $sessionarray = array(
    //             "id_pasien" => $result->id_pasien,
    //             "nama_pasien" => $result->nama_pasien,
    //             "birthday" => $result->birthday,
    //             "email" => $result->email,
    //             "username" => $result->username,
    //             "password" => $result->password,
    //             "alamat" => $result->alamat,
    //             "no_telepon" => $result->no_telepon,
    //             "jenis_kelamin" => $result->jenis_kelamin,
    //             "foto" => $result->foto
    //         );
    //         $this->session->set_userdata('datauser', $sessionarray);
    //         redirect("pasien/profil");
    //     }else{
    //         $this->session->set_flashdata('success', "Username atau Password salah!");
    //         redirect("pasien/landing_pasien");
    //     }
    // }

    // public function register_pasien(){
    //     $this->form_validation->set_rules('nama_pasien','Nama Lengkap', 'required');
    //     $this->form_validation->set_rules('email_pasien','Email', 'required');
    //     $this->form_validation->set_rules('username_pasien','Username', 'required');
    //     $this->form_validation->set_rules('password_pasien','Password', 'required');
    //     $this->form_validation->set_rules('alamat_pasien','Alamat', 'required');
    //     $this->form_validation->set_rules('notelepon_pasien','No Telepon', 'required');

    //     if ($this->form_validation->run() == FALSE){
    //         $data['title'] = "Imunihealth - Registrasi Pasien";
    //         $this->load->view('templates/header_login',$data);
    //         $this->load->view('register_pasien');
    //         $this->load->view('templates/footer_login');
    //         $this->session->set_flashdata('flashregister', 'Tolong isi semua komponen registrasi.');
    //     } else {
    //         $e = $this->Pasien_model->cekUsername($this->input->post('username_pasien', true));
    //         $f = $this->Pasien_model->cekEmail($this->input->post('email_pasien', true));
    //         if ($e > 0 or $f > 0) {
    //             $this->session->set_flashdata('flashregister', 'Email atau Username sudah terdaftar, silahkan login');
    //             redirect('pasien/register_pasien');
    //         }
    //         // $login = [
    //         //     "username" => $this->input->post('username_pasien',true),
    //         //     "email" => $this->input->post('email_pasien',true),
    //         //     "password" => $this->input->post('password_pasien',true)
    //         // ];
    //         // $this->session->set_userdata('login', $login);
    //         $this->session->set_flashdata('newregister', 'Pasien baru Ditambahkan');
    //         $this->Pasien_model->tambahPasien();
    //         redirect('pasien/landing_pasien');
    //     }
    // }

    // public function profil(){
    //     $data['title'] = 'Imunihealth - Profil';
    //     $data_pasien = $this->Pasien_model->GetAllPasien();

    //     $this->load->view('templates/header_home',$data);
    //     $this->load->view('profil_pasien',['data' => $data_pasien]);
    //     $this->load->view('templates/footer_index');
    // }

    // public function LihatJadwalPraktekDokter(){
    //     $data['title'] = 'Telkomedika - Jadwal Praktek Dokter';
    //     $data_dokter = $this->Dokter_model->GetAllDokter();
    //     $this->load->view('templates/header_home',$data);
    //     // $this->load->view('lihat_jadwal_pasien', $data_dokter);
    //     $this->load->view('lihat_jadwal_pasien',['data'=>$data_dokter]);
    //     $this->load->view('templates/footer_home.php');
    // }

    // public function PilihJadwalPeriksa(){
    //     $data['title'] = 'Telkomedika - Pilih Jadwal Periksa';
    //     $data_dokter = $this->Dokter_model->GetAllDokter();
    //     $this->load->view('templates/header_home',$data);
    //     $this->load->view('jadwal_pasien',['data'=>$data_dokter]);
    //     $this->load->view('templates/footer_index.php');
    // }

    // public function tambahJadwalPeriksa(){
    //     $this->form_validation->set_rules("nama","Nama Pasien","required");
    //     $this->form_validation->set_rules("dokter","Pilih Dokter","required");
    //     $this->form_validation->set_rules("tgl","Tanggal Periksa","required");
    //     $this->form_validation->set_rules("keluhan_pasien","Keluhan","required");

    //     // $id_pasien = $this->session->datauser['id_pasien'];
    //     // $id_dokter = $this->db->get_where('dokter',['id_dokter' => $this->input->post('dokter')])->row();

    //     if($this->form_validation->run()){
    //         $this->Pasien_model->jadwalPeriksa();
    //         $this->session->set_flashdata('success', "Ditambahkan");
    //         redirect('pasien/home');
    //     }
    //     redirect('pasien/PilihJadwalPeriksa');
    // }

    // public function do_upload(){

    //     $config['upload_path']          =  './assets/gambar/'; //isi dengan nama folder tempat menyimpan gambar
    //     $config['allowed_types']        =  'gif|jpg|png'; //isi dengan format/tipe gambar yang diterima

    //     $this->load->library('upload', $config);

    //     //lengkapi kondisi berikut
    //     if ( ! $this->upload->do_upload('userfile'))
    //     {
    //         $error = array('error' => $this->upload->display_errors());
    //         $this->load->view('V_Upload_form', $error);        
    //     }
    //     else
    //     {
    //         $data = array('upload_data' => $this->upload->data());
    //         $this->load->view('V_Upload_success', $data);
    //     }
    // }

    // public function ubahProfil($id){
    //     $data['title'] = "Form Ubah Data Profil";
    //     $this->form_validation->set_rules("nama","Nama Pasien","required");
    //     $this->form_validation->set_rules("username","Username Pasien","required");
    //     $this->form_validation->set_rules("email","Email Pasien","required");
    //     $this->form_validation->set_rules("jk","Jenis Kelamin Pasien","required");
    //     $this->form_validation->set_rules("birth","Tanggal Lahir Pasien","required");
    //     $this->form_validation->set_rules("notelpon","No Telepon Pasien","required");
    //     $this->form_validation->set_rules("foto","Foto Profil");
    //     $this->form_validation->set_rules("alamat","Alamat Pasien","required");

    //     $data['pasien'] = $this->Pasien_model->getPasienById($id);
    //     if ($this->form_validation->run()){
    //         $this->session->set_flashdata('berhasil', 'Diubah');
    //         $this->Pasien_model->ubahProfil($this->input->post('id',true));
    //         redirect('pasien/profil');
    //     }
    //     else{
    //         // $data['obat'] = $this->Apoteker_model->GetAllItem();
    //         $this->load->view('templates/header_home',$data);
    //         $this->load->view('ubah_profil',$data);
    //         $this->load->view('templates/footer_index');
    //     }
    // }

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

        $this->Pasien_model->insert($data_pasien);
        $this->Appointment_model->insert($data_appointment);
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