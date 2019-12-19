<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Products extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
    }

    
    public function index()
    {
       $config = array();
       $config['base_url'] = base_url() . "products/index/";
        $config["total_rows"] = $this->Products_model->countProducts();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->Products_model->
            getAllProducts($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] ='<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_link'] = '<i class="icon-backward"></i>';
        $config['next_link'] = '<i class="icon-forward"></i>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['suffix'] = '.html';

    $this->load->view('templates/header');
    $this->load->view('products/index', array(
            'products' => $data['results'],
            'links' => $data['links']
           )
        );
        $this->load->view('templates/footer');
        }
    }


?>