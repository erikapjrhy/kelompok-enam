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
		$this->load->view('app/transaksi',$data);

	}

	function input(){
			if (isset($_POST['btnTambah'])){
			$data = $this->model_transaksi->input(array (
			'id_transaksi' => $this->input->post('id_transaksi'),
			'tanggal_sewa' => $this->input->post('tanggal_sewa'),
			'tanggal_kembali' => $this->input->post('tanggal_kembali'),
			'total' => $this->input->post('total'),
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'gambar_konfirm' => $this->input->post('gambar_konfirm')
		));
			redirect('Transaksi');
			}else{
			  $this->load->view('app/input_transaksi');
	}
}

	function delete($id){
		$this->model_transaksi->delete($id);
		redirect('Transaksi');
	}

	function edit($id){
		$id = $this->uri->segment(3);
		//var_dump($id);
		$data = array (
			'user' => $this->model_transaksi->get_data_edit($id)
		);
		//var_dump($data);
		$this->load->view("app/edit_transaksi",$data);
	}
	
	function update(){
		$id = $this->input->post('id_transaksi');
		//var_dump($id);
		$insert=$this->model_kategori->update(array(
			'id_transaksi' => $this->input->post('id_transaksi'),
			'tanggal_sewa' => $this->input->post('tanggal_sewa'),
			'tanggal_kembali' => $this->input->post('tanggal_kembali'),
			'total' => $this->input->post('total'),
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'gambar_konfirm' => $this->input->post('gambar_konfirm')			
			), $id);
		redirect('Transaksi');
        }
}