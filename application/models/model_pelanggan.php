<?php
class model_pelanggan extends CI_Model {
	
	function get_table(){
        return $this->db->get("pelanggan");
    }

    function get_data(){
		$query = $this->db->query("SELECT * FROM pelanggan");
		return $query->result();
		//return $query->result_array();
	}

	function input($data = array()){
		//query builder
		return $this->db->insert('pelanggan',$data);
	}

	function delete($id){
		$this->db->where('id_pelanggan',$id);
		$this->db->delete('pelanggan');
		
	}

	function get_data_edit($id){
		$query = $this->db->query("SELECT * FROM pelanggan where id_pelanggan='$id'");
		return $query->result_array();
	}

	function update($data=array(),$id){
		$this->db->where('id_pelanggan',$id);
		return $this->db->update('pelanggan',$data);
	}
}
