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
    protected $toast_visibility = 'hide';
    protected $toast_msg = '';
    protected $toast_type = 'default';

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

        if(!is_null($this->session->userdata("user_session"))){
            $this->set_session_view_data();
        };

        $view_layout = $this->get_selected_layout($selected_layout);
        $view_layout['_page_name'] = str_replace('.php', '', $this->view_page);
        $view_layout['_page'] =  $this->load->view($this->view_page, $this->view_data, true);
        $view_layout['_view_title'] = $this->view_title;
        $view_layout['_show_custom_page_css'] = $this->show_custom_page_css;

        //Toast
        $this->set_toast_props($view_layout);

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
        $role = $this->get_user_role();
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
        $this->view_data['_user_role'] = $this->get_user_role();
        $this->view_data['_user_name'] = $this->get_user_name();
        $this->view_data['_user_id'] =  $this->get_user_id();
    }

    /**
     * Toast
     *  - Should showing when theres CRUD or any action happened need to be inform the users
     *  - ...
     */
    private function set_toast_props(& $view_layout){
        if($this->session->flashdata('show_toast') != null){
            $this->toast_visibility = 'show';
            $this->toast_msg = $this->session->flashdata('show_toast');
            $this->toast_type = $this->session->flashdata('toast_type');
        }
        $view_layout['_toast_visibility'] = $this->toast_visibility;
        $view_layout['_toast_msg'] = $this->toast_msg;
        $view_layout['_toast_type'] = $this->toast_type;
        $view_layout['_toast_label'] = $this->get_toast_type_label();
    }

    public function show_toast($message){
        $this->session->set_flashdata('show_toast', $message);
        $this->session->set_flashdata('toast_type', 'default');
    }

    public function show_success_toast($message){
        $this->show_toast($message);
        $this->session->set_flashdata('toast_type', 'success');
    }

    public function show_error_toast($message){
        $this->show_toast($message);
        $this->session->set_flashdata('toast_type', 'error');
    }

    private function get_toast_type_label(){
        switch($this->toast_type){
            case 'default': return "Notification"; break;
            case 'success': return "Success!"; break;
            case 'error' : return "Error!"; break;
        }
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

    //Validation form
    protected function is_input_text_more_than_min_chars($input_text, $min){
        return strlen($input_text) >= $min;
    }

    //Utilities
    protected function is_user_can_access($current_pages){
        $role = $this->get_user_role();
        switch($role){
            case DOKTER: if($current_pages == DOKTER) return true; break;
            case PASIEN: if($current_pages == PASIEN) return true; break;
            case PETUGAS: if($current_pages == PETUGAS) return true; break;
            default: return false;
        }
        return false;
    }

    protected function redirect_to_home(){
        $role = $this->get_user_role();
        switch($role){
            case DOKTER: 
                redirect('dokter/');
            break;
            case PASIEN:
                redirect('pasien/');
            break;
            case PETUGAS: 
                redirect('petugas/');
            break;
        }

        //If not above then force to logged out
        $this->session->unset_userdata('datauser');
        $this->session->sess_destroy();
        redirect('/login/sign_in');
    }

    protected function get_user_session(){
        return $this->session->userdata('user_session');
    }

    protected function get_user_id(){
        if(!is_null($this->get_user_session())){
            return $this->get_user_session()['id'];
        }
        return null;
    }

    protected function get_user_name(){
        if(!is_null($this->get_user_session())){
            return $this->get_user_session()['nama'];
        }
        return null;
    }

    protected function get_user_role(){
        if(!is_null($this->get_user_session())){
            return $this->get_user_session()['role'];
        }
        return null;
    }

    protected function get_day_on_indonesia($day){
        switch($day){
            case 'Monday': return "Senin"; break;
            case 'Tuesday': return "Selasa"; break;
            case 'Wednesday': return "Rabu"; break;
            case 'Thrusday': return "Kamis"; break;
            case 'Friday': return "Jumat"; break;
            case 'Saturday': return "Sabtu"; break;
            case 'Sunday': return "Minggu"; break;
        }
    }

}
