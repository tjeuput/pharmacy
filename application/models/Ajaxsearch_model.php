<?php 
class Ajaxsearch_model extends CI_Model{
    function fetch_data($query){
        $this->db->select("*");
        $this->db->from("mitra");
        if($query != ''){
            $this->db->like('product_name', $query, 'both');
            
        }
            // $this->db->order_by('product_name', 'DESC');
            // $this->db->limit(10, 20);
            return $this->db->get();


        }


    }



?>