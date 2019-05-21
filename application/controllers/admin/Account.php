<?php 
	/**
	 * 
	 */
	class Account extends CI_Controller
	{
		protected $_data;
		function __construct()
		{
			parent::__construct();
			$this->load->model('Musers');
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->library('form_validation');
		}
		public function index()
		{
			$this->_data['lists_admin'] = $this->Musers->get_all_users();
			$this->load->view('admin/account/index.php', $this->_data);
		}
		public function home()
		{
			$this->load->view('admin/index.php');
		}
		public function login()
		{
			$this->form_validation->set_rules("username", "Tài khoản", "required|trim");
			$this->form_validation->set_rules("password", "Mật khẩu", "required|trim");
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				if ($this->Musers->check_login($username,$this->input->post('password')) == 0) 
				{
					$this->session->set_flashdata('msg_login_warning', 'Tên đăng nhập hoặc mật khẩu không chính xác');
					redirect('admin/account','refresh');
				}
				else
				{
					$user_info = $this->Musers->get_users_by($username);
					$this->session->set_userdata('user_login', $username);
					$this->session->set_userdata('user_info', $user_info);
					$this->session->set_userdata('user_login_url', base_url());
				}
				$this->load->view('admin/index.php');
			}
			$this->load->view('admin/account/index.php');
			
		}
		public function logout()
		{
			$this->session->unset_userdata('user_info');
			redirect('admin/account');
		}

	}
 ?>