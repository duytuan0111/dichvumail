<?php 
	/**
	 * 
	 */
	class Customers extends CI_Controller
	{
		protected $_data;
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('Mcustomers');
			$this->load->library('session');
			$this->load->library('form_validation');
		}
		public function index()
		{
			$this->_data['page_title'] = "Danh sách người dùng";
			$this->_data['head_title'] = "Quản lý người dùng";
			$this->load->view('admin/customers/index.php', $this->_data);
		}
		public function ajax_list()
		{

			$list = $this->Mcustomers->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $customers) {
				$no++;
				$row = array();
				$row[] = $customers->id;
				$row[] = $customers->name;
				$row[] = $customers->email;
				$row[] = $customers->phone;
				$row[] = $customers->password;
				$row[] = $customers->address;
				$row[] = $customers->amount;
				$row[] = $customers->api_key;
				$row[] = $customers->active_code;
				$row[] = $customers->last_login;
				$row[] = $customers->create_at;
				$row[] = $customers->update_at;

            //add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_cus('."'".$customers->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Sửa </a>
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_cus('."'".$customers->id."'".')"><i class="glyphicon glyphicon-trash"></i> Xóa</a>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Mcustomers->count_all(),
				"recordsFiltered" => $this->Mcustomers->count_filtered(),
				"data" => $data,
			);
        //output to json format
			echo json_encode($output);
		}

		public function ajax_edit($id)
		{
			$data = $this->Mcustomers->get_by_id($id);
        	$data->create_at = ($data->create_at == '0000-00-00') ? '' : $data->create_at; // if 0000-00-00 set tu empty for datepicker compatibility
        	echo json_encode($data);
        }

        public function ajax_add()
        {
        	
        	// $this->form_validation->set_rules('username','tên đăng nhập','required|trim');
        	// $this->form_validation->set_rules('password','Mật khẩu','required|trim');
        	// $this->form_validation->set_rules('fullname','Họ và tên','required|trim');
        	// $response = array();
        		$data = array(
        			'id'			=> $this->input->post('id'),
        			'name' 			=> $this->input->post('name'),
        			'email' 		=> $this->input->post('email'),
        			'phone' 		=> $this->input->post('phone'),
        			'password' 		=> $this->input->post('password'),
        			'address' 		=> $this->input->post('address'),
        			'api_key' 		=> $this->input->post('api_key'),
        			'create_at' 	=> date('Y-m-d H:i:s')

        		);



        		$insert = $this->Mcustomers->save($data);

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
        		'id' => $this->input->post('id'),
        		'name' => $this->input->post('name'),
        		'email' => $this->input->post('email'),
        		'phone' => $this->input->post('phone'),
        		'password' => $this->input->post('password'),
        		'address' => $this->input->post('address'),
        		'api_key' => $this->input->post('api_key'),
        		'update_at' => date("Y-m-d h:i:s")
        	);


        	$this->Mcustomers->update(array('id' => $this->input->post('id')), $data);
        	echo json_encode(array("status" => TRUE));
        }

        public function ajax_delete($id)
        {
        //delete file
        	$cus = $this->Mcustomers->get_by_id($id);
        	$this->Mcustomers->delete_by_id($id);
        	echo json_encode(array("status" => TRUE));
        }
    }
    ?>