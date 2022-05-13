<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dor_v3 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->APIDor_filter="http://localhost:8091/delivery_order_replace/Kps_delivery_order_retur/filters/";
		$this->APICustomer="http://localhost:8091/master/Kps_customer/getdata/";
		$this->APIOrp="http://localhost:8091/outgoing_retur/Kps_outgoing_retur_product/getdata/";

		$this->APIDor_insert="http://localhost:8091/delivery_order_replace/Kps_delivery_order_retur/save/";
		$this->APIDor="http://localhost:8091/delivery_order_replace/Kps_delivery_order_retur/getdata/";
		$this->load->library('curl');
		$this->load->model('m_orp');
		// if(!$this->session->userdata('username')){
		// 	redirect('login');
		// }
		// if ($this->session->userdata('role')=="Administrator" || $this->session->userdata('role')=="PPIC Delivery" || $this->session->userdata('role')=="PPIC Delivery Head"){

		// }else{
		// 	redirect('dashboard');
		// }
	}
	public function index()
	{
		$data['valuea']=0;$data['valueb']=0;$data['valuec']=0;$data['valued']=0;
		$data['valuee']=0;$data['valuef']=2;$data['valueg']=2;
		$data['content'] = 'dor_v3/V_dor';
		$this->load->view('template/template',$data);
	}
	public function search()
	{
		$data=$this->input->post();
		$data['content'] = 'auto_deliver_quota/cluster/v_master_cluster_data';
		$this->load->view('template/template',$data);
	}
	public function LoadData()
	{
		echo $this->curl->simple_post($this->APIDor_filter,$this->input->post());
	}
	public function LoadDataForSetup()
	{
		$data['dataOrp'] = json_decode($this->curl->simple_get($this->APIOrp,$this->input->post()));
		$data['dataCustomer'] = json_decode($this->curl->simple_get($this->APICustomer,$this->input->post()));
		$this->load->view('dor_v3/V_setup_dor',$data);
	}
	public function LoadDataForUpdate()
	{
		$dt = array(
            'id' => ''            
        );
		$data['datas'] = json_decode($this->curl->simple_get($this->APIDor,$this->input->post()));
		$data['dataOrp'] = json_decode($this->curl->simple_get($this->APIOrp,$dt));
		$data['dataCustomer'] = json_decode($this->curl->simple_get($this->APICustomer,$dt));

		$this->load->view('dor_v3/V_update_dor',$data);
	}
	public function LoadDataInput()
	{
		echo $this->curl->simple_post($this->API,$this->input->post());
	}
	public function get_dataForRetur()
	{
		echo $this->curl->simple_get($this->APICustomer,$this->input->post());
	}
	public function InsertDataSetup()
	{
		print_r($this->input->post());
		$data = json_decode($this->curl->simple_post($this->APIDor_insert,$this->input->post()));
		if($data->status == "success"){
			$row['pesan']="Insert data has been succeed";
		}else{
			$row['pesan']="Insert data has been failed";
		};
		echo json_encode($row);
	}
	public function UpdateDataSetup()
	{
		$data=$this->input->post();
		$a_procedure = "CALL dor_update_byid (?,?,?,?,?,?,?,?,?,?)";
		$updateData = $this->db->query( $a_procedure, array('KPS_DELIVERY_ORDER_RETUR_ID'=>$data['KPS_DELIVERY_ORDER_RETUR_ID'], 'KPS_DO_RETUR_NO'=>$data['KPS_DO_RETUR_NO'], 'OUTGOING_RETUR_PRODUCT_ID_DO'=>$data['OUTGOING_RETUR_PRODUCT_ID_DO'], 'KPS_DO_REV_NO'=>'123456789', 'KPS_DO_RETUR_MADE_BY'=>$data['KPS_DO_RETUR_MADE_BY'], 'KPS_DO_RETUR_APPROVE_BY'=>$data['KPS_DO_RETUR_APPROVE_BY'],'KPS_DELIVERY_ORDER_NOTE'=>'KPS_DELIVERY_ORDER_NOTE', 'DO_retur_rev_no'=>$data['DO_retur_rev_no'],'KPS_CUSTOMER_PLANT_ID_DO'=>$data['KPS_CUSTOMER_PLANT_ID_DO'], 'date_update'=>date('Y-m-d')));

		$num = $updateData->conn_id->affected_rows;
		$rslt = print_r($num, true);
		if ($rslt == "1") {
			$row['pesan']="Update data has been succeed";
		}else{
			$row['pesan']="Update data has been failed";
		}
		echo json_encode($row);
	}
	public function DeleteDataSetup()
	{
		$data_id=$this->input->post();

		$a_procedure = "CALL dor_del_byupdate_status (?,?,?)";
		$updateData = $this->db->query( $a_procedure, array('KPS_DELIVERY_ORDER_RETUR_ID'=>$data_id['id'], 'date_delete'=>date('Y-m-d'),'status_delete'=>1) );
		$num = $updateData->conn_id->affected_rows;
		$rslt = print_r($num, true);
		if ($rslt == "1") {
			$row['pesan']="Delete data has been succeed";
		}else{
			$row['pesan']="Delete data has been failed";
		}
		echo json_encode($row);
	}


}