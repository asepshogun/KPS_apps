<?php
	class m_orp extends CI_Model{
		function updateStatDel($data,$id){
			$this->db->where('OUTGOING_RETUR_PRODUCT_ID',$id);
			$result = $this->db->update('kps_outgoing_retur_product',$data);
			return $result;
		}
		function delete($id){
			$this->db->where('kps_retur_barang_ID',$id);
			$this->db->delete('kps_retur_barang');
		}

		function updateStatDelDor($data,$id){
			$this->db->where('KPS_DELIVERY_ORDER_RETUR_ID',$id);
			$result = $this->db->update('kps_delivery_order_retur',$data);
			return $result;
		}
		function deleteDor($id){
			$this->db->where('kps_retur_barang_ID',$id);
			$this->db->delete('kps_retur_barang');
		}
	}

?>