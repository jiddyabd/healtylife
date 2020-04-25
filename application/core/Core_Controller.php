<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_Controller extends CI_Controller {

    //Attributes
    private $templates;

    //View
    protected $view_data;
    public $view_page;
    public $view_title;
    protected $show_custom_page_css;

    //Toast
    protected $show_toast = false;
    protected $toast;

    /**
     * Core Controller for this webpro final task
     * Should handle these things
     *  1. Store and write all message that happened in models, controler, or even the pages
     *  2. Showing popups notification from templates
     *  3. Change website layout based and load tempalate based on selected layouts
     *  4. TBD
     */
    public function __construct(){
        parent::__construct();
        $this->init_attr();
        // Load helper
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    //Init class attributes
    private function init_attr(){
        //TODO
    }
    

    /**
     * Layout
     *  - Theres should be 1 default layout
     *  - Other layout that "rarely" used must be loaded manually
     *  - ...
     */
    //#start layouy func
    public function show_layout($selected_layout = LOGGEDIN_LAYOUT, $data = null){
        if(is_null($data)){
            $this->view_data = $data;
        }



        $view_layout = $this->get_selected_layout($selected_layout);
        $view_layout['_page_name'] = str_replace('.php', '', $this->view_page);
        $view_layout['_page'] =  $this->load->view($this->view_page, $this->view_data, true);
        $view_layout['_view_title'] = $this->view_title;
        $view_layout['_show_custom_page_css'] = $this->show_custom_page_css;

        $this->load->view(TEMPLATE_DIR.TEMPLATE_BASE, $view_layout);
    }

    private function get_selected_layout($selected_layout){
        switch($selected_layout){
            case LANDING_LAYOUT: return $this->load_landing_layout(); break;
            case LOGGEDIN_LAYOUT: return $this->load_default_layout(); break;
            default: return $this->load_default_layout(); break;
        }
    }


    private function load_landing_layout(){
        return [
            // "sidebar" => $this->load->view(TEMPLATE_DIR.TEMPLATE_SIDEBAR_LANDING, $this->view_data, true), //TODO
            "footer" => $this->load->view(TEMPLATE_DIR.TEMPLATE_FOOTER_LANDING, $this->view_data, true), 
            "header" =>  $this->load->view(TEMPLATE_DIR.TEMPLATE_HEADER_LANDING, $this->view_data, true)
        ];
    }

    private function load_default_layout(){
        return [
            "sidebar" => $this->get_sidebar_by_role(), //TODO
            "footer" => $this->load->view(TEMPLATE_DIR.TEMPLATE_FOOTER_LOGGED_IN, $this->view_data, true), 
            "header" =>  $this->load->view(TEMPLATE_DIR.TEMPLATE_HEADER_LOGGED_IN, $this->view_data, true)
        ];
    }

    private function get_sidebar_by_role(){
        $role = $this->session->userdata("role");
        switch($role){
            case DOKTER: return $this->load->view(TEMPLATE_DIR.TEMPLATE_SIDEBAR_DOKTER, $this->view_data, true); break;
            case PASIEN: return $this->load->view(TEMPLATE_DIR.TEMPLATE_SIDEBAR_PASIEN, $this->view_data, true); break;
            case PETUGAS: return $this->load->view(TEMPLATE_DIR.TEMPLATE_SIDEBAR_PETUGAS, $this->view_data, true); break;
            default: return $this->load->view(TEMPLATE_DIR.TEMPLATE_SIDEBAR_LOGGED_IN, $this->view_data, true); break;
        }
        return $this->load->view(TEMPLATE_DIR.TEMPLATE_SIDEBAR_LOGGED_IN);
    }
    //#end layout func
    
    //Load default data
    private function set_session_view_data(){
        return [

        ];
    }

    /**
     * Toast
     *  - Should showing when theres CRUD or any action happened need to be inform to users
     *  - ...
     */
    public function show_toast(){

    }

    public function hide_toast(){

    }
    //#end toast func

    //Utilities
    protected function is_user_can_access($current_pages){
        $role = $this->session->userdata("role");
        switch($role){
            case DOKTER: if($current_pages == DOKTER) return true; break;
            case PASIEN: if($current_pages == PASIEN) return true; break;
            case PETUGAS: if($current_pages == PETUGAS) return true; break;
            default: return false;
        }
        return false;
    }

    protected function redirect_to_home(){
        $role = $this->session->userdata("role");
        switch($role){
            case DOKTER: 
                redirect('dokter/home');
            break;
            case PASIEN:
                redirect('pasien/home');
            break;
            case PETUGAS: 
                redirect('petugas/dashboard');
            break;
        }

        //If not above then force to logged out
        $this->session->unset_userdata('datauser');
        $this->session->sess_destroy();
        redirect('/login/sign_in');
    }

}
