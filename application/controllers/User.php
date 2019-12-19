<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index(){
        
        $data['user'] = $this->db->get_where('USER_LOG', ['EMAIL'=> $this->session->userdata['email']])->row_array();
    
        $data['title'] = 'My Profile';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/index', $data);
		$this->load->view('templates/auth_footer');	
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('USER_LOG', ['EMAIL'=> $this->session->userdata['email']])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');

        if($this->form_validation->run() == false){

        $data['title'] = 'Edit Profile';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/edit', $data);
		$this->load->view('templates/auth_footer');	
            
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->db->set('IMAGE', $upload_image);
                $this->db->where('EMAIL', $email);
                $this->db->update('USER_LOG');

                $this->load->library('upload', $config);

            } if($this->upload->do_upload('image')){
                $old_image = $data['user']['IMAGE'];

                if($old_image != 'default.jpg'){
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('IMAGE', $new_image);
            } else {
                echo $this->upload->display_errors();
            }

            $this->db->set('NAME', $name);
            $this->db->where('EMAIL', $email);
            $this->db->update('USER_LOG');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Updated.</div>');
            redirect('user');

        }
    
        
        
    }

}