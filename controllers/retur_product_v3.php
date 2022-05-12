<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur_product_v3 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$apis_address="http://127.0.0.1:8000/KPS_POINT_OF_SALES_BE/";
		$this->API=$apis_address."return_form/Kps_retur_barang/filters/";
		$this->APIDetail=$apis_address."return_form/Kps_retur_barang_detail/getdata/";
		$this->APIDetailInput=$apis_address."return_form/Kps_retur_barang_detail/getDataInput/";
		$this->APIGet=$apis_address."return_form/Kps_retur_barang/getdata/";
		$this->API_save=$apis_address."return_form/Kps_retur_barang/save/";
		$this->API_save_detail=$apis_address."return_form/Kps_retur_barang_detail/save/";
		$this->API_update=$apis_address."return_form/Kps_retur_barang/update/";
		$this->API_number=$apis_address."return_form/Kps_retur_barang/getdatalast";
		$this->API_data_update=$apis_address."return_form/Kps_retur_barang/getdata";
		$this->APICustomer=$apis_address."master/Kps_customer/getdata/";
		$this->APIloiGET=$apis_address."master/Kps_loi/getdataDetail/";
		$this->APILoi=$apis_address."master/Kps_loi/getdata";
		$this->APIPesanan=$apis_address."master/Kps_buktipesanan/getdata/";
		$this->APICanal=$apis_address."master/Kps_retur_canal/getdata/";
		$this->APIPlant=$apis_address."master/Kps_delivery_plant/getdata/";
		$this->api_employee=$apis_address."master/Kps_employee/getdata/";
		$this->api_type_complaint=$apis_address."master/Kps_type_complaint/getdata/";
		$this->load->library('curl');
		if(!$this->session->userdata('username')){
			redirect('login');
		}
		if ($this->session->userdata('role')=="Administrator" || $this->session->userdata('role')=="PPIC Delivery" || $this->session->userdata('role')=="PPIC Delivery Head"){

		}else{
			redirect('dashboard');
		}
	}
	public function index()
	{
		$data['valuea']=0;$data['valueb']=0;$data['valuec']=0;$data['valued']=0;
		$data['valuee']=0;$data['valuef']=0;$data['valueg']=0;
		$data['dataCanal'] = json_decode($this->curl->simple_get($this->APICanal));
		$data['dataCustomer'] = json_decode($this->curl->simple_get($this->APICustomer,null));
		$data['content'] = 'retur_product_v3/v_retur_product_data';
		$this->load->view('template/template',$data);
	}
	public function search()
	{
		$data=$this->input->post();
		$data['dataCustomer'] = json_decode($this->curl->simple_get($this->APICustomer,null));
		$data['dataCanal'] = json_decode($this->curl->simple_get($this->APICanal));
		$data['content'] = 'retur_product_v3/v_retur_product_data';
		$this->load->view('template/template',$data);
	}
	public function index_detail($KPS_RETUR_BARANG_ID)
	{
		$data_filter['KPS_RETUR_BARANG_ID']=$KPS_RETUR_BARANG_ID;
		$data['datas']= json_decode($this->curl->simple_post($this->APIGet,$data_filter));
		$data['content'] = 'retur_product_v3/v_retur_product_data_detail';
		$this->load->view('template/template',$data);
	}
	public function LoadDataDetail()
	{
		echo $this->curl->simple_post($this->APIDetail,$this->input->post());
	}
	public function LoadData()
	{
		echo $this->curl->simple_post($this->API,$this->input->post());
	}
	public function LoadDataForSetupDetail()
	{
		// $data['data_input_detail']=$this->curl->simple_post($this->APIDetailInput,$data_filter);
		// print_r($data_filter);
		$data['data_filter']=$this->input->post();
		$data['data_loi']=json_decode($this->curl->simple_get($this->APILoi,$data['data_filter']));
		$this->load->view('retur_product_v3/v_setup_retur_data_detail',$data);
	}
	public function LoadDataForSetup()
	{
		$data['dataCustomer'] = json_decode($this->curl->simple_get($this->APICustomer,$this->input->post()));
		$data['data_type_complaint'] = json_decode($this->curl->simple_get($this->api_type_complaint));
		$data['dataCanal'] = json_decode($this->curl->simple_get($this->APICanal));
		$data['data_employee'] = json_decode($this->curl->simple_get($this->api_employee,$this->input->post()));
		$this->load->view('retur_product_v3/v_setup_retur_data',$data);
	}
	public function loadMasterSetupDetail()
	{	
		$data['loi_data']=json_decode($this->curl->simple_get($this->APIloiGET,$this->input->post()));
		echo json_encode($data);
	}
	public function loadPoForSetup()
	{
		$data['deliverySetup']=json_decode($this->curl->simple_get($this->APIPlant,$this->input->post()));
		$data['buktiPesanan'] = json_decode($this->curl->simple_get($this->APIPesanan,$this->input->post()));
		echo json_encode($data);
	}
	public function LoadDataForUpdate()
	{
		$data['datas']=json_decode($this->curl->simple_get($this->API_data_update,$this->input->post()));
		$data_filter_po['id']=$data['datas']->KPS_CUSTOMER_ID_RETUR;
		$data['buktiPesanan'] = json_decode($this->curl->simple_get($this->APIPesanan,$data_filter_po));
		$data['deliverySetup']=json_decode($this->curl->simple_get($this->APIPlant,$data_filter_po));
		// print_r($data['buktiPesanan']);
		$data['dataCustomer'] = json_decode($this->curl->simple_get($this->APICustomer,null));
		$data['data_type_complaint'] = json_decode($this->curl->simple_get($this->api_type_complaint));
		$data['dataCanal'] = json_decode($this->curl->simple_get($this->APICanal));
		$data['data_employee'] = json_decode($this->curl->simple_get($this->api_employee,null));
		$this->load->view('retur_product_v3/v_update_retur_data',$data);
	}
	public function LoadDataInputDetail()
	{
		// print_r($this->input->post());
		echo $this->curl->simple_post($this->APIDetailInput,$this->input->post());
	}
	public function LoadDataInput()
	{
		echo $this->curl->simple_post($this->API,$this->input->post());
	}
	public function get_dataForRetur()
	{
		echo $this->curl->simple_get($this->APICustomer,$this->input->post());
	}
	public function InsertDataSetupDetail()
	{
		$data=$this->input->post();
		$data['KPS_MADE_BY_RETUR_DETAIL']=$this->session->userdata('employeeId');
		$data['QTY_RTR_Remaining_in']=$data['QTY_RTR'];
		$data['QTY_RTR_Remaining_out']=0;
		$insertData=$this->curl->simple_post($this->API_save_detail,$data);
		if ($insertData==true) {
			$row['pesan']="Insert data has been succeed";
		}else{
			$row['pesan']="Insert data has been failed";
		}
		echo json_encode($row);
	}
	public function InsertDataSetup()
	{
		$data=$this->input->post();
		$year = date('y');
		$month = date('m');
		$lastNo=json_decode($this->curl->simple_get($this->API_number,$this->input->post()));
		if(empty($lastNo)){
			$revNoNew = 1;
		}else{
			$revNoNew = $lastNo[0]->REV_NO_RTR+1;
		}
		$no = $year."/RTR-SLS/".$this->KonDecRomawi($month)."/".$revNoNew;
		$dataInsert['NO_RETUR'] = $no;
		$dataInsert['REV_NO_RTR'] = $revNoNew;
		$dataInsert['KPS_RETUR_NO_REVISI'] =0;
		$dataInsert['KPS_CUSTOMER_ID_RETUR']=$data['KPS_CUSTOMER_ID_RETUR'];
		$dataInsert['KPS_BUKTI_PESANAN_ID_RETUR']=$data['KPS_BUKTI_PESANAN_ID_RETUR'];
		$dataInsert['DATE_RETUR_CUSTOMER']=$data['DATE_RETUR_CUSTOMER'];
		$dataInsert['NO_RETUR_FROM_CUSTOMER']=$data['NO_RETUR_FROM_CUSTOMER'];
		$dataInsert['DUE_DATE_PPIC']=$data['DUE_DATE_PPIC'];
		$dataInsert['DUE_DATE_CUSTOMER']=$data['DUE_DATE_CUSTOMER'];
		$dataInsert['KPS_CUSTOMER_DELIVERY_SETUP_ID_FOR_RETUR']=$data['KPS_CUSTOMER_DELIVERY_SETUP_ID_FOR_RETUR'];
		$dataInsert['kps_type_of_complaint']=$data['kps_type_of_complaint'];
		$dataInsert['SUBMITTED_BY']=$data['SUBMITTED_BY'];
		$dataInsert['SUBMITTED_DEPT']=$data['SUBMITTED_DEPT'];
		$dataInsert['CHCEKED_QC']=$data['CHCEKED_QC'];
		$dataInsert['CHECKED_SALES']=$data['CHECKED_SALES'];
		$dataInsert['RETUR_MASTER_NOTE']=$data['RETUR_MASTER_NOTE'];
		$dataInsert['RETUR_CANAL']=$data['RETUR_CANAL'];
		$dataInsert['APPROVED']=$data['APPROVED'];
		$dataInsert['MADE_BY_RB']=$this->session->userdata('employeeId');
		$insertData=$this->curl->simple_post($this->API_save,$dataInsert);
		if ($insertData==true) {
			$row['pesan']="Insert data has been succeed";
		}else{
			$row['pesan']="Insert data has been failed";
		}
		echo json_encode($row);
	}
	public function UpdateDataSetup()
	{
		$data=$this->input->post();
		// $data['kps_cluster_last_update_date']=date('Y-m-d');
		$updateData=$this->curl->simple_post($this->API_update,$data);
		if ($updateData) {
			$row['pesan']="Update data has been succeed";
		}else{
			$row['pesan']="No data has been updated";
		}
		echo json_encode($row);
	}
	public function DeleteDataSetup()
	{
		$data=$this->input->post();
		$data['KPS_RETUR_FLAG_DELETE']=1;
		$updateData=$this->curl->simple_post($this->API_update,$data);
		if ($updateData) {
			$row['pesan']="Delete data has been succeed";
		}else{
			$row['pesan']="Delete Failed";
		}
		echo json_encode($row);
	}
	public function KonDecRomawi($angka){
    $hsl = "";
    if($angka<1||$angka>3999){
        $hsl = "Batas Angka 1 s/d 3999";
    }else{
         while($angka>=1000){
             $hsl .= "M";
             $angka -= 1000;
         }
         if($angka>=500){
	             if($angka>500){
	                 if($angka>=900){
	                     $hsl .= "CM";
	                     $angka-=900;
	                 }else{
	                     $hsl .= "D";
	                     $angka-=500;
	                 }
	             }
	         }
	         while($angka>=100){
	             if($angka>=400){
	                 $hsl .= "CD";
	                 $angka-=400;
	             }else{
	                 $angka-=100;
	             }
	         }
	         if($angka>=50){
	             if($angka>=90){
	                 $hsl .= "XC";
	                  $angka-=90;
	             }else{
	                $hsl .= "L";
	                $angka-=50;
	             }
	         }
	         while($angka>=10){
	             if($angka>=40){
	                $hsl .= "XL";
	                $angka-=40;
	             }else{
	                $hsl .= "X";
	                $angka-=10;
	             }
	         }
	         if($angka>=5){
	             if($angka==9){
	                 $hsl .= "IX";
	                 $angka-=9;
	             }else{
	                $hsl .= "V"; 
	                $angka-=5;
	             }
	         }
	         while($angka>=1){
	             if($angka==4){
	                $hsl .= "IV"; 
	                $angka-=4;
	             }else{
	                $hsl .= "I";
	                $angka-=1;
	             }
	         }
	    }
	    return ($hsl);
	}


}