<?php

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model');
        // $this->load->helper('url');
        // $this->load->helper('form');
        // $this->load->library('pagination');
        // $this->load->library('session');
        
    }

    public function index(){
        $this->load->view('templates/header');
        $this->load->view('products/index.php');



    }

    public function exam(){
        $id_barang = 18622 ;
        $test_query = $this->Products_model->suppliers($id_barang);
        echo "<pre>"; 
        print_r($test_query);
  
    }


    public function view(){
   
    //to do later if input post empty or 
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
    $sql_total = $this->Products_model->count_all($smin); 
    $sql_data = $this->Products_model->filter($smax, $smin,$search,$limit, $start, $order_ascdesc);
  
    $sql_filter = $this->Products_model->count_filter($smin,$search); 
    $callback = array(
        'draw'=>$_POST['draw'], // Ini dari datatablenya
        'recordsTotal'=>$sql_total,
        'recordsFiltered'=>$sql_filter,
        'data'=>$sql_data,
        'smax'=>$smax,
        'smin'=>$smin

    );
    header('Content-Type: application/json');
    echo json_encode($callback,JSON_PARTIAL_OUTPUT_ON_ERROR); // Convert array $callback ke json
    }

    }


    
    // public function index()
    // { 
        
        
    //     $sales = $this->Products_model->salesTable();
        
    //     //searchbox
    //     if (!empty($_GET['search_product'])) {
    //         // $this->db->like('product_name', $_GET['search_product']);
    //         // $this->Products_model->findByName($_GET['search_product']);
    //      }
    //      if (!empty($_GET['search_product'])) {
    //     $config["base_url"] = base_url('Products/index?search_product=' . $_GET['search_product']);
    //     } else {
    //     $config["base_url"] = base_url('Products/index?search_product=');
       
    //     }


    //     // $this->db->select("*");
    //     // $this->db->from("mitra");
    
        
    //     $this->load->view('templates/header');
    //     $this->load->view('products/index', array(
    //          'productsales' => json_encode($sales,JSON_PARTIAL_OUTPUT_ON_ERROR),
             
        
            
             
    // //         'msg' => $notification,

    // //         'results' => $allRecords->result(),
    // //         'links' => $links)
    //     ));
    //     $this->load->view('templates/footer_js.php');


       
    // }

//     public function json(){
//     // $sales = $this->Products_model->salesTable();
//     $search = $_POST['search']['value'];
//     $limit = $_POST['length']; // Ambil data limit per page
//     $start = $_POST['start']; // Ambil data start
//     $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
//     $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
//     $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"    
//     $query_db = $this->Products_model->get_db_query();
//     // header('Content-Type: application/json;charset=utf-8');  
//     // foreach ($sales as $key){

//     echo json_encode($query_db,JSON_PARTIAL_OUTPUT_ON_ERROR);
   



// }
    // $err = json_last_error();
    // echo $err;
    // var_dump(json_last_error() === JSON_ERROR_UTF8);
    // json_encode('okay', JSON_THROW_ON_ERROR);

    // foreach ($sales as $k => $v){
    // echo '<pre>';
    // echo mb_detect_encoding($v['SUPPLIER']);
    // iconv(mb_detect_encoding($v['NAMA_BARANG'], mb_detect_order(), true), "UTF-8", $v['NAMA_BARANG']);
    






        //if search box is not empty
    //     if (!empty($_GET['search_product'])) {
    //         $this->db->like('product_name', $_GET['search_product']);
    //      }

        

    //    if (!empty($_GET['search_product'])) {
    //     $config["base_url"] = base_url('Products/index?search_product=' . $_GET['search_product']);
    //     } else {
    //     $config["base_url"] = base_url('Products/index?search_product=');
    //     }

    //     $config["total_rows"] = $totalCount;
    //     $config["per_page"] = $limit;
    //     $config['use_page_numbers'] = TRUE;
    //     $config['page_query_string'] = TRUE;
    //     $config['enable_query_strings'] = TRUE;
    //     $config['num_links'] = 2;
    //     $config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
    //     $config['cur_tag_close'] = '</a></li>';
    //     $config['next_link'] = 'Next';
    //     $config['prev_link'] = 'Previous';
    //     $this->pagination->initialize($config);
    //     $str_links = $this->pagination->create_links();
    //     $links = explode('&nbsp;', $str_links);

    //     $offset = 1;
    //     if (!empty($_GET['per_page'])) {
    //         $pageNo = $_GET['per_page'];
    //         $offset = ($pageNo - 1) * $limit;
    //     }
        
    //     //Get actual result from all records with pagination
    //     $this->db->select("*");
    //     $this->db->from("mitra");
    //     if (!empty($_GET['search_product'])) {
    //         $this->db->like('product_name', $_GET['search_product']);
    //     }
    //     $this->db->limit($limit, $offset);
    //     $allRecords = $this->db->get();

        

       



    //     if(!isset($_SESSION['cart'])){
    //         $_SESSION['cart'] = array();

            
    //     }

        

    //     // if (!isset($_POST['product_plu'])) {
    //     //     // $_SESSION['cart'][]=($id);
    //     //     // print_r($_SESSION['cart']);
    //     //    $_POST['product_plu'] = false;
    //     // } 

    //     $notification = "";

    //     if (isset($_POST['product_plu'])){
    //         $id = unserialize(base64_decode($_POST['product_plu']));
           

    //         if(in_array($id['id'], array_column($_SESSION['cart'], 'id'))){
    //            $notification = $id['name'] . " sudah dipilih" ;
    //            $this->session->set_flashdata('chosen', $notification);
               
               
    //         } else {
    //         $_SESSION['cart'][] = $id;
    //         // print_r($_SESSION['cart']);
    //     }
    // }

         





       
    //     $this->load->view('templates/header');
    //     $this->load->view('products/index', array(
    //         'totalResult' => $totalCount, 
    //         'msg' => $notification,

    //         'results' => $allRecords->result(),
    //         'links' => $links)
    //     );
    //     $this->load->view('templates/footer');
    // }
         

  


    //     }

