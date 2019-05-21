<?php  
		/**
		 * 
		 */
		class Packages extends CI_Controller
		{
			protected $_data;
			
			function __construct()
			{
				parent::__construct();
				$this->load->Model('Mpackages');
				$this->load->helper('url');
				$this->load->library('session');
				$this->load->library('form_validation');
			}
			public function index()
			{
				$this->_data['page_title'] 		= "Quản lý gói dịch vụ";
				$this->_data['head_title']		= "Danh sách gói dịch vụ";
				$this->_data['all_package']		= $this->Mpackages->get_all_packages();
				$this->load->view('admin/packages/index.php', $this->_data);
			}
			public function ajax_list()
			{

				$list = $this->Mpackages->get_datatables();
				$data = array();
				$no = $_POST['start'];
				foreach ($list as $packages) {
					$no++;
					$row = array();
					$row[] = $packages->id;
					$row[] = $packages->name;
					$row[] = $packages->description;
					$row[] = $packages->quota;
					switch ($packages->quota_type) {
                        case '0':
                            $row[] = 'không lặp lại';
                            break;
                        case '1':
                            $row[] = 'Theo ngày';
                            break;
                        case '2':
                            $row[] = 'Theo tháng';
                            break;
                        
                        default:
                            $row[] = 'khác';
                            break;
                    }
					$row[] = $packages->price;
					$row[] = $packages->status;
					$row[] = $packages->create_at;
					$row[] = $packages->update_at;

            //add html for action
					$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pack('."'".$packages->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Sửa </a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pack('."'".$packages->id."'".')"><i class="glyphicon glyphicon-trash"></i> Xóa</a>';

					$data[] = $row;
				}

				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->Mpackages->count_all(),
					"recordsFiltered" => $this->Mpackages->count_filtered(),
					"data" => $data,
				);
        //output to json format
				echo json_encode($output);
			}

			public function ajax_edit($id)
			{
			$data = $this->Mpackages->get_by_id($id);
        	$data->update_at = ($data->update_at == '0000-00-00') ? '' : $data->update_at; // if 0000-00-00 set tu empty for datepicker compatibility
        	echo json_encode($data);
        }

        public function ajax_add()
        {
        	
        	// $this->form_validation->set_rules('username','tên đăng nhập','required|trim');
        	// $this->form_validation->set_rules('password','Mật khẩu','required|trim');
        	// $this->form_validation->set_rules('fullname','Họ và tên','required|trim');
        	// $response = array();
        	$data = array(
        		'id'				=> $this->input->post('id'),
        		'name' 				=> $this->input->post('name'),
        		'description' 		=> $this->input->post('description'),
        		'quota' 			=> $this->input->post('quota'),
        		'quota_type' 		=> $this->input->post('quota_type'),
        		'price' 			=> $this->input->post('price'),
        		'status' 			=> $this->input->post('status') ? 1 : 0,
        		'create_at' 		=> date('Y-m-d H:i:s')

        	);



        	$insert = $this->Mpackages->save($data);

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
        		'id'				=> $this->input->post('id'),
        		'name' 				=> $this->input->post('name'),
        		'description' 		=> $this->input->post('description'),
        		'quota' 			=> $this->input->post('quota'),
        		'quota_type' 		=> $this->input->post('quota_type'),
        		'price' 			=> $this->input->post('price'),
        		'status' 			=> ($this->input->post('status')) ? 1 : 0,
        		'update_at' 		=> date('Y-m-d H:i:s')
        	);

          $this->Mpackages->update(array('id' => $this->input->post('id')), $data);
          echo json_encode(array("status" => TRUE));
      }

      public function ajax_delete($id)
      {
        //delete file
       $cus = $this->Mpackages->get_by_id($id);
       $this->Mpackages->delete_by_id($id);
       echo json_encode(array("status" => TRUE));
   }

}
?>