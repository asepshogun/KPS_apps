<script type="text/javascript">
    document.getElementById("titleHeader").innerHTML = '<font size="3"><b> | Retur Product Request Sheet V 3.0</b></font>';
</script>
<style type="text/css">
	.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
 	 background-color: #ffecb3;
	}
</style>
<style>
	.loader {
	  border: 1px solid #f3f3f3;
	  border-radius: 50%;
	  border-top: 1px solid blue;
	  border-right: 1px solid green;
	  border-bottom: 1px solid red;
	  border-left: 1px solid pink;
	  width: 20px;
	  height: 20px;
	  -webkit-animation: spin 2s linear infinite;
	  animation: spin 2s linear infinite;
	}

	@-webkit-keyframes spin {
	  0% { -webkit-transform: rotate(0deg); }
	  100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}
</style>
<!-- Main content Start-->
<section class="content"> 
	<div class="box">
        <form action="<?php echo site_url()."/Retur_product_v3/search";?>" method="POST" class="form-horizontal">
			<div class="form-group">
				<div class="box-body">	
           	 		<div class="col-md-3">
			        	<label>Customer</label>
			        	<select class="form-control select2" style="width: 100%;" required name="valuea" id="valuea" url="<?php echo site_url()."/Retur_product_v3/loadPoForSetup";?>" >
			          		<option value="0">-- Select Customer</option>
			          		<?php
			          			foreach ($dataCustomer as $key => $value) { ?>
			          				<option <?php if($value->KPS_CUSTOMER_ID==$valuea){ echo "selected=True "; } ?> value="<?php echo $value->KPS_CUSTOMER_ID; ?>"><?php echo $value->COMPANY_NAME; ?></option>	
			          		<?php
			          			}
			          		?>
			          	</select>
			        </div>
			        <div class="col-md-3">
			        	<label>Retur No Customer</label>
			        	<input class="form-control" style="width: 100%;" type="text" name="valueb" placeholder="Retur No Customer" value="<?php if($valueb=='0'){ echo ""; }else{ echo $valueb; } ?>">
			        </div>
			        <div class="col-md-3">
			        	<label>Retur No Internal</label>
			        	<input class="form-control" style="width: 100%;" type="text" name="valuec" placeholder="Retur No Internal" value="<?php if($valuec=='0'){ echo ""; }else{ echo $valuec; } ?>">
			        </div>
			        <div class="col-md-3">
			        	<label>Retur VIA</label>
			        	<select class="form-control select2" style="width: 100%;" required name="valued" id="valued" >
		          			<option value="0">-- Select Canal --</option>
			          		<?php
			          			foreach ($dataCanal as $key => $values) { ?>
			          				<option value="<?php echo $values->RETUR_CANAL_ID; ?>"><?php echo $values->CABAL_VIA; ?></option>	
			          		<?php
			          			}
			          		?>
			          	</select>
			        </div>
			        <div class="col-md-3">
			        	<label>Date Retur From Customer</label>
			        	<input class="form-control" style="width: 100%;" type="date" name="valuee"  value="<?php if($valuee=='0'){ echo ""; }else{ echo $valuee; } ?>">
			        </div>
			        <div class="col-md-3">
			        	<label>Document Date</label>
			        	<input type="date" name="valuef" class="form-control" style="width: 100%;" value="<?php if($valuef=='0'){ echo ""; }else{ echo $valuef; } ?>" >
			        </div>
			        <div class="col-md-3">
			        	<label>DUE Date Customer</label>
			        	<input type="date" name="valueg" class="form-control" style="width: 100%;" value="<?php if($valueg=='0'){ echo ""; }else{ echo $valueg; } ?>" >
			        </div>
           	 		<div class="col-md-3">
                        <br/>
                        <button name="btn_search" id="btn_search" type="submit" class="btn btn-info"><i class="fa fa-search"></i> <b>Search</b></button>     
                        <a class="btn bg-red" onClick="setup_data();" href="#"><b><i class="fa fa-pencil"></i> &nbsp;Add New</b></a>
               	 	</div>  
	           	</div>
			</div>
        </form>
	</div>
	<div class="box">
		<div class="box-body" id="contentTable">
			
		</div>

		<div class="box-body">
      		<div class="col-md-12" id="forLoad"></div>
       		<div class="col-md-12" id="forNOmore"></div>
    	</div>
	</div>
</section>	
<!-- Main content End-->


