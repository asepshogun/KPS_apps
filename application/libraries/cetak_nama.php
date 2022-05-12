<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class cetak_nama{
	
	function tampil_nama($tableref, $nameref, $idref){

		$this->ci =& get_instance();


		$this->ci->db->select(*);
		$this->ci->db->from($tableref);
		$this->ci->db->where($nameref,$idref);
		$query = $this->ci->db->get();
		return $query->first_row();
	}
}

?>