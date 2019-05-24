<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
public function __construct()
{
	parent::__construct();
	$this->load->library('form_validation');
}
public function index()
 {
	$this->load->view('templates/auth_header');
	$this->load->view('auth/login');
	$this->load->view('templates/auth_footer');
} 
public function registration()
{
	$this->form_validation->set_rules('username', 'Username', 'required|trim',['required'=>'Username kosong!']);
	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',['matches'=>'Password tidak sama!','min_length'=> 'Password maksimal 5 karakter!','required'=>'Password kosong!']);
	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
	$this->form_validation->set_rules('nama', 'Nama', 'required|trim',['required'=>'Nama kosong!']);
	$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',['required'=>'Alamat kosong!']);
	$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim',['required'=>'Nomor Telepon kosong!']);



	if($this->form_validation->run() == false){
	$data['title'] = 'User Registration';
	$this->load->view('templates/auth_header', $data);
	$this->load->view('auth/registration');
	$this->load->view('templates/auth_footer');
	}else{
		echo 'Data Berhasil ditambahkan !';

	}
	
}
function logout(){
	$this-> session-> session_destroy();
	redirect ('');
}
function data_pelanggan(){
	 $data = array('data'=>$this->models->data_pelanggan());
        $this->load->view('v_data_pelanggan',$data);
}
}
