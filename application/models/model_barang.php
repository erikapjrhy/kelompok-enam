<?php
class model_barang extends CI_Model {
	
	function get_table(){
        return $this->db->get("barang");
    }

    function get_data(){
		$query = $this->db->query("SELECT * FROM barang");
		return $query->result();
		//return $query->result_array();
	}

	function get_kategori(){
		$query = $this->db->query("SELECT * FROM kategori_barang");
		return $query->result();
	}

	public function upload(){
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function save($upload){
		$data = array(
			'id_barang'=>$this->input->post('id_barang'),
			'nama_barang'=>$this->input->post('nama_barang'),
			'ukuran'=>$this->input->post('ukuran'),
			'harga'=>$this->input->post('harga'),
			'stok'=>$this->input->post('stok'),
			'keterangan'=>$this->input->post('keterangan'),
			'id_kategori'=>$this->input->post('id_kategori'),
			'gambar' => $upload['file']['file_name']
		);
		
		$this->db->insert('barang', $data);
	}


	// function input($data = array()){
	// 	//query builder
	// 	return $this->db->insert('barang',$data);
	// }

	

	function delete($id){
		$this->db->where('id_barang',$id);
		$this->db->delete('barang');
		
	}

	function get_data_edit($id){
		$query = $this->db->query("SELECT * FROM barang where id_barang='$id'");
		return $query->result_array();
	}

	function update($data=array(),$id){
		$this->db->where('id_barang',$id);
		return $this->db->update('barang',$data);
	}
}
