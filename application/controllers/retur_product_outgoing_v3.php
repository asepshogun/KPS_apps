<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class retur_product_outgoing_v3 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$apis_address="http://127.0.0.1:8000/KPS_POINT_OF_SALES_BE/";
		$this->APIOrp_filter=$apis_address."outgoing_retur/Kps_outgoing_retur_product/filters/";
		$this->APICustomer=$apis_address."master/Kps_customer/getdata/";
		$this->APIVehicle=$apis_address."master/Kps_vehicle/getdata/";
		$this->APIRetur_barang=$apis_address."return_form/Kps_retur_barang/getdata/";
		$this->APIOrp=$apis_address."outgoing_retur/Kps_outgoing_retur_product/getdata/";

		$this->APIOrp_insert=$apis_address."outgoing_retur/Kps_outgoing_retur_product/save/";
		$this->load->library('curl');
		$this->load->model('m_outgoing_retur_v3');
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
		$data['content'] = 'retur_product_v3/outgoing_retur_v3/v_outgoing_retur_v3';
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
		echo $this->curl->simple_post($this->APIOrp_filter,$this->input->post());
		// print_r($this->curl->simple_post($this->APIOrp_filter,$this->input->post()));
	}
	public function LoadDataForSetup()
	{
		$data['dataReturBarang'] = json_decode($this->curl->simple_get($this->APIRetur_barang,$this->input->post()));
		$data['dataCustomer'] = json_decode($this->curl->simple_get($this->APICustomer,$this->input->post()));
		$data['dataVehicle'] = json_decode($this->curl->simple_get($this->APIVehicle,$this->input->post()));
		$this->load->view('orp_v3/V_setup_orp',$data);
	}
	public function LoadDataForUpdate()
	{
		$dt = array(
            'id' => ''            
        );
		$data['datas'] = json_decode($this->curl->simple_get($this->APIOrp,$this->input->post()));
		$data['dataReturBarang'] = json_decode($this->curl->simple_get($this->APIRetur_barang,$dt));
		$data['dataCustomer'] = json_decode($this->curl->simple_get($this->APICustomer,$dt));
		$data['dataVehicle'] = json_decode($this->curl->simple_get($this->APIVehicle,$dt));

		$this->load->view('orp_v3/V_update_orp',$data);
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
		// print_r($this->input->post());
		$data = json_decode($this->curl->simple_post($this->APIOrp_insert,$this->input->post()));
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
		$id=$data['OUTGOING_RETUR_PRODUCT_ID'];
		// $kps_data_master_cluster_id=$data['kps_data_master_cluster_id'];
		// unset($data['kps_data_master_cluster_id']);
		// $data['kps_cluster_last_update_date']=date('Y-m-d');
		$updateData=$this->m_orp->updateStatDel($data,$id);
		if ($updateData) {
			$row['pesan']="Update data has been succeed";
		}else{
			$row['pesan']="Update data has been failed";
		}
		echo json_encode($row);
	}
	public function DeleteDataSetup()
	{
		// unset($data['kps_data_master_cluster_id']);
		// $data['kps_cluster_last_update_name']=$this->session->userdata('name');

		$data_id=$this->input->post();
		$id=$data_id['id'];
		$data['date_delete']=date('Y-m-d');
		$data['status_delete']=1;
		
		$updateData=$this->m_orp->updateStatDel($data,$id);
		if ($updateData) {
			$row['pesan']="Delete data has been succeed";
		}else{
			$row['pesan']="Delete data has been failed";
		}
		echo json_encode($row);
	}


}