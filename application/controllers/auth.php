<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('model_barang');
	}

	public function index ()
	{
		$data = array(
		'data'=>$this->model_barang->get_data());
		//var_dump ($data);
		$this->load->view('app/index',$data);

	}

		public function tambah(){
		$data = array();
		
		if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
			// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
			$upload = $this->model_barang->upload();
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				$this->model_barang->save($upload);
				
				redirect('Auth'); // Redirect kembali ke halaman awal / halaman view data
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->load->view('app/input_barang', $data);
	}

	// function input(){
	// 		if (isset($_POST['btnTambah'])){
	// 		$data = $this->model_barang->input(array (
	// 		'id_barang' => $this->input->post('id_barang'),
	// 		'nama_barang' => $this->input->post('nama_barang'),
	// 		'ukuran' => $this->input->post('ukuran'),
	// 		'harga' => $this->input->post('harga'),
	// 		'stok' => $this->input->post('stok'),
	// 		'keterangan' => $this->input->post('keterangan'),
	// 		'id_kategori' => $this->input->post('id_kategori'),
	// 		'gambar' => $this->input->post('gambar')));
	// 		redirect('Auth');
	// 		}else{
	// 		  $x =$this->model_barang->get_kategori();
			  
	// 		  $data = array(
	// 			'kategori_barang'=>$this->model_barang->get_kategori());
	// 		  $this->load->view('app/input_barang',$data);
	// 	}
	// }

	function delete($id){
		$this->model_barang->delete($id);
		redirect('Auth');
	}

	function edit($id){
		$id = $this->uri->segment(3);
		//var_dump($id);
		$data = array (
			'user' => $this->model_barang->get_data_edit($id)
		);
		//var_dump($data);
		$data ['id_kategori']=$this->model_barang->get_kategori();
		
		$this->load->view("app/edit_barang",$data);
	}
	
	function update(){
		$id = $this->input->post('id_barang');
		//var_dump($id);
		$insert=$this->model_barang->update(array(
			'nama_barang' => $this->input->post('nama_barang'),
			'ukuran' => $this->input->post('ukuran'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok'),
			'keterangan' => $this->input->post('keterangan'),
			'id_kategori' => $this->input->post('id_kategori')
			), $id);
		redirect('Auth');
        }

}