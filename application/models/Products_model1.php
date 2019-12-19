<?php 
class Products_model1 extends CI_model {

function __construct(){
	//Set table name
	$this->table = 'BARANG';
}	

 public function getAllProducts($limit, $offset, $search, $count)
 {  
    
 	$this->db->select('*');
 	$this->db->from($this->table);
    
    if($search){ 
        $keyword = $search['keyword'];

        if($keyword){
            $this->db->where("NAMA_BARANG like '%keyword'");
        }
    
    }

    if($count){
       return $this->db->count_all_results();
    }
     else {
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
            
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }

    return array();

   }
} 
?>