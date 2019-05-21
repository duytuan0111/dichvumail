<?php  
		/**
		 * 
		 */
		class Payments extends CI_Controller
		{
			protected $_data;
			
			function __construct()
			{
				parent::__construct();
				$this->load->Model('Mpayments');
				$this->load->helper('url');
				$this->load->library('session');
				$this->load->library('form_validation');
			}
			public function index()
			{
				$this->_data['page_title'] 		= "Quản lý phương thức thanh toán";
				$this->_data['head_title']		= "Danh sách phương thức thanh toán";
				// $this->_data['all_package']		= $this->Mpayments->get_all_packages();
				$this->load->view('admin/payments/index.php', $this->_data);
			}
			public function ajax_list()
			{

				$list = $this->Mpayments->get_datatables();
				$data = array();
				$no = $_POST['start'];
				foreach ($list as $payments) {
					$no++;
					$row = array();
					$row[] = $payments->id;
					switch ($payments->name) {
                        case '0':
                            $row[] = '<i class="fa fa-cc-palpal"></i> Thanh toán Paypal';
                            break;
                        case '1':
                            $row[] = '<i class="fa fa-cc-stripe"></i> Thanh toán Stripe';
                            break;
                        case '2':
                            $row[] = '<i class="fa fa-cc-visa"></i> Thanh toán Visa';
                            break;
                        
                        default:
                            $row[] = 'Kiểu thanh toán khác';
                            break;
                    }
					$row[] = $payments->description;
                    $row[] = $payments->create_at;
					$row[] = $payments->update_at;

            //add html for action
					$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pay('."'".$payments->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Sửa </a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pay('."'".$payments->id."'".')"><i class="glyphicon glyphicon-trash"></i> Xóa</a>';

					$data[] = $row;
				}

				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->Mpayments->count_all(),
					"recordsFiltered" => $this->Mpayments->count_filtered(),
					"data" => $data,
				);
        //output to json format
				echo json_encode($output);
			}

			public function ajax_edit($id)
			{
			$data = $this->Mpayments->get_by_id($id);
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
        		'create_at' 		=> date('Y-m-d H:i:s')

        	);



        	$insert = $this->Mpayments->save($data);

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
                'id'                => $this->input->post('id'),
                'name'              => $this->input->post('name'),
                'description'       => $this->input->post('description'),
                'update_at'         => date('Y-m-d H:i:s')

            );

          $this->Mpayments->update(array('id' => $this->input->post('id')), $data);
          echo json_encode(array("status" => TRUE));
      }

      public function ajax_delete($id)
      {
        //delete file
       $cus = $this->Mpayments->get_by_id($id);
       $this->Mpayments->delete_by_id($id);
       echo json_encode(array("status" => TRUE));
   }

}
?>