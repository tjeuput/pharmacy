<?php 


class Ajaxsearch extends CI_Controller{
// handle search data request

	function index(){
		$this->load->view('templates/header');
		$this->load->view('ajaxsearch');
		$this->load->view('templates/footer');
	}

	function fetch(){

		
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');

		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->ajaxsearch_model->fetch_data($query);
		$output .= '
		<div class = "table-responsive">
		<table class = "table table-bordered table-striped">
		<tr>
		<th>Product Name
		</th>
		<th>Price</th>	
		</tr>
		
		
		
		';

	if($data->num_rows() > 0)	
	{
		foreach ($data->result() as $row ){
			$output .='
			<tr>
				<td>'.$row->product_name.'</td>
				
				<td> Rp.'.$row->price.'</td>	
			</tr>


			
			
			';
		}
	}
	else{
	$output .='<tr>
	<td colspan = "5">No Data</td>
	
				</tr>';

	}
	$output .='</table></div>';
	echo $output;

}
}



?>