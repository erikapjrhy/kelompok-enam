<?php
class model_admin extends CI_Model {
	
	function get_table(){
        return $this->db->get("admin");
    }

    function get_data(){
		$query = $this->db->query("SELECT * FROM admin");
		return $query->result();
		//return $query->result_array();
	}

	function input($data = array()){
		//query builder
		return $this->db->insert('admin',$data);
	}

	function delete($id){
		$this->db->where('id_admin',$id);
		$this->db->delete('admin');
		
	}

	function get_data_edit($id){
		$query = $this->db->query("SELECT * FROM admin where id_admin='$id'");
		return $query->result_array();
	}

	function update($data=array(),$id){
		$this->db->where('id_admin',$id);
		return $this->db->update('admin',$data);
	}
}
