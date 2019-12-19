<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));

	}

	
	public function index()
	{   
	if($this->session->set_userdata('email')){
			redirect('user');
		}

	$data['title'] = 'Login Page';

	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

	$this->form_validation->set_rules('password', 'Password', 'trim|required');

	$email = $this->input->post('email');

	$password = $this->input->post('password');

	$data = ['email' => $email, 'password' => $password];


    if($this->form_validation->run() == false){

		$data['title'] = 'Login Page';

		$this->load->view('templates/auth_header', $data);

		$this->load->view('auth/index', $data);

		$this->load->view('templates/auth_footer');	
		
	} else { 

		$user = $this->User_model->user_login($data);
	
		  if($user['IS_ACTIVE'] == 1) {
				if(password_verify($password, $user['PASSWORD'])){
					$data =['email' => $user['EMAIL'], 
					'role_id' => $user['ROLE_ID']];

					$this->session->set_userdata($data);
					if($user['ROLE_ID']==1){
						redirect(base_url('Admin/index'));
					} else{
						redirect(base_url('User/index'));
					}

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password. Try again. </div>');

					redirect(base_url('Auth'));

				}

		
			
			} else {
			
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> The username you entered doesnt exist. </div>');
	
				redirect(base_url('Auth'));

		

			}
		
	}

	

	}

	public function registration()

	{
		if($this->session->setuserdata('email')){
			redirect('user');
		}
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[USER_LOG.EMAIL]',
		['is_unique' => 'This email has already registered']);
		
		$this->form_validation->set_rules('password1', 'Password','required|trim|min_length[6]|matches[password2]',
		['matches' => 'Password donnt match',
		'min_length'=>'Password too short']);
		
		$this->form_validation->set_rules('password2', 'Password','required|trim|min_length[6]|matches[password1]');
		
	    if ($this->form_validation->run() == FALSE){
		
			$data['title'] = 'User Registration';
			
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		
	    } else {

			$data = [ 'ID' =>  rand(),
					'NAME' => htmlspecialchars($this->input->post('name', true)),
					'EMAIL' => htmlspecialchars($this->input->post('email'), true),
					'IMAGE' => 'default.jpg',
					'PASSWORD' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'ROLE_ID' => 2,
					'IS_ACTIVE' => 1,
					'DATE_CREATED' => time()
						];
		 
			// $this->User_model->insert_user($data);
			$this->db->insert('USER_LOG', $data);
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Account has been created. You may now login.</div>');

			redirect(base_url('Auth'));


				 }
		}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Logged out.</div>');
		redirect(base_url('Auth/index'));
	}	


	}



?>