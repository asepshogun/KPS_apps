<!-- <form action="<?php // echo site_url()."/new_item_BO/update";?>" method="POST" class="form-horizontal"> -->

<span id="tambah_info"></span> 
<div class="box-body">
	<?php
	// print_r($dataCustomer);
?>
    <form id="add_personal_ni" class="form-horizontal"> 
     	<div class="col-sm-6">
     		<label>Outgoing Retur Product Date</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="date"  id="OUTGOING_RETUR_PRODUCT_DATE" name="OUTGOING_RETUR_PRODUCT_DATE" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
	          </div>
	        </div>

	        <label>Outgoing Retur Product No</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="OUTGOING_RETUR_PRODUCT_NO" name="OUTGOING_RETUR_PRODUCT_NO" value="" required="true">
	          </div>
	        </div>

	        <label>Retur Product No</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="KPS_RETUR_BARANG_ID" id="KPS_RETUR_BARANG_ID" >
	          		<option value=" ">-- Select Retur Product</option>
	          		<?php
	          			foreach ($dataReturBarang as $key => $value) { ?>
	          				<option value="<?php echo $value->KPS_RETUR_BARANG_ID; ?>"><?php echo $value->NO_RETUR; ?></option>	
	          		<?php
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>

	        <label>Delivery Date Outgoing</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="date" class="form-control" id="delivery_date_outgoing" name="delivery_date_outgoing" value="<?php echo date('Y-m-d'); ?>" required="true">
	          </div>
	        </div>

	        <label>Vehicle No</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="KPS_VEHICLE_ID" id="KPS_VEHICLE_ID" >
	          		<option value=" ">-- Select Vehicle</option>
	          		<?php
	          			foreach ($dataVehicle as $key => $value) { ?>
	          				<option value="<?php echo $value->KPS_VEHICLE_ID; ?>"><?php echo $value->VEHICLE_NO; ?></option>	
	          		<?php
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>

	        <label>Driver</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	         	 <input type="text" class="form-control" id="outgoing_retur_driver" name="outgoing_retur_driver" value="" required="true">
	          </div>
	        </div>

	        <label>Assistant</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	         	 <input type="text" class="form-control" id="outgoing_retur_asisten" name="outgoing_retur_asisten" value="" required="true">
	          </div>
	        </div>
	    </div>
	    <div class="col-sm-6">
	    	<label>Made By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="OUTGOING_RETUR_PRODUCT_MADE_BY" name="OUTGOING_RETUR_PRODUCT_MADE_BY" value="" required="true">
	          </div>
	        </div>
	        <label>Approve By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="approve_by" name="approve_by" value="" required="true">
	          </div>
	        </div>
	        <label>Checked By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="check_by" name="check_by" value="" required="true">
	          </div>
	        </div>

	        <label>Input/Update Date</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="inputUpdateDate" name="inputUpdateDate" value="<?php echo date('d-m-Y'); ?>" readonly="readonly" >
	          </div>
	        </div>
	        <label>Input/Update By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="last_update_name" name="last_update_name" value="<?php echo $this->session->userdata('name'); ?>" readonly="readonly" >
	          </div>
	        </div>
	        <div class="form-group">
	          	<div class="col-sm-8">
	          	</div>
	          	<div class="col-sm-3">
	        		<button type="submit" class="btn btn-success"><b><li class="glyphicon glyphicon-floppy-disk"> </li> Save Data</b></button>
	        	</div>
	        </div>
	    </div>
    </form>	
</div>         	    			      		        
<script>
	$(document).ready(function() {
		$('#spin_edit').hide();
		$('#btn_submit').show();
	});
	$("form#add_personal_ni").submit(function(event){
		$('#spin_edit').show();
		$('#btn_submit').hide();
		$('#cancel-row_edit').hide();
		
	  //disable the default form submission
	  event.preventDefault();
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({ 
		url: "<?php  echo site_url() ;?>/Orp_v3/InsertDataSetup", 
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (result) {
			if(result.pesan=="Insert data has been succeed"){ 
				  	$('#tambah_info').html(' <div class="alert alert-success alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>'+result.pesan+'</b></div>').show();
				  	document.getElementById("add_personal_ni").reset();
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
			show_data_input();
		} //success
	  });//ajax
	 // loadDataForAdd();
	  return false;
	});// form submit END

	function cancelrow() {

	}
	$(document).ready(function() {
  		$(".select2").select2();
  	});   
</script>