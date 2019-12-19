<?php

class Products extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('session');
        
    }

    
    public function index()
    {
       
     $config['base_url'] = base_url() . "products/index/";

     echo $this->input->post('idbarang');
     $_SESSION['cart'];
     
     
     if($this->input->post('search_product')){
      $data['keyword'] = $this->input->post('search_product');
      $this->session->set_userdata('keyword', $data['keyword']);
     } else {
      $data['keyword'] = $this->session->userdata('keyword');
     }

     $this->db->like('NAMA_BARANG', $data['keyword']);

     $this->db->from('BARANG');


     $config["total_rows"] = $this->db->count_all_results();
     $config["per_page"] = 8;

      
     $this->pagination->initialize($config);

     $data['start'] = $this->uri->segment(3);

     $data["results"] = $this->Products_model->
          getAllProducts($config["per_page"], $data['start'], $data['keyword']);

      $this->load->view('templates/header');
      $this->load->view('products/index', array(
            'products' => $data['results'],
           )
        );
        $this->load->view('templates/footer_js');
        }

    

}


?>