<?php
class model_transaksi extends CI_Model {
	
	function get_table(){
        return $this->db->get("transaksi");
    }

    function get_data(){
		$query = $this->db->query("SELECT * FROM transaksi");
		return $query->result();
		//return $query->result_array();
	}

	function input($data = array()){
		//query builder
		return $this->db->insert('transaksi',$data);
	}

	function delete($id){
		$this->db->where('id_transaksi',$id);
		$this->db->delete('transaksi');
		
	}

	function get_data_edit($id){
		$query = $this->db->query("SELECT * FROM transaksi where id_transaksi='$id'");
		return $query->result_array();
	}

	function update($data=array(),$id){
		$this->db->where('id_transaksi',$id);
		return $this->db->update('transaksi',$data);
	}
}
