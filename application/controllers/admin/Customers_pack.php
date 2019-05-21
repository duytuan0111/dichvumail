<?php 
	/**
	 * 
	 */
	class Customers_pack extends CI_Controller
	{
		protected $_data;
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('Mcustomers_pack');
      $this->load->model('Mcustomers');
      $this->load->model('Mpackages');
      $this->load->library('Get_data');
      $this->load->library('session');
      $this->load->library('form_validation');
    }
    public function index()
    {
      $this->_data['all_cus']  		= $this->Mcustomers->get_all_customers();
      $this->_data['all_pack']		= $this->Mpackages->get_all_packages();
      $this->_data['page_title'] 		= "Danh sách giao dịch";
      $this->_data['head_title'] 		= "Quản lý giao dịch gói dịch vụ";
      $this->load->view('admin/customers_pack/index.php', $this->_data);
    }
    public function ajax_list()
    {

     $list = $this->Mcustomers_pack->get_datatables();
     $data = array();
     $no = $_POST['start'];
     foreach ($list as $customers_pack) {
      $no++;
      $row = array();
      $row[] = $customers_pack->id;
      $row[] = $this->get_data->get_name_cus_by($customers_pack->customer_id);
      $row[] = $this->get_data->get_name_pack_by($customers_pack->package_id);
      $row[] = $customers_pack->usage;

            //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_cus_pack('."'".$customers_pack->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Sửa </a>
      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_cus_pack('."'".$customers_pack->id."'".')"><i class="glyphicon glyphicon-trash"></i> Xóa</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Mcustomers_pack->count_all(),
      "recordsFiltered" => $this->Mcustomers_pack->count_filtered(),
      "data" => $data,
    );
        //output to json format
    echo json_encode($output);
  }

  public function ajax_edit($id)
  {
   $data = $this->Mcustomers_pack->get_by_id($id);
   echo json_encode($data);
 }

 public function ajax_add()
 {
   
        	// $this->form_validation->set_rules('username','tên đăng nhập','required|trim');
        	// $this->form_validation->set_rules('password','Mật khẩu','required|trim');
        	// $this->form_validation->set_rules('fullname','Họ và tên','required|trim');
        	// $response = array();
  $data = array(
   'id'			          => $this->input->post('id'),
   'customer_id' 			  => $this->input->post('customer_id'),
   'package_id' 		      => $this->input->post('package_id'),
   'usage' 		          => $this->input->post('usage')

 );



  $insert = $this->Mcustomers_pack->save($data);

  $response = array(
   'status' => true,
   'errors' => array(
    'username' => form_error('username'),
    'password' => form_error('password'),
    'fullname' => form_error('fullname')
  )
 );

  echo json_encode(array("status" => TRUE));






}

public function ajax_update()
{
 $data = array(
  'id'                      => $this->input->post('id'),
  'customer_id'             => $this->input->post('customer_id'),
  'package_id'              => $this->input->post('package_id'),
  'usage'                   => $this->input->post('usage')

);


 $this->Mcustomers_pack->update(array('id' => $this->input->post('id')), $data);
 echo json_encode(array("status" => TRUE));
}

public function ajax_delete($id)
{
        //delete file
 $cus = $this->Mcustomers_pack->get_by_id($id);
 $this->Mcustomers_pack->delete_by_id($id);
 echo json_encode(array("status" => TRUE));
}
}
?>