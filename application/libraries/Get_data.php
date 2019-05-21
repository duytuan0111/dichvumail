<?php 
/**
 * 
 */
class Get_data
{
	public function get_name_cus_by($id)
	{
		$CI =& get_instance();
		$CI->load->model('Mcustomers');
		$row = $CI->Mcustomers->get_customers_by('id', $id);
		return $row['name'];
	}
	public function get_name_pack_by($id)
	{
		$CI =& get_instance();
		$CI->load->model('Mpackages');
		$row = $CI->Mpackages->get_packages_by('id', $id);
		return $row['name'];
	}
}

 ?>