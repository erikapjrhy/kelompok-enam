<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('model_admin');
	}

	public function index ()
	{
		$data = array(
		'data'=>$this->model_admin->get_data());
		//var_dump ($data);
		$this->load->view('app/admin',$data);

	}

	function input(){
			if (isset($_POST['btnTambah'])){
			$data = $this->model_admin->input(array (
			'id_admin' => $this->input->post('id_admin'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp')
			));
			redirect('Admin');
             }else{
			  $this->load->view('app/input_admin');
	}
}

	function delete($id){
		$this->model_admin->delete($id);
		redirect('Admin');
	}

	function edit($id){
		$id = $this->uri->segment(3);
		//var_dump($id);
		$data = array (
			'user' => $this->model_admin->get_data_edit($id)
		);
		//var_dump($data);
		$this->load->view("app/edit_admin",$data);
	}
	
	function update(){
		$id = $this->input->post('id_admin');
		//var_dump($id);
		$insert=$this->model_admin->update(array(
			'id_admin' => $this->input->post('id_admin'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp')
			), $id);
		redirect('Admin');
        }

        
}