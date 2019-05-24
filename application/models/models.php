<?php
class models extends CI_Model{
	  function data_pelanggan(){
        $query = $this->db->query("SELECT * FROM pelanggan");
		//return $query->result();
		return $query->result_array();
        }
?>
    