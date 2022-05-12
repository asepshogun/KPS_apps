<!-- <form action="<?php // echo site_url()."/new_item_BO/update";?>" method="POST" class="form-horizontal"> -->

<span id="tambah_info"></span> 
<div class="box-body">
	<?php
	// print_r($dataCustomer);
?>
    <form id="add_personal_ni" class="form-horizontal"> 
     	<div class="col-sm-6">
     		<label>Do Retur Date</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="date"  id="KPS_DO_RETUR_DATE" name="KPS_DO_RETUR_DATE" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
	          </div>
	        </div>

	        <label>Do Retur No</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="KPS_DO_RETUR_NO" name="KPS_DO_RETUR_NO" value="" required="true">
	          </div>
	        </div>

	        <label>Retur Product No</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="OUTGOING_RETUR_PRODUCT_ID_DO" id="OUTGOING_RETUR_PRODUCT_ID_DO" >
	          		<option value=" ">-- Select Retur Product</option>
	          		<?php
	          			foreach ($dataOrp as $key => $value) { ?>
	          				<option value="<?php echo $value->OUTGOING_RETUR_PRODUCT_ID; ?>"><?php echo $value->OUTGOING_RETUR_PRODUCT_NO; ?></option>	
	          		<?php
	          			}
	          		?>
	          	</select>
	          </div>
	        </div>

	        <label>Do Retur Rev No</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="DO_retur_rev_no" name="DO_retur_rev_no" value="" required="true">
	          </div>
	        </div>

	        <label>Address</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="KPS_CUSTOMER_PLANT_ID_DO" name="KPS_CUSTOMER_PLANT_ID_DO" value="" required="true">
	          </div>
	        </div>
	    </div>
	    <div class="col-sm-6">
	    	<label>Made By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="KPS_DO_RETUR_MADE_BY" name="KPS_DO_RETUR_MADE_BY" value="" required="true">
	          </div>
	        </div>
	        <label>Approve By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="KPS_DO_RETUR_APPROVE_BY" name="KPS_DO_RETUR_APPROVE_BY" value="" required="true">
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
		url: "<?php  echo site_url() ;?>/Dor_v3/InsertDataSetup", 
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