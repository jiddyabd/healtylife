<?php

class Index extends Core_Controller {
    public function __construct()
    {
		parent::__construct();
    }
    
    public function utama(){
        $this->view_page = 'index.php';
        $this->view_title = 'Healtylife';
        $this->show_layout(LANDING_LAYOUT);
    }
}