//     public function index_display() {
        
//         // $this->output->enable_profiler(TRUE);
        
//         // Set default variables
//         $msg = '';
        
//         if($this->input->post('page')){
            
//             $pag_container = '';
//             $where = '';
            
//             // Sanitize the received page   
//             $page = $this->input->post('page');
//             $cur_page = $page;  
//             $page -= 1;
//             // Set the number of results to display
//             $per_page = 5;
//             $previous_btn = true;
//             $next_btn = true;
//             $first_btn = true;
//             $last_btn = true;
//             $start = $page * $per_page;
            
//             if(!empty($this->input->post('search'))){
//                 $where = ' AND (product_name LIKE "%%' . $this->input->post('search') . '%%" OR post_content LIKE "%%' . $this->input->post('search') . '%%") ';
//             }
            
//             // Set the table where we will be querying data
//             $table_name = "mitra";
            
//             // Query the necessary posts
//             $all_blog_posts = $this->db->query("
//                 SELECT * FROM " . $table_name . " 
               
                 
//                 LIMIT ?, ?", array($start, $per_page) );
            
//             // At the same time, count the number of queried posts !!!! 9.49
//             $blogs_count = $this->db->query("
//                 SELECT * FROM " . $table_name . " 
//                 WHERE product_name = 'post'");
            
//             // Loop into all the posts
//             foreach($all_blog_posts->result() as $key => $post): 
                
//                 // Set the desired output into a variable
//                 $msg .= '
//                 <div class = "col-md-12">       
//                     <h2><a href="' . base_url('blog/' . $post->product_name) . '">' . $post->price . '</a></h2>
                   
//                 </div>';
                
//             endforeach;
            
//             // Optional, wrap the output into a container
//             $msg = "<div class='cvf-universal-content'>" . $msg . "</div><br class = 'clear' />";
                    
//             // This is where the magic happens
//             $count = $blogs_count->row();
//             $no_of_paginations = ceil($count->blog_count / $per_page);

//             if ($cur_page >= 7) {
//                 $start_loop = $cur_page - 3;
//                 if ($no_of_paginations > $cur_page + 3)
//                     $end_loop = $cur_page + 3;
//                 else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
//                     $start_loop = $no_of_paginations - 6;
//                     $end_loop = $no_of_paginations;
//                 } else {
//                     $end_loop = $no_of_paginations;
//                 }
//             } else {
//                 $start_loop = 1;
//                 if ($no_of_paginations > 7)
//                     $end_loop = 7;
//                 else
//                     $end_loop = $no_of_paginations;
//             }
            
//             // Pagination Buttons logic         
//             $pag_container .= "
//             <div class='cvf-universal-pagination'>
//                 <ul>";

//             if ($first_btn && $cur_page > 1) {
//                 $pag_container .= "<li p='1' class='active'>First</li>";
//             } else if ($first_btn) {
//                 $pag_container .= "<li p='1' class='inactive'>First</li>";
//             }

//             if ($previous_btn && $cur_page > 1) {
//                 $pre = $cur_page - 1;
//                 $pag_container .= "<li p='$pre' class='active'>Previous</li>";
//             } else if ($previous_btn) {
//                 $pag_container .= "<li class='inactive'>Previous</li>";
//             }
//             for ($i = $start_loop; $i <= $end_loop; $i++) {

//                 if ($cur_page == $i)
//                     $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
//                 else
//                     $pag_container .= "<li p='$i' class='active'>{$i}</li>";
//             }
            
//             if ($next_btn && $cur_page < $no_of_paginations) {
//                 $nex = $cur_page + 1;
//                 $pag_container .= "<li p='$nex' class='active'>Next</li>";
//             } else if ($next_btn) {
//                 $pag_container .= "<li class='inactive'>Next</li>";
//             }

//             if ($last_btn && $cur_page < $no_of_paginations) {
//                 $pag_container .= "<li p='$no_of_paginations' class='active'>Last</li>";
//             } else if ($last_btn) {
//                 $pag_container .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
//             }

//             $pag_container = $pag_container . "
//                 </ul>
//             </div>";
            
//             // We echo the final output
//             echo 
//             '<div class = "cvf-pagination-content">' . $msg . '</div>' . 
//             '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';
            
//         }   
    
//     }

//     public function view($post_name) {
    
        
//         $data['blog'] = $this->post_model->get_post(array('post_name' => $post_name));

//         if (!empty($data['blog'])) {
            
//             $data['post_title'] = $data['blog']->post_title;
            
//             $this->load->view('templates/header', $data);
//             $this->load->view('pages/blog/view', $data);
//             $this->load->view('templates/footer');
            
//         } else {
//             show_404();
//         }
    
        
//     }
// }

    // public function add()
    // {   
    //     $data['judul'] = 'Data produk';
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('products/add',$data);
    //     $this->load->view('templates/footer');

    // }

    // public function details($plu){
    // $data['judul'] = 'Detail';
    // $data['product']= $this->Products_model->getProductById($plu);   
    // $this->load->view('templates/header', $data);
    // $this->load->view('products/detail',$data);
    // $this->load->view('templates/footer');
         
    // }



?>