<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class cetaknama {
	
	function tampil_nama($idref, $tableref='kps_employee', $nameref='KPS_EMPLOYEE_ID'){

		$this->ci =& get_instance();

		$this->ci->db->from($tableref);
		$this->ci->db->where($nameref,$idref);
		$query = $this->ci->db->get();
		return $query->first_row();
	}
}

?>