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
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
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
        if(!is_null($data)){
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

    //Pagination config
    protected function paginate($url, $per_page, $total_rows){
        $config['base_url'] = base_url($url); //site url
        $config['total_rows'] = $total_rows; //total row
        $config['per_page'] = $per_page;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Previous';
        $config['full_tag_open']    = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end">';
        $config['full_tag_close']   = ' </ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><button class="page-link">';
        $config['num_tag_close']    = '</button></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><button class="page-link">';
        $config['cur_tag_close']    = '</button></li>';
        $config['next_tag_open']    = '<li class="page-item"><button class="page-link">';
        $config['next_tagl_close']  = '</button></li>';
        $config['prev_tag_open']    = '<li class="page-item"><button class="page-link">';
        $config['prev_tagl_close']  = '</button></li>';
        $config['first_tag_open']   = '<li class="page-item"><button class="page-link">';
        $config['prev_tagl_close']  = '</button></li>';
        $config['last_tag_open']    = '<li class="page-item"><button class="page-link">';
        $config['prev_tagl_close']  = '</button></li>';


        $this->pagination->initialize($config);      
        $data['pagination'] = $this->pagination->create_links();

    }

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
