<?php 
class User_model extends CI_model {

 public function insert_user($data)
 { 
    $this->db->insert('USERLOGIN', $data);
   
 } 

public function user_login($data){

   $user = $this->db->get_where('USER_LOG', ['EMAIL' => $data['email']])->row_array();

	return $user;



}

}
?>