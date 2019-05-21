<?php 
	/**
	 * 
	 */
	class Users extends CI_Controller
	{
		protected $_data;
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Musers');
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->library('session');

		}
		public function index()
		{
			$this->_data['page_title'] 	= "Danh sách thành viên";
			$this->_data['head_title'] 	= "Quản lý thành viên";
			$this->load->view('admin/users/index.php', $this->_data);
		}
		public function ajax_list()
		{

			$list = $this->Musers->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $users) {
				$no++;
				$row = array();
				$row[] = $users->id;
				$row[] = $users->username;
				$row[] = $users->password;
				$row[] = $users->fullname;
				$row[] = $users->email;
				$row[] = $users->phone;
				$row[] = $users->create_at;
				$row[] = $users->update_at;
				// if($person->photo)
				// 	$row[] = '<a href="'.base_url('upload/'.$person->photo).'" target="_blank"><img src="'.base_url('upload/'.$person->photo).'" class="img-responsive" /></a>';
				// else
				// 	$row[] = '(No photo)';

            //add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$users->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Sửa</a>
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$users->id."'".')"><i class="glyphicon glyphicon-trash"></i> Xóa</a>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Musers->count_all(),
				"recordsFiltered" => $this->Musers->count_filtered(),
				"data" => $data,
			);
        //output to json format
			echo json_encode($output);
		}

		public function ajax_edit($id)
		{
			$data = $this->Musers->get_by_id($id);
        	$data->create_at = ($data->create_at == '0000-00-00') ? '' : $data->create_at; // if 0000-00-00 set tu empty for datepicker compatibility
        	echo json_encode($data);
        }

        public function ajax_add()
        {
        	
        	$this->form_validation->set_rules('username','tên đăng nhập','required|trim');
        	$this->form_validation->set_rules('password','Mật khẩu','required|trim');
        	$this->form_validation->set_rules('fullname','Họ và tên','required|trim');
        	$response = array();
        	if ($this->form_validation->run() == TRUE) {
        		$data = array(
        			'id'			=> $this->input->post('id'),
        			'username' 		=> $this->input->post('username'),
        			'password' 		=> $this->input->post('password'),
        			'fullname' 		=> $this->input->post('fullname'),
        			'email' 		=> $this->input->post('email'),
        			'phone' 		=> $this->input->post('phone'),
        			'role' 			=> $this->input->post('role'),
        			'forgot_code'	=> $this->input->post('forgot_code'),
        			'create_at' 	=> date("y-m-d")

        		);



        		$insert = $this->Musers->save($data);

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

        	



        }

        public function ajax_update()
        {
        	$data = array(
        		'id' => $this->input->post('id'),
        		'username' => $this->input->post('username'),
        		'password' => $this->input->post('password'),
        		'fullname' => $this->input->post('fullname'),
        		'email' => $this->input->post('email'),
        		'phone' => $this->input->post('phone'),
        		'role' => $this->input->post('role'),
        		'forgot_code' => $this->input->post('forgot_code'),
        		'update_at' => date("Y-m-d h:i:s")
        	);


        	$this->Musers->update(array('id' => $this->input->post('id')), $data);
        	echo json_encode(array("status" => TRUE));
        }

        public function ajax_delete($id)
        {
        //delete file
        	$person = $this->Musers->get_by_id($id);
        	$this->Musers->delete_by_id($id);
        	echo json_encode(array("status" => TRUE));
        }
       //  public function _validate()
       //  {
       //     if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
       //     {

       //     }

       // }
       public function check_username()
       {
        $username = trim($this->input->post('username'));
        $check    = $this->Musers->check_username($username);
        if (!empty($check)) {
            $this->form_validation->set_message('check_username', 'Username đã tồn tại');
        }
        if (empty($check)) {
            $this->form_validation->set_message('check_username', 'Trường Username là bắt buộc');
        }
    }
    public function check_email()
    {
        $email = trim($this->input->post('email'));
        $check = $this->Musers->check_email_user($email);
        if (!empty($check)) {
            $this->form_validation->set_message('check_email', 'Email đã tồn tại');
        }
        if (empty($check)) {
            $this->form_validation->set_message('check_email', 'Trường Email là bắt buộc');
        }
    }



}
?>