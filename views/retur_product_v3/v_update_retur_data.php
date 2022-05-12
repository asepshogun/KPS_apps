<!-- <form action="<?php // echo site_url()."/new_item_BO/update";?>" method="POST" class="form-horizontal"> -->
<?php
	// print_r($datas);
?>
<span id="tambah_info"></span> 
<div class="box-body">
    <form id="add_personal_ni_up" class="form-horizontal"> 
    	<input type="hidden" name="KPS_RETUR_BARANG_ID" value="<?php echo $datas->KPS_RETUR_BARANG_ID; ?>" >
     	<div class="col-sm-4">
     		<label>Document Date</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="date" class="form-control" value="<?php echo date('Y-m-d',strtotime($datas->DATE_RTR)); ?>" disabled>
	          </div>
	        </div>
	        <label>Customer</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="KPS_CUSTOMER_ID_RETUR" id="KPS_CUSTOMER_ID_RETUR" url="<?php echo site_url()."/Retur_product_v3/loadPoForSetup";?>" >
	          		<option value="0">-- Select Customer</option>
	          		<?php
	          			foreach ($dataCustomer as $key => $value) { ?>
	          				<option value="<?php echo $value->KPS_CUSTOMER_ID; ?>" <?php if($datas->KPS_CUSTOMER_ID_RETUR==$value->KPS_CUSTOMER_ID){ echo "selected='TRUE'"; } ?> ><?php echo $value->COMPANY_NAME; ?></option>	
	          		<?php
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>
	        <label>PO Number</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="KPS_BUKTI_PESANAN_ID_RETUR" id="KPS_BUKTI_PESANAN_ID_RETUR" >
	          		<option value="0">-- Select PO Number --</option>
	          		<?php
	          			foreach ($buktiPesanan as $keys => $valued) { ?>
	          				<option value="<?php echo $valued->KPS_BUKTI_PESANAN_ID; ?>" <?php if($valued->KPS_BUKTI_PESANAN_ID == $datas->KPS_BUKTI_PESANAN_ID_RETUR){ echo "selected=True"; } ?> ><?php echo $valued->PO_OS_NO_FROM_CUSTOMER; ?></option>
	          		<?php
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>
	        <label>Retur Info VIA</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="RETUR_CANAL" id="RETUR_CANAL" >
	          		<option value="0">-- Select Canal --</option>
	          		<?php
	          			foreach ($dataCanal as $key => $values) { ?>
	          				<option value="<?php echo $values->RETUR_CANAL_ID; ?>" <?php if($values->RETUR_CANAL_ID == $datas->RETUR_CANAL){ echo "selected=True "; } ?> ><?php echo $values->CABAL_VIA; ?></option>	
	          		<?php
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>
	        <label>Retur Date Customer</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="date" class="form-control" id="DATE_RETUR_CUSTOMER" name="DATE_RETUR_CUSTOMER" value="<?php echo date('Y-m-d',strtotime($datas->DATE_RETUR_CUSTOMER)); ?>" required="true">
	          </div>
	        </div>
	        <label>Retur No Customer</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	         	 <input type="text" class="form-control" id="NO_RETUR_FROM_CUSTOMER" name="NO_RETUR_FROM_CUSTOMER" value="<?php echo $datas->NO_RETUR_FROM_CUSTOMER; ?>" required="true">
	          </div>
	        </div>
	        <label>DUE Date Internal</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="date" class="form-control" id="DUE_DATE_PPIC" name="DUE_DATE_PPIC" value="<?php echo date('Y-m-d',strtotime($datas->DUE_DATE_PPIC)); ?>" required="true">
	          </div>
	        </div>
	    </div>
	    <div class="col-sm-4">
	    	<label>DUE Date Customer</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="date" class="form-control" id="DUE_DATE_CUSTOMER" name="DUE_DATE_CUSTOMER" value="<?php echo date('Y-m-d',strtotime($datas->DUE_DATE_CUSTOMER)); ?>" required="true">
	          </div>
	        </div>
	        <label>Delivery Plant</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="KPS_CUSTOMER_DELIVERY_SETUP_ID_FOR_RETUR" id="KPS_CUSTOMER_DELIVERY_SETUP_ID_FOR_RETUR" >
	          		<option value="0">-- Select Delivery Plant --</option>
	          		<?php 
	          			foreach ($deliverySetup as $key => $valuep) { ?>
	          				<option value="<?php echo $valuep->KPS_CUSTOMER_DELIVERY_SETUP; ?>" <?php if($valuep->KPS_CUSTOMER_DELIVERY_SETUP == $datas->KPS_CUSTOMER_DELIVERY_SETUP_ID_FOR_RETUR){ echo "selected=True"; } ?> ><?php echo $valuep->PLANT1_CITY; ?></option>
	          		<?php 	
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>
	        <label>Input/Update Date</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="ClusterDate" value="<?php echo date('d-m-Y'); ?>" disabled >
	          </div>
	        </div>
	        <label>Input/Update By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="kps_cluster_last_update_name" name="kps_cluster_last_update_name" value="<?php echo $this->session->userdata('name'); ?>" disabled >
	          </div>
	        </div>
	        <label>Type Of Complaint</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="kps_type_of_complaint" id="kps_type_of_complaint" >
	          		<option value="0">-- Select Complaint --</option>
	          		<?php
	          			foreach ($data_type_complaint as $key => $values) { ?>
	          				<option value="<?php echo $values->kps_retur_type_complaint_id; ?>" <?php if($values->kps_retur_type_complaint_id==$datas->kps_type_of_complaint){ echo "selected=True"; } ?> ><?php echo $values->type_of_complaint_label; ?></option>	
	          		<?php
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>
	        <label>Customer Submitted By</label>
	    	<div class="form-group">
	        	<div class="col-sm-12">
	    			<input type="text" class="form-control" id="SUBMITTED_BY" name="SUBMITTED_BY"  placeholder="EX : Bambang" required="true" value="<?php echo $datas->SUBMITTED_BY; ?>">
	    		</div>
	    	</div>
	    	<label>Customer Submitted Dept</label>
	    	<div class="form-group">
	        	<div class="col-sm-12">
	    			<input type="text" class="form-control" id="SUBMITTED_DEPT" name="SUBMITTED_DEPT" placeholder="EX : Warehouse" required="true" value="<?php echo $datas->SUBMITTED_DEPT; ?>" >
	    		</div>
	    	</div>
	    </div>
	    <div class="col-md-4">
	    	<label>Checked QC By</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="CHCEKED_QC" id="CHCEKED_QC" >
	          		<option value="0">-- Select Employee --</option>
	          		<?php
	          			foreach ($data_employee as $value_employee) {
	          		?>
	          			<option value="<?php echo $value_employee->KPS_EMPLOYEE_ID; ?>" <?php if($value_employee->KPS_EMPLOYEE_ID==$datas->CHCEKED_QC){ echo "selected=True "; } ?> ><?php echo $value_employee->EMPLOYEE_NAME; ?></option>
	          		<?php		
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>
	        <label>Checked Sales By</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="CHECKED_SALES" id="CHECKED_SALES" >
	          		<option value="0">-- Select Employee --</option>
	          		<?php
	          			foreach ($data_employee as $value_employee) {
	          		?>
	          			<option value="<?php echo $value_employee->KPS_EMPLOYEE_ID; ?>" <?php if($value_employee->KPS_EMPLOYEE_ID==$datas->CHECKED_SALES){ echo "selected=True "; } ?> ><?php echo $value_employee->EMPLOYEE_NAME; ?></option>
	          		<?php		
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>
	        <label>Approved By</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="APPROVED" id="APPROVED" >
	          		<option value="0">-- Select Employee --</option>
	          		<?php
	          			foreach ($data_employee as $value_employee) {
	          		?>
	          			<option value="<?php echo $value_employee->KPS_EMPLOYEE_ID; ?>" <?php if($value_employee->KPS_EMPLOYEE_ID==$datas->APPROVED){ echo "selected=True "; } ?> ><?php echo $value_employee->EMPLOYEE_NAME; ?></option>
	          		<?php		
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>
	        <label>Note</label>
	    	<div class="form-group">
	        	<div class="col-sm-12">
	    			<textarea class="form-control" id="RETUR_MASTER_NOTE" name="RETUR_MASTER_NOTE" value="">
	    				<?php echo $datas->RETUR_MASTER_NOTE; ?>
	    			</textarea>
	    		</div>
	    	</div>
	    	<div class="form-group">
	          	<div class="col-sm-6">
	        		<button type="submit" class="btn btn-success"><b><li class="glyphicon glyphicon-floppy-disk"> </li> Save Data</b></button>
	        	</div>
	        	<div class="col-sm-6">
	        		<button type="submit" onclick="delete_data(<?php echo $datas->KPS_RETUR_BARANG_ID; ?>)" class="btn btn-danger"><b><i class="fa fa-trash" aria-hidden="true"></i> Delete Data</b></button>
	        	</div>
	        </div>
	    </div>
	    <!-- <div class="col-md-3">
	    	
	    </div> -->
    </form>		
</div>         	    			      		        
<script>
	$(document).ready(function() {
		$('#spin_edit').hide();
		$('#btn_submit').show();
		$(".select2").select2();
	});
	function delete_data(KPS_RETUR_BARANG_ID) {
		$('#spin_edit').show();
		$('#btn_submit').hide();
		$('#cancel-row_edit').hide();
		$.ajax({ 
			url 	:"<?php  echo site_url() ;?>/Retur_product_v3/DeleteDataSetup", 
			data 	:{'KPS_RETUR_BARANG_ID':KPS_RETUR_BARANG_ID},
			type 	:'POST',
			dataType:'json',
			async: false,
			success: function (result) {
				if(result.pesan=="Delete data has been succeed"){ 
				  	$('#tambah_info').html(' <div class="alert alert-success alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>'+result.pesan+'</b></div>').show();
				  	document.getElementById("add_personal_ni_up").reset();
				  	setTimeout(function(){  
					 $('#tambah_info').hide(); 
					},5500);
					$('#add-update-data').modal('hide');
				}else{
					$('#tambah_info').html(' <div class="alert alert-warning alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>'+result.pesan+'</b></div>').show(); 
					setTimeout(function(){
						$('#tambah_info').hide(); 
					},5500);

				}
				$('#spin_edit').hide();
				$('#btn_submit').show();
				$('#cancel-row_edit').show();
				masterContent();
			}
		});
	}
	$("form#add_personal_ni_up").submit(function(event){
		$('#spin_edit').show();
		$('#btn_submit').hide();
		$('#cancel-row_edit').hide();
		
	  //disable the default form submission
	  event.preventDefault();
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({ 
		url: "<?php  echo site_url() ;?>/Retur_product_v3/UpdateDataSetup", 
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (result) {
			if(result.pesan=="Update data has been succeed"){ 
				  	$('#tambah_info').html(' <div class="alert alert-success alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>'+result.pesan+'</b></div>').show();
				  	// document.getElementById("add_personal_ni").reset();
				  	setTimeout(function(){  
					 $('#tambah_info').hide(); 
					},5500);
			}else{
				$('#tambah_info').html(' <div class="alert alert-warning alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>'+result.pesan+'</b></div>').show(); 
				setTimeout(function(){
					$('#tambah_info').hide(); 
				},5000)
			}
			$('#spin_edit').hide();
			$('#btn_submit').show();
			$('#cancel-row_edit').show();
			masterContent();
			// show_data_input();
		} //success
	  });//ajax
	 // loadDataForAdd();
	  return false;
	});// form submit END

	function cancelrow() {

	}
	$( document ).on( "change", "#KPS_CUSTOMER_ID_RETUR", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			dataType : 'json',
			success : function(data){
				htmlOption="<option value='0'>-- Select PO Number --</option>";
				for(i=0; i<data.buktiPesanan.length; i++){
					htmlOption+="<option value='"+data.buktiPesanan[i].KPS_BUKTI_PESANAN_ID+"' >"+data.buktiPesanan[i].PO_OS_NO_FROM_CUSTOMER+"</option>"
				}
				htmlOptionPlant="<option value='0'>-- Select Delivery Plant --</option>";
				for(i=0; i<data.deliverySetup.length; i++){
					htmlOptionPlant+="<option value='"+data.deliverySetup[i].KPS_CUSTOMER_DELIVERY_SETUP+"' >"+data.deliverySetup[i].PLANT1_CITY+"</option>"
				}
				$('#KPS_BUKTI_PESANAN_ID_RETUR').html(htmlOption);
				$('#KPS_CUSTOMER_DELIVERY_SETUP_ID_FOR_RETUR').html(htmlOptionPlant);
			}
			
		});


	});
</script>