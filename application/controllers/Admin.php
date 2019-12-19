<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Productview_model');

    }

    public function index(){
        $data['user'] = $this->db->get_where('USER_LOG', ['EMAIL'=> $this->session->userdata['email']])->row_array();
        
        $data['title'] = 'Dashboard';
      
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/index', $data);
		$this->load->view('admin/adminfooter');	
    }

    public function view(){
    
        $smin = $_POST['columns'][3]['search']['value'];
    $smin = (empty($_POST['columns'][3]['search']['value'])) ? 3 : $smin;
    
    
    $smax = $_POST['columns'][4]['search']['value'];
    $smax = (empty($_POST['columns'][4]['search']['value'])) ? 14 : $smax;
  
    // set_value('smax', isset($_POST['columns'][4]['search']['value'])? $_POST['columns'][4]['search']['value'] : 3 );
    
     // set_value('smin', isset($_POST['columns'][3]['search']['value'])? $_POST['columns'][3]['search']['value'] : 13 );
    
    $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit = $_POST['length']; // Ambil data limit per page
    $start = $_POST['start']; // Ambil data start
    // $mins = $_POST['apply'];
    
    
    $order_index = $_POST['order'][0]['column']; 
    $order_field = $_POST['columns'][$order_index]['data']; 
    $order_ascdesc = $_POST['order'][0]['dir']; 
    $sql_total = $this->Productview_model->count_all($smin); 
    $sql_data = $this->Productview_model->filter($smax, $smin,$search,$limit, $start, $order_ascdesc);
  
    $sql_filter = $this->Productview_model->count_filter($smin,$search); 
    $callback = array(
        'draw'=>$_POST['draw'], // Ini dari datatablenya
        'recordsTotal'=>$sql_total,
        'recordsFiltered'=>$sql_filter,
        'data'=>$sql_data,
        'smax'=>$smax,
        'smin'=>$smin

    );
    header('Content-Type: application/json');
    echo json_encode($callback,JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
}

?>