<script type="text/javascript">
	function addContent(settings) {
        var load_img = $('<img/>').attr('src',settings.loading_gif_url).addClass('loading-image');
        var record_end_txt = $('<div/>').text(settings.end_record_text).addClass('end-record-info');
        offsetN0=settings.start_page*30;
        if(loading == false && end_record == false){
            loading = true;
            $("#forLoad").append(load_img);
            $.ajax({
                method: "POST", 
                type  : 'ajax',
                url   : settings.data_url,
                data  : { 'limit':settings.limit,'offset': (settings.limit*settings.start_page),'valuea':settings.valuea,'valueb':settings.valueb,'valuec':settings.valuec,'valued':settings.valued,'valuee':settings.valuee,'valuef':settings.valuef,'valueg':settings.valueg},
                //'valuea': settings.valuea, 'valueb': settings.valueb, 'valuec': settings.valuec, 'valued': settings.valued, 'valuee': settings.valuee, 'valuef': settings.valuef, 'valueg': settings.valueg },
                async : true,
                dataType : 'json',
                error: function (request, error) {
	      		  alert("Bad Connection, Cannot Reload the data!!, Please Refersh your browser");
			    },
                success : function(data){
                	for(i=0; i<data.length; i++){
                		offsetN0++;
                		if(data[i].PO_OS_NO_FROM_CUSTOMER=="null" || data[i].PO_OS_NO_FROM_CUSTOMER==null){
                			data[i].PO_OS_NO_FROM_CUSTOMER="-";
                		}
                		if(data[i].CANAL_LABEL=='null' || data[i].CANAL_LABEL==null){
                			data[i].CANAL_LABEL='-';
                		}
                		if(data[i].PLANT1_CITY=='null' || data[i].PLANT1_CITY==null){
                			data[i].PLANT1_CITY='-';
                		}
                		if(data[i].RETUR_MASTER_NOTE=='null' || data[i].RETUR_MASTER_NOTE==null){
                			data[i].RETUR_MASTER_NOTE='-';
                		}
                		if(data[i].SUBMITTED_BY=='null' || data[i].SUBMITTED_BY==null){
                			data[i].SUBMITTED_BY='-';
                		}
                		if(data[i].SUBMITTED_DEPT=='null' || data[i].SUBMITTED_DEPT==null){
                			data[i].SUBMITTED_DEPT='-';
                		}
                		settings.htmldata += '<tr id="rowd_'+offsetN0+'" style="white-space: nowrap;" >'+
                                '<td><center>'+offsetN0+'</center></td>'+
                                '<td><center><a class="btn bg-orange" onClick="update_data('+data[i].KPS_RETUR_BARANG_ID+');" href="#"><b><i class="fa fa-gears"></i> &nbsp;Action</b></a></center></td>'+
                                '<td><center><a class="btn bg-blue" onClick="detail('+data[i].KPS_RETUR_BARANG_ID+');" href="#"><b><span class="glyphicon glyphicon-log-in"></span>&nbsp;Detail</b></a></center></td>'+
                                '<td><center>'+new Date(data[i].DATE_RTR).format("dd-mm-yyyy")+'</center></td>'+
                                '<td>'+data[i].COMPANY_NAME+'</td>'+
                                '<td>'+data[i].NO_RETUR_FROM_CUSTOMER+'</td>'+
                                '<td>'+new Date(data[i].DATE_RETUR_CUSTOMER).format("dd-mm-yyyy")+'</td>'+
                                '<td>'+data[i].NO_RETUR+'</td>'+
                                '<td>'+data[i].PO_OS_NO_FROM_CUSTOMER+'</td>'+
                                '<td>'+data[i].CANAL_LABEL+'</td>'+
                                '<td>'+new Date(data[i].DUE_DATE_PPIC).format("dd-mm-yyyy")+'</td>'+
                                '<td>'+new Date(data[i].DUE_DATE_CUSTOMER).format("dd-mm-yyyy")+'</td>'+
                                '<td>'+data[i].PLANT1_CITY+'</td>'+
                                '<td>'+data[i].RETUR_MASTER_NOTE+'</td>'+
                                '<td>'+data[i].TYPE_OF_COMPLAINT+'</td>'+
                                '<td>'+data[i].SUBMITTED_BY+'</td>'+
                                '<td>'+data[i].SUBMITTED_DEPT+'</td>'+
                                '<td>'+data[i].MADEBYRB+'</td>'+
                                '<td>'+data[i].CHCEKED_QC+'</td>'+
                                '<td>'+data[i].APPROVED+'</td>';
                	}
                	htmlDataFooter="";
                    htmlview=settings.headerTable+settings.headerSecond+settings.endBodyTable+settings.htmldata+htmlDataFooter+settings.footerTable;
                    $('#contentTable').html(htmlview);
                    if(data.length < settings.limit){
                    	$("#forNOmore").html(record_end_txt);
                        load_img.remove();
                        end_record = true;
                    }else{
                    	load_img.remove();
                        loading = false;
                        settings.start_page++; //page increment
                    }
                    var table = $('#data2').DataTable( {
				        fixedHeader: {
				            header: true
				        },
				        scrollY			:$(window).height()-400,
				        scrollX			:true,
				        scrollCollapse	:true,
				        paging			:false,
						searching		:false,
						info 			:false,
						ordering		: false,
				        fixedColumns:   {
				            leftColumns:4
				        }

				    });
				    $('.dataTables_scrollBody').scrollTop(settings.lastScroll+25);
			        $('div.dataTables_scrollBody').scroll( function(el){
					    if($(this).scrollTop() + $(this).height() >= ($(this)[0] .scrollHeight+ $('.odd').height()/2)-40) {
					      settings.lastScroll=$(this).scrollTop();
					      addContent(settings);
					  	}
					});
                }
            });
        }
    }
	function masterContent() {
		var settings = $.extend({ 
            loading_gif_url : "<?php echo base_url();?>/bootstrap/image/ajax-loader.gif", //url to loading gif
            end_record_text : 'No more records found!', //no more records to load
            data_url        : '<?php echo site_url() ;?>/Retur_product_v3/LoadData', //url to loading gif
            start_page      : 0, //initial page
            limit		    : 30, //initial page
            htmldata        : '', //initial page
            lastScroll      : 0, //initial page
            valuea			:'<?php echo ($valuea ? : '0'); ?>',
            valueb			:'<?php echo ($valueb ? : '0'); ?>',
            valuec			:'<?php echo ($valuec ? : '0'); ?>',
            valued			:'<?php echo ($valued ? : '0'); ?>',
            valuee			:'<?php echo ($valuee ? : '0'); ?>',
            valuef			:'<?php echo ($valuef ? : '0'); ?>',
            valueg			:'<?php echo ($valueg ? : '0'); ?>',
            headerTable     :'<table id="data2" class="table table-bordered table-hover table-striped "'+
            					'cellspacing="0" width="100%">'+
                                '<thead style="background-color : #337ab7; color:white;">'+
                                    '<tr style="white-space: nowrap;">'+
                                        '<th><center>No</center></th>'+
                                        '<th><center>Action</center></th>'+
                                        '<th><center>Detail</center></th>'+
                                        '<th><center>Document Date</center></th>'+
                                        '<th><center>Customer</center></th>'+
                                        '<th><center>No Retur From Customer</center></th>'+
                                        '<th><center>Date Retur From Customer</center></th>'+
                                        '<th><center>No Retur Internal</center></th>'+
                                        '<th><center>PO Number From Customer</center></th>'+
                                        '<th><center>Retur VIA</center></th>'+
                                        '<th><center>DUE Date Internal</center></th>'+
                                        '<th><center>DUE Date Customer</center></th>'+
                                        '<th><center>Delivery To Plant</center></th>'+
                                        '<th><center>Note</center></th>'+
                                        '<th><center>Type Of Complaint</center></th>'+
                                        '<th><center>Submitted By</center></th>'+
                                        '<th><center>Submitted Dept</center></th>'+
                                        '<th><center>Made By</center></th>'+
                                        '<th><center>Checked QC By</center></th>'+
                                        '<th><center>Approved By</center></th>',
                                        // '<th><center>Action</center></th>',
					                    
            headerSecond    : '',
            endBodyTable    :'</tr></thead>'+
                            '<tbody id="tbody_load_data">',
            footerTable     :'</tbody></table>' // initial 
        });
        loading  = false; 
	    end_record = false;
	    addContent(settings);
	}
	$(document).ready(function() {
	   masterContent();
	});
	function setup_data(){
		$.ajax({
		    url   : '<?php echo site_url() ?>/Retur_product_v3/LoadDataForSetup',
		    success : function(data){
		    	$('#panelAddData').html(data);
		    }
		});
		$('#add-input-data').modal('show');
		$('#spin_add').hide();
		$('#spin_add_table').show();
		// get_dataForRetur();
		show_data_input();
	}
	function update_data(KPS_RETUR_BARANG_ID){
		var load_img = $('<img/>').attr('src',"<?php echo base_url();?>/bootstrap/image/ajax-loader.gif").addClass('loading-image');
		$("#panelUpdateData").html(load_img);
		$.ajax({
		    url   	: '<?php echo site_url() ?>/Retur_product_v3/LoadDataForUpdate',
		    data 	:{'id':KPS_RETUR_BARANG_ID},
		    method	: "POST",
		    success : function(data){
		    	$('#panelUpdateData').html(data);
		    }
		});
		$('#add-update-data').modal('show');
		$('#spin_update').hide();
		$('#spin_update_table').show();
		// show_data_input();
	}
	function get_dataForRetur() {
		$.ajax({
			method: "POST",	
		    type  : 'ajax',
		    data  :{'limit':5,'offset':0,'valuea':0,'valueb':0,'valuec':0,'valued':0,'valuee':0,'valuef':0,'valueg':0},
		    url   : '<?php  echo site_url() ?>/Retur_product_v3/get_dataForRetur/',
		    dataType : 'json',
		    async	:true,
		    success : function(data){
		    	console.log(data);
		    	// 	for(i=0; i<data.length; i++){
		    	//  		htmlChange +='<tr><td><center>'+(i+1)+'</center></td>'+
		     //              			'<td>'+data[i].COMPANY_NAME+'</td>'+
		     //              			'<td><center>'+data[i].DATE_RETUR_CUSTOMER+'</center></td>'+	
		     //              			'<td><center>'+data[i].RETUR_CANAL+'</center></td></tr>';	
		    	// 	}
		    	// 	htmlForInfo="No More Data Found";
		    	// $("#show_data_add").html(htmlChange);
		    	// $("#forInfo").html(htmlForInfo);
		    }
		});
	}
	function show_data_input() {
		htmlChange='';
		$.ajax({
			method: "POST",	
		    type  : 'ajax',
		    data  :{'limit':5,'offset':0,valuea:0,valueb:0,valuec:0,valued:0,valuee:0,valuef:0,valueg:0},
		    url   : '<?php  echo site_url() ?>/Retur_product_v3/LoadDataInput/',
		    // data  : { 'page': settings.start_page,'q': settings.q,'x': settings.x,'y': settings.y},
		    dataType : 'json',
		    async	:true,
		    success : function(data){
		    		for(i=0; i<data.length; i++){
		    			if(data[i].CANAL_LABEL=='null' || data[i].CANAL_LABEL==null){
                			data[i].CANAL_LABEL='-';
                		}
                		if(data[i].PO_OS_NO_FROM_CUSTOMER=="null" || data[i].PO_OS_NO_FROM_CUSTOMER==null){
                			data[i].PO_OS_NO_FROM_CUSTOMER="-";
                		}
		    	 		htmlChange +='<tr><td><center>'+(i+1)+'</center></td>'+
		                  			'<td align="left" >'+data[i].COMPANY_NAME+'</td>'+
		                  			'<td align="left" >'+data[i].NO_RETUR_FROM_CUSTOMER+'</td>'+	
		                  			'<td><center>'+new Date(data[i].DATE_RETUR_CUSTOMER).format("dd-mm-yyyy")+'</center></td>'+	
		                  			'<td><center>'+data[i].PO_OS_NO_FROM_CUSTOMER+'</center></td>'+
		                  			'<td><center>'+data[i].CANAL_LABEL+'</center></td></tr>';
		    		}
		    		htmlForInfo="No More Data Found";
		    	$("#show_data_add").html(htmlChange);
		    	$("#forInfo").html(htmlForInfo);
		    }
		});
	}
	function detail(KPS_RETUR_BARANG_ID) {
  		location.replace("<?php echo site_url().'/Retur_product_v3/index_detail/';?>"+KPS_RETUR_BARANG_ID)
	}
