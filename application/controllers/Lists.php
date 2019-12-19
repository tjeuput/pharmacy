<?php

class Lists extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('Products_model1');
        $this->load->library('Ajax_pagination');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('pagination');
      
        $this->load->library('session');
        
    }

    
    public function index()
    {
        $search = array(
            'keyword' => trim($this->input->post('search_key')),
        );
        
        $limit = 8;

        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $config['base_url'] = site_url('lists/list/');
        $config['total_rows'] = $this->Products_model1->getAllProducts($limit, $offset, $search, $count=true);
        $config['per_page'] = $limit;
        $config['uri_segment'] = 2;
        $config['num_links'] = 3;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a href="" class="current_page">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);

        $data['products'] = $this->Products_model1->getAllProducts($limit, $offset, $search, $count=false);
    
        $data['pagelinks'] = $this->pagination->create_links();

        $this->load->view('products/lists', $data);

    }
}
?>