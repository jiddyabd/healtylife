<?php

class Index extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
    public function utama(){
        $this->load->view('templates/header_index.php');
        $this->load->view('index.php');
        $this->load->view('templates/footer_index.php');
    }
}
