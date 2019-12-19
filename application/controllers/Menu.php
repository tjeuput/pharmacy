<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Submenu_model');

        
    }

    public function index(){
        $data['title'] = 'Menu Management';
       
        $data['user'] = $this->db->get_where('USER_LOG', ['EMAIL'=> $this->session->userdata['email']])->row_array();
        
        $data['menu'] = $this->db->get('USERMENU')->result_array();
        
        $this->form_validation->set_rules('newdata', 'Newdata', 'required');

       
       
        if($this->form_validation->run() == false){

           

            
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Menu/index', $data);
            $this->load->view('templates/auth_footer');	
            
        } else { 
            
            $query = $this->db->query("SELECT max(ID) +1 FROM USERMENU;");
            $row = $query->row();
           

            $this->db->insert('USERMENU',['ID'=>$row->ADD,
            'MENU'=>  htmlspecialchars($this->input->post('newdata'), TRUE)]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New menu is successfully added. </div>');

            redirect(base_url('Menu/index'));
        
        
        }

    }

    public function submenu(){

        $smcolumn = $this->Submenu_model->submenuColumn();

        $data['title'] = 'Sub Menu';
       
        $data['user'] = $this->db->get_where('USER_LOG', ['EMAIL'=> $this->session->userdata['email']])->row_array();
        $this->db->order_by('ID', 'asc');
        $data['submenu'] = $this->db->get('SUB_USER_MENU')->result_array();
        

        if($this->form_validation->run() == false){

            
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Menu/submenu', $data);
            $this->load->view('templates/auth_footer');	
            
        } else { 
          
           // entry data submenu
        
        
        }



    }
}

?>