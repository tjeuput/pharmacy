<?php

Class My_model extends CI_model{
    function get_data($rowno,$rowperpage,$search=""){
     $this->db->select('*');
     $this->db->from('mitra');
    
     if($search != ''){
       $this->db->like('product_name',$search);
       
     }

     $this->db->limit($rowperpage,$rowno); //?
     $query = $this->db->get();
     return $query->result_array();
    }

     // select total records
     public function getrecordCount($search='')
     {
       $this->db->select('count(*) as allcount');
       $this->db->from('mitra');

       if($search != ''){
         $this->db->like('product_name', $search);
         
       }

       $query = $this->db->get();
       $result = $query->result_array();
       
       return $result[0]['allcount'];

     }


    // function get_search($keyword){
    //   $this->db->from('mitra');
    //   $this->db->like('product_name',$keyword);
    //   return $this->db->get()->result();

    // }

    }

?>