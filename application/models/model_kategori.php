<?php
class model_kategori extends CI_Model {
	
	function get_table(){
        return $this->db->get("kategori_barang");
    }

    function get_data(){
		$query = $this->db->query("SELECT * FROM kategori_barang");
		return $query->result();
		//return $query->result_array();
	}

	function input($data = array()){
		//query builder
		return $this->db->insert('kategori_barang',$data);
	}

	function delete($id){
		$this->db->where('id_kategori',$id);
		$this->db->delete('kategori_barang');
		
	}

	function get_data_edit($id){
		$query = $this->db->query("SELECT * FROM kategori_barang where id_kategori='$id'");
		return $query->result_array();
	}

	function update($data=array(),$id){
		$this->db->where('id_kategori',$id);
		return $this->db->update('kategori_barang',$data);
	}
}
