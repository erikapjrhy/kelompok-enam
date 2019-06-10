<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('model_transaksi');
	}

	public function index ()
	{
		$data = array(
		'data'=>$this->model_transaksi->get_data());
		//var_dump ($data);
		$this->load->view('app/trasaksi',$data);

	}

	function input(){
			if (isset($_POST['btnTambah'])){
			$data = $this->model_kategori->input(array (
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_kategori' => $this->input->post('nama_kategori')));
			redirect('Kategori');
			}else{
			  $this->load->view('app/input_kategori');
	}
}

	function delete($id){
		$this->model_kategori->delete($id);
		redirect('Kategori');
	}

	function edit($id){
		$id = $this->uri->segment(3);
		//var_dump($id);
		$data = array (
			'user' => $this->model_kategori->get_data_edit($id)
		);
		//var_dump($data);
		$this->load->view("app/edit_kategori",$data);
	}
	
	function update(){
		$id = $this->input->post('id_kategori');
		//var_dump($id);
		$insert=$this->model_kategori->update(array(
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_kategori' => $this->input->post('nama_kategori')
			), $id);
		redirect('Kategori');
        }
}