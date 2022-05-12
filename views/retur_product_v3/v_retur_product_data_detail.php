<script type="text/javascript">
    document.getElementById("titleHeader").innerHTML = '<font size="3"><b> | Retur Product Request Sheet Detail V 3.0</b></font>';
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
			        	<input type="text" class="form-control" style="width: 100%;" value="<?php echo $datas[0]->COMPANY_NAME; ?>" disabled >
			        </div>
			        <div class="col-md-3">
			        	<label>Retur No Customer</label>
			        	<input class="form-control" style="width: 100%;" type="text" value="<?php echo $datas[0]->NO_RETUR_FROM_CUSTOMER; ?>" disabled>
			        </div>
			        <div class="col-md-3">
			        	<label>Retur No Internal</label>
			        	<input class="form-control" style="width: 100%;" type="text" value="<?php echo $datas[0]->NO_RETUR ?>" disabled>
			        </div>
			        <div class="col-md-3">
			        	<label>Retur VIA</label>
			        	<input type="text" class="form-control" style="width: 100%;" value="<?php echo $datas[0]->CANAL_LABEL?>" disabled >
			        </div>
			        <div class="col-md-3">
			        	<label>Date Retur From Customer</label>
			        	<input class="form-control" style="width: 100%;" type="date"  value="<?php echo $datas[0]->DATE_RETUR_CUSTOMER; ?>" disabled> 
			        </div>
			        <div class="col-md-3">
			        	<label>Document Date</label>
			        	<input class="form-control" style="width: 100%;" type="date"  value="<?php echo date('Y-m-d',strtotime($datas[0]->DATE_RTR)); ?>" disabled> 
			        </div>
			        <div class="col-md-2">
			        	<?php 
			        		$over_due="";
			        		if($datas[0]->DUE_DATE_CUSTOMER<date('Y-m-d')){
			        			$over_due="Over Due";
			        		} 
			        	?>
			        	<label>DUE Date Customer | <font color="red"><?php echo $over_due; ?></font></label>
			        	<input class="form-control" style="width: 100%;" type="date"  value="<?php echo $datas[0]->DUE_DATE_CUSTOMER; ?>" disabled>
			        </div>
           	 		<div class="col-md-4">
                        <br/>
                        <a class="btn bg-blue" href="<?php echo site_url()."/Retur_product_v3/index";?>"><b><i class="fa fa-reply" aria-hidden="true"></i> &nbsp;Back</b></a>
                        <a class="btn bg-red" onClick="setup_data();" href="#"><b><i class="fa fa-pencil"></i> &nbsp;Add New</b></a>
                        <a class="btn bg-orange" href="<?php echo site_url()."/Retur_product_v3/index";?>" ><b><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Delivery</b></a>
                        <a class="btn bg-green" href="<?php echo site_url()."/Retur_product_v3/index";?>" ><b><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Receive</b></a>
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
                data  : { 'KPS_RETUR_BARANG_ID':settings.KPS_RETUR_BARANG_ID},
                async : true,
                dataType : 'json',
                error: function (request, error) {
	      		  alert("Bad Connection, Cannot Reload the data!!, Please Refersh your browser");
			    },
                success : function(data){
                	for(i=0; i<data.length; i++){
                		offsetN0++;
                		basePercen=100;
                		if(data[i].QTY_RTR!=null && data[i].QTY_RTR!='NULL'){
                			basePercen=100/data[i].QTY_RTR;
                		}
                		deliveryPercen=basePercen*data[i].QTY_Delivery;
                		receivePercen=basePercen*data[i].QTY_Receive;
                		if(data[i].Retur_unit=="null" || data[i].Retur_unit==null){
                			data[i].Retur_unit="-";
                		}
                		if(data[i].KPS_MADE_BY_RETUR_DETAIL=='null' || data[i].KPS_MADE_BY_RETUR_DETAIL==null){
                			data[i].KPS_MADE_BY_RETUR_DETAIL='-';
                		}
                		if(data[i].PRODUCT_STATUS=='null' || data[i].PRODUCT_STATUS==null){
                			data[i].PRODUCT_STATUS='-';
                		}
                		settings.htmldata += '<tr id="rowd_'+offsetN0+'" style="white-space: nowrap;" >'+
                                '<td><center>'+offsetN0+'</center></td>'+
                                '<td><center><a class="btn bg-orange" onClick="update_data('+data[i].KPS_RETUR_BARANG_DETAIL_ID+');" href="#"><b><i class="fa fa-gears"></i> &nbsp;Action</b></a></center></td>'+
                                '<td><center><a class="btn bg-blue" onClick="detail('+data[i].KPS_RETUR_BARANG_DETAIL_ID+');" href="#"><b><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp;Monitor</b></a></center></td>'+
                                '<td align="right" >'+
                                	'<p><b> '+new Intl.NumberFormat('de-DE').format(data[i].QTY_Delivery)+' '+data[i].Retur_unit +' | '+new Intl.NumberFormat('de-DE').format(deliveryPercen)+' %</b></p>'+
                                	'<div class="progress progress-sm active">'+
										'<div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="'+deliveryPercen+'" aria-valuemin="0" aria-valuemax="100" style="width: '+deliveryPercen+'%">'+
										'</div>'+
									'</div>'+
								'</td>'+
								'<td align="right" >'+
                                	'<p><b>'+new Intl.NumberFormat('de-DE').format(data[i].QTY_Receive)+' '+data[i].Retur_unit +' | '+new Intl.NumberFormat('de-DE').format(receivePercen)+' %</b></p>'+
                                	'<div class="progress progress-sm active">'+
										'<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="'+receivePercen+'" aria-valuemin="0" aria-valuemax="100" style="width: '+receivePercen+'%">'+
										'</div>'+
									'</div>'+
								'</td>'+
                                '<td>'+data[i].CODE_ITEM+'</td>'+
                                '<td>'+data[i].PART_NO+'</td>'+
                                '<td>'+data[i].PART_NAME+'</td>'+
                                '<td>'+data[i].MODEL+'</td>'+
                                '<td>'+new Intl.NumberFormat('de-DE').format(data[i].QTY_RTR)+'</td>'+
                                '<td>'+data[i].Retur_unit+'</td>'+
                                '<td>'+data[i].REASON+'</td>'+
                                '<td>'+data[i].KPS_MADE_BY_RETUR_DETAIL+'</td>'+
                                '<td>'+data[i].PRODUCT_STATUS+'</td>';
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
            data_url        : '<?php echo site_url() ;?>/Retur_product_v3/LoadDataDetail', //url to loading gif
            start_page      : 0, //initial page
            limit		    : 30, //initial page
            htmldata        : '', //initial page
            lastScroll      : 0, //initial page
            KPS_RETUR_BARANG_ID	:'<?php echo ($datas[0]->KPS_RETUR_BARANG_ID ? : '0'); ?>',
            headerTable     :'<table id="data2" class="table table-bordered table-hover table-striped "'+
            					'cellspacing="0" width="100%">'+
                                '<thead style="background-color : #337ab7; color:white;">'+
                                    '<tr style="white-space: nowrap;">'+
                                        '<th><center>No</center></th>'+
                                        '<th><center>Action</center></th>'+
                                        '<th><center>Monitoring</center></th>'+
                                        '<th><center>Delivery Progress</center></th>'+
                                        '<th><center>Receive Progress</center></th>'+
                                        '<th><center>Code Item</center></th>'+
                                        '<th><center>Part No</center></th>'+
                                        '<th><center>Part Name</center></th>'+
                                        '<th><center>Model</center></th>'+
                                        '<th><center>QTY</center></th>'+
                                        '<th><center>Unit</center></th>'+
                                        '<th><center>Reason</center></th>'+
                                        '<th><center>Made By</center></th>'+
                                        '<th><center>PRODUCT_STATUS</center></th>',
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
		    url   : '<?php echo site_url() ?>/Retur_product_v3/LoadDataForSetupDetail',
		    data 	:{'KPS_RETUR_BARANG_ID':<?php echo $datas[0]->KPS_RETUR_BARANG_ID; ?>,'KPS_CUSTOMER_ID':<?php echo $datas[0]->KPS_CUSTOMER_ID_RETUR; ?>},
		    method	: "POST",
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
		    data  :{'limit':5,'offset':0,'KPS_RETUR_BARANG_ID':<?php echo $datas[0]->KPS_RETUR_BARANG_ID ?> },
		    url   : '<?php  echo site_url() ?>/Retur_product_v3/LoadDataInputDetail/',
		    dataType : 'json',
		    async	:true,
		    success : function(data){
		    		for(i=0; i<data.length; i++){
		    			if(data[i].Retur_unit=="null" || data[i].Retur_unit==null){
                			data[i].Retur_unit="-";
                		}
                		if(data[i].KPS_MADE_BY_RETUR_DETAIL=='null' || data[i].KPS_MADE_BY_RETUR_DETAIL==null){
                			data[i].KPS_MADE_BY_RETUR_DETAIL='-';
                		}
                		if(data[i].PRODUCT_STATUS=='null' || data[i].PRODUCT_STATUS==null){
                			data[i].PRODUCT_STATUS='-';
                		}
		    	 		htmlChange +='<tr><td><center>'+(i+1)+'</center></td>'+
		                  			'<td align="left" >'+data[i].CODE_ITEM+'</td>'+
		                  			'<td align="left" >'+data[i].PART_NO+'</td>'+	
		                  			'<td align="left" >'+data[i].PART_NAME+'</td>'+	
		                  			'<td align="left" >'+data[i].MODEL+'</td>'+
		                  			'<td>'+new Intl.NumberFormat('de-DE').format(data[i].QTY_RTR)+'</td>'+
	                                '<td>'+data[i].Retur_unit+'</td>'+
	                                '<td>'+data[i].REASON+'</td>'
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
	      <h4 class="modal-title">Add New Retur Sheet Detail</h4>
	    </div>
	    <div class="modal-body" id="panelAddData">
	     

	    </div>
	    <div class="modal-footer" id="panelFooter">
	    	<table class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
			    <thead>
			      	<tr>
				        <th><center>No</center></th>
				        <th><center>Code Item</center></th>
				        <th><center>Part No</center></th>
				        <th><center>Part Name</center></th>
				        <th><center>Model</center></th>
				        <th><center>QTY</center></th>
				        <th><center>Unit</center></th>
				        <th><center>Reason</center></th>
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