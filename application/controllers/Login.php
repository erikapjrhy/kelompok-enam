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
		if (!empty($this->session->userdata("username")))
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
			redirect("Home");
		}
	}

	function logout(){
		$array_items = array('id_admin','username','password','nama','alamat','no_telp');
		$this->session->unset_userdata($array_items);
		redirect($this->index());
	}
}

?>