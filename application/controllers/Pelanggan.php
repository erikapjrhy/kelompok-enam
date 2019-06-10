<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('model_pelanggan');
	}

	public function index ()
	{
		$data = array(
		'data'=>$this->model_pelanggan->get_data());
		//var_dump ($data);
		$this->load->view('app/pelanggan',$data);

	}

	function input(){
			if (isset($_POST['btnTambah'])){
			$data = $this->model_pelanggan->input(array (
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin')));
			redirect('Pelanggan');
             }else{
			  $this->load->view('app/input_pelanggan');
	}
}

	function delete($id){
		$this->model_pelanggan->delete($id);
		redirect('Pelanggan');
	}

	function edit($id){
		$id = $this->uri->segment(3);
		//var_dump($id);
		$data = array (
			'user' => $this->model_pelanggan->get_data_edit($id)
		);
		//var_dump($data);
		$this->load->view("app/edit_pelanggan",$data);
	}
	
	function update(){
		$id = $this->input->post('id_pelanggan');
		//var_dump($id);
		$insert=$this->model_pelanggan->update(array(
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin')
			), $id);
		redirect('Pelanggan');
        }

        
}