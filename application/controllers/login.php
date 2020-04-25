<?php

    class Login extends Core_Controller {
        public function __construct(){
            parent::__construct();

            if(!is_null($this->get_user_role())){
                $this->redirect_to_home();
            }

            $this->load->model('Dokter_model');
            $this->load->model('Petugas_model');
            $this->load->model('User_model');
        }

        public function sign_in(){
            $this->view_title = 'Welcome to Immunihealth';
            $this->view_page = 'pages/login/signin_screen';
            $this->show_layout(LANDING_LAYOUT);
        }

        public function sign_up(){
            $this->view_title = 'Register';
            $this->view_page = 'pages/login/signup_screen';
            $this->show_layout(LANDING_LAYOUT);
        }
        
        public function submit_sign_in(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $login_user = $this->User_model->is_password_and_username_valid($username, $password);
            if(!is_null($login_user)){
                $user_session_data = array(
                    "id" => $login_user->user_id,
                    "nama" => $login_user->nama_user,
                    "role" => PASIEN,
                );
                $this->session->set_userdata("user_session", $user_session_data);

                redirect('pasien');
                return;
            }
            $login_dokter = $this->Dokter_model->is_password_and_username_valid($username, $password);
            if(!is_null($login_dokter)){
                $user_session_data = array(
                    "id" => $login_dokter->dokter_id,
                    "nama" => $login_dokter->nama_dokter,
                    "role" => DOKTER,
                );
                $this->session->set_userdata("user_session", $user_session_data);

                redirect('dokter');
                return;
            }
            $login_petugas = $this->Petugas_model->is_password_and_username_valid($username, $password);
            if(!is_null($login_petugas)){
                $user_session_data = array(
                    "id" => $login_petugas->petugas_id,
                    "nama" => $login_petugas->nama_petugas,
                    "role" => PETUGAS,
                );
                $this->session->set_userdata("user_session", $user_session_data);

                redirect('petugas');
                return;
            }
        }

        public function on_submit_sign_up(){
            
        }
    }

?>