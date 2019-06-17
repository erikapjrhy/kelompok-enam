<?php  

/**
* 
*/
class login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("m_user");
	}

	function index(){
		if (!empty($this->session->userdata("USERNAME")))
			redirect(base_url("home"));

		$this->load->view("v_login");
	}

	function login_proses(){
		$username=$this->input->post("username");
		$password=md5($this->input->post("password"));
		$user=$this->m_user->login($username,$password);
		
		if ($user) {
			$this->session->set_userdata((array)$user);
			redirect(base_url("home"));
		}else{
			redirect($this->index());
		}
	}

public function logout()
	{
		$this->session->sess_destroy();
		redirect($this->index());
	}
}

?>