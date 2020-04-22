<?php

    class Login extends Core_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('Pasien_model');
            // $this->load->model('Dokter_model');
            // $this->load->model('Apoteker_model');
        }

        public function sign_in(){
            $this->view_page = 'pages/login/signin_screen';
            $this->show_layout(LANDING_LAYOUT);
        }

        public function sign_up(){
            $this->view_page = 'pages/login/signup_screen';
            $this->show_layout(LANDING_LAYOUT);
        }
        
    }

?>