<!-- <form action="<?php // echo site_url()."/new_item_BO/update";?>" method="POST" class="form-horizontal"> -->
<span id="tambah_info"></span> 
<div class="box-body">
    <form id="add_personal_ni_up" class="form-horizontal"> 
    	<input type="hidden" name="KPS_DELIVERY_ORDER_RETUR_ID" id="KPS_DELIVERY_ORDER_RETUR_ID" value="<?php echo $datas->KPS_DELIVERY_ORDER_RETUR_ID; ?>">
         	<div class="col-sm-6">
     		<label>Do Retur Date</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="date" id="KPS_DO_RETUR_DATE" name="KPS_DO_RETUR_DATE" class="form-control" value="<?php 
	        		echo date('Y-m-d',strtotime($datas->KPS_DO_RETUR_DATE)); ?>" readonly="readonly">
	          </div>
	        </div>

	        <label>Do Retur No</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="KPS_DO_RETUR_NO" name="KPS_DO_RETUR_NO" value="<?php echo $datas->KPS_DO_RETUR_NO; ?>" required="true">
	          </div>
	        </div>


	        <label>Retur Product No</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="OUTGOING_RETUR_PRODUCT_ID_DO" id="OUTGOING_RETUR_PRODUCT_ID_DO" >
	          		<option disabled="disabled">-- Select Retur Product --</option>
	          		<?php foreach ($dataOrp as $key => $value) { ?>
          				<option value="<?php echo $value->OUTGOING_RETUR_PRODUCT_ID; ?>"<?php
          					if($datas->OUTGOING_RETUR_PRODUCT_ID_DO == $value->OUTGOING_RETUR_PRODUCT_ID){
									echo "selected=''";
								}?>
							><?php 
          				 echo $value->OUTGOING_RETUR_PRODUCT_NO; ?></option>	
	          		<?php } ?>
	          	</select>
	          </div>
	        </div>

	        <label>Do Retur Rev No</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="DO_retur_rev_no" name="DO_retur_rev_no" value="<?php echo $datas->DO_retur_rev_no; ?>" required="true">
	          </div>
	        </div>

	        <label>Address</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="KPS_CUSTOMER_PLANT_ID_DO" name="KPS_CUSTOMER_PLANT_ID_DO" value="<?php echo $datas->KPS_CUSTOMER_PLANT_ID_DO; ?>" required="true">
	          </div>
	        </div>
	    </div>
	    <div class="col-sm-6">
	        <label>Made By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="KPS_DO_RETUR_MADE_BY" name="KPS_DO_RETUR_MADE_BY" value="<?php echo $datas->KPS_DO_RETUR_MADE_BY; ?>" required="true">
	          </div>
	        </div>
	        <label>Approve By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="KPS_DO_RETUR_APPROVE_BY" name="KPS_DO_RETUR_APPROVE_BY" value="<?php echo $datas->KPS_DO_RETUR_APPROVE_BY; ?>" required="true">
	          </div>
	        </div>

	        <label>Input/Update Date</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="date_update" name="date_update" value="<?php echo date('d-m-Y'); ?>" readonly="readonly" >
	          </div>
	        </div>
	        <div class="form-group">
	          	<div class="col-sm-6">
	          		<a class="btn bg-red" onClick="delete_data(<?php echo $datas->KPS_DELIVERY_ORDER_RETUR_ID; ?>);" href="#"><b><i class="fa fa-trash"></i> &nbsp;Delete</b></a>
	          	</div>
	          	<div class="col-sm-6">
	        		<button type="submit" class="btn btn-success"><b><li class="glyphicon glyphicon-floppy-disk"> </li> Update Data</b></button>
	        		
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
	function delete_data(id) {
		$('#spin_edit').show();
		$('#btn_submit').hide();
		$('#cancel-row_edit').hide();
		$.ajax({ 
			url 	:"<?php  echo site_url() ;?>/Dor_v3/DeleteDataSetup", 
			data 	:{'id':id},
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
		url: "<?php  echo site_url() ;?>/Dor_v3/UpdateDataSetup", 
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
</script>