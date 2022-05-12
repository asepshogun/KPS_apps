<!-- <form action="<?php // echo site_url()."/new_item_BO/update";?>" method="POST" class="form-horizontal"> -->

<span id="tambah_info"></span> 
<div class="box-body">
    <form id="add_personal_ni" class="form-horizontal"> 
    	<input type="hidden" name="KPS_RETUR_BARANG_ID_DET" id="KPS_RETUR_BARANG_ID_DET" value="<?php echo $data_filter['KPS_RETUR_BARANG_ID']; ?>">
     	<div class="col-sm-4">
     		<label>Document Date</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled>
	          </div>
	        </div>
	        <label>Item</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<select class="form-control select2" style="width: 100%;" required name="KPS_LOI_ID_RETUR" id="KPS_LOI_ID_RETUR" >
	          		<option value=" ">-- Select Code Item--</option>
	          		<?php
	          			foreach ($data_loi as $key => $value) { ?>
	          				<option value="<?php echo $value->KPS_LOI_ID; ?>" ><?php echo $value->LOI_CODE_ITEM ."|". $value->LOI_PART_NAME ."|". $value->LOI_PART_NO ."|". $value->LOI_MODEL; ?></option>	
	          		<?php } ?>
	          	</select>
	          </div>
	        </div>
	        <label>Code Item</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	          	<input type="text" class="form-control" name="CODE_ITEM" id="CODE_ITEM" readonly="True" >
	          </div>
	        </div>
	        <label>Part No</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	          	<input type="text" class="form-control" name="PART_NO" id="PART_NO" readonly="True" >
	          </div>
	        </div>
	    </div>
	    <div class="col-sm-4">
	    	<label>Part Name</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	          	<input type="text" class="form-control" name="PART_NAME" id="PART_NAME" readonly="True" >
	          </div>
	        </div>
	    	<label>Model</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	          	<input type="text" class="form-control" name="MODEL" id="MODEL" readonly="True" >
	          </div>
	        </div>
	    	<label>Qty</label>
     		<div class="form-group">
	          <div class="col-sm-12">
	          	<input type="number" class="form-control" step="0.01" name="QTY_RTR" id="QTY_RTR" >
	          </div>
	        </div>
	        <label>Unit</label>
	    	<div class="form-group">
	          <div class="col-sm-12">
	          	<input type="text" class="form-control" name="Retur_unit" id="Retur_unit"  value="" readonly="True" >
	          </div>
	        </div>
	    </div>
	    <div class="col-sm-4">
	        <label>Reason</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control"  name="REASON" id="REASON" value="" required="true">
	          </div>
	        </div>
	        <label>Product Status</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	            <input type="text" class="form-control" id="PRODUCT_STATUS" name="PRODUCT_STATUS" value="" required="true">
	          </div>
	        </div>
	        <label>Made By</label>
	        <div class="form-group">
	          <div class="col-sm-12">
	         	<input type="text" class="form-control" id="KPS_MADE_BY_RETUR_DETAILs" name="KPS_MADE_BY_RETUR_DETAILs" value="<?php echo $this->session->userdata('name'); ?>" disabled="True" >
	          </div>
	        </div>
	    	<div class="form-group">
	          	<div class="col-sm-12">
	        		<button type="submit" class="btn btn-success pull-right"><b><li class="glyphicon glyphicon-floppy-disk"> </li> Save Data</b></button>
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
		url: "<?php  echo site_url() ;?>/Retur_product_v3/InsertDataSetupDetail", 
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
  	$( document ).on( "change", "#KPS_LOI_ID_RETUR", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : "<?php echo site_url()."/Retur_product_v3/loadMasterSetupDetail"; ?>" ,
			type : 'POST',
			data : { KPS_LOI_ID:$value },
			dataType : 'json',
			success : function(data){
				// console.log(data.loi_data[0].LOI_CODE_ITEM);
				// htmlOption="<option value='0'>-- Select PO Number --</option>";
				// for(i=0; i<data.buktiPesanan.length; i++){
				// 	htmlOption+="<option value='"+data.buktiPesanan[i].KPS_BUKTI_PESANAN_ID+"' >"+data.buktiPesanan[i].PO_OS_NO_FROM_CUSTOMER+"</option>"
				// }
				// htmlOptionPlant="<option value='0'>-- Select Delivery Plant --</option>";
				// for(i=0; i<data.deliverySetup.length; i++){
				// 	htmlOptionPlant+="<option value='"+data.deliverySetup[i].KPS_CUSTOMER_DELIVERY_SETUP+"' >"+data.deliverySetup[i].PLANT1_CITY+"</option>"
				// }
				document.getElementById("CODE_ITEM").value = data.loi_data[0].LOI_CODE_ITEM;
				document.getElementById("PART_NO").value = data.loi_data[0].LOI_PART_NO;
				document.getElementById("PART_NAME").value = data.loi_data[0].LOI_PART_NAME;
				document.getElementById("MODEL").value = data.loi_data[0].LOI_MODEL;
				document.getElementById("Retur_unit").value = data.loi_data[0].KPS_RFQ_PART_UNIT;
			}
			
		});


	});
</script>