</script>
<!-- Modal ADD INPUT DATA-->
<div class="modal fade" id="add-input-data" data-backdrop="static" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	  	<div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Add New Retur Sheet</h4>
	    </div>
	    <div class="modal-body" id="panelAddData">
	     

	    </div>
	    <div class="modal-footer" id="panelFooter">
	    	<table class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
			    <thead>
			      	<tr>
				        <th><center>No</center></th>
				        <th><center>Customer Name</center></th>
				        <th><center>Retur Customer No</center></th>
				        <th><center>Retur Customer Date</center></th>
				        <th><center>PO Number</center></th>
				        <th><center>VIA</center></th>
			   		</tr>
			    </thead>
				<tbody id="show_data_add">
					<tr id="spin_add_table">
						<td ><span class="fa-spin fa fa-spinner"><span></td>
						<td ><span class="fa-spin fa fa-spinner"><span></td>
						<td ><span class="fa-spin fa fa-spinner"><span></td>
						<td ><span class="fa-spin fa fa-spinner"><span></td>
					</tr>
				</tbody>
			</table>
			<span id="forInfo"></span>
	    </div> 
	  </div>
	</div>
</div>
<!-- Modal ADD INPUT DATA -->
<!-- Modal ADD UPDATE DATA-->
<div class="modal fade" id="add-update-data" data-backdrop="static" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	  	<div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Update Retur Data</h4>
	    </div>
	    <div class="modal-body" id="panelUpdateData">
	     

	    </div>
	  </div>
	</div>
</div>
<!-- Modal ADD UPDATE DATA -->