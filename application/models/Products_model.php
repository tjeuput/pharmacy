<?php 
class Products_model extends CI_model {

 public function getAllProducts($limit, $start, $keyword = null)
 { 
    
    if($keyword){
        $this->db->like('NAMA_BARANG', $keyword);

    }
    
    return $this->db->get_where('BARANG', 'HPP>0',$limit,$start)->result_array();


   
   
    } 
    
 

public function countProducts()
{
	return $this->db->get('BARANG')->num_rows();
}


}
?>