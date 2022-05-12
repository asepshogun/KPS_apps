<?php
	class m_outgoing_retur_v3 extends CI_Model{
		function updateStatDel($data,$id){
			$this->db->where('OUTGOING_RETUR_PRODUCT_ID',$id);
			$result = $this->db->update('kps_outgoing_retur_product',$data);
			return $result;
		}
		function delete($id){
			$this->db->where('kps_retur_barang_ID',$id);
			$this->db->delete('kps_retur_barang');
		}
	}

?>