<!-- <section class="content-header">
	<h3>Setup Cluster Data V 1.0 &nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; <i class="fa fa-truck" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-map-o" aria-hidden="true"></i></h3>
</section> -->
<script type="text/javascript">
    document.getElementById("titleHeader").innerHTML = '<font size="3"><b> | Outgoing Retur Product V 3.0</b></font>';
</script>
<style type="text/css">
	.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
 	 background-color: #ffecb3;
	}
</style>

<!-- Main content Start-->
<section class="content"> 
	<div class="box">
        <form action="<?php echo site_url()."/Master_data_cluster/search";?>" method="POST" class="form-horizontal">
			<div class="form-group">
				<div class="box-body">	
           	 		<div class="col-md-3">
			        	<label>Cluster Code</label>
			        	<input class="form-control" style="width: 100%;" type="text" name="valuea" placeholder="Cluster Code" value="<?php if($valuea=='0'){ echo ""; }else{ echo $valuea; } ?>">
			        </div>
			        <div class="col-md-3">
			        	<label>Cluster Name</label>
			        	<input class="form-control" style="width: 100%;" type="text" name="valueb" placeholder="Cluster Name" value="<?php if($valueb=='0'){ echo ""; }else{ echo $valueb; } ?>">
			        </div>
			        <div class="col-md-3">
			        	<label>Note</label>
			        	<input class="form-control" style="width: 100%;" type="text" name="valuec" placeholder="Note" value="<?php if($valuec=='0'){ echo ""; }else{ echo $valuec; } ?>">
			        </div>
			        <div class="col-md-3">
			        	<label>Last Update</label>
			        	<input class="form-control" style="width: 100%;" type="text" name="valued" value="<?php echo $valued; ?>">
			        </div>
			        <div class="col-md-3">
			        	<label>Updated By</label>
			        	<input class="form-control" style="width: 100%;" type="text" name="valuee" placeholder="Update By" value="<?php if($valuee=='0'){ echo ""; }else{ echo $valuee; } ?>">
			        </div>
			        <div class="col-md-3">
			        	<label>Status Open/Close</label>
			        	<select class="form-control" style="width: 100%;" id="valuef" name="valuef">
						    <option value="2" <?php if($valuef==2){ echo "selected='TRUE'";} ?> >Open & Close</option>			  
						    <option <?php if($valuef==0){ echo "selected='TRUE'";} ?> value="0">Open</option>			  
						    <option <?php if($valuef==1){ echo "selected='TRUE'";} ?> value="1">Close</option>			  
						</select>
			        </div>
			        <div class="col-md-3">
			        	<label>Status Data</label>
			        	<select class="form-control" style="width: 100%;" id="valueg" name="valueg">
						    <option value="2" <?php if($valueg==2){ echo "selected='TRUE'";} ?> >New & Revised</option>			  
						    <option value="0" <?php if($valueg==0){ echo "selected='TRUE'";} ?> >New</option>			  
						    <option value="1" <?php if($valueg==1){ echo "selected='TRUE'";} ?> >Revised</option>			  
						</select>
			        </div>
           	 		<div class="col-md-3">
                        <br/>
                        <button name="btn_search" id="btn_search" type="submit" class="btn btn-info"><i class="fa fa-search"></i> <b>Search</b></button>     
                        <a class="btn bg-red" onClick="setup_data_orp();" href="#"><b><i class="fa fa-pencil"></i> &nbsp;Add New Orp</b></a>
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
                url   : '<?php echo site_url() ?>/Orp_v3/LoadData',
                data  : { 'limit':settings.limit,'offset': (settings.limit*settings.start_page)},
                // 'valuea': settings.valuea, 'valueb': settings.valueb, 'valuec': settings.valuec, 'valued': settings.valued, 'valuee': settings.valuee, 'valuef': settings.valuef, 'valueg': settings.valueg },
                async : true,
                dataType : 'json',
                error: function (request, error) {
	      		  alert("Bad Connection, Cannot Reload the data!!, Please Refersh your browser");
			    },
                success : function(data){
                	for(i=0; i<data.length; i++){
                		console.log(data[i].OUTGOING_RETUR_PRODUCT_ID)
                		offsetN0++;
                		settings.htmldata += '<tr id="rowd_'+offsetN0+'">'+
                                '<td><center>'+offsetN0+'</center></td>'+
                                '<td>'+new Date(data[i].OUTGOING_RETUR_PRODUCT_DATE).format("dd-mm-yyyy")+'</td>'+
                                '<td>'+data[i].OUTGOING_RETUR_PRODUCT_NO+'</td>'+
                                '<td>'+data[i].OUTGOING_RETUR_ASISTEN_DRIVER+'</td>'+
                                '<td><center><a class="btn bg-orange" onClick="update_data('+data[i].OUTGOING_RETUR_PRODUCT_ID+');" href="#"><b><i class="fa fa-gears"></i> &nbsp;Action</b></a></center></td>';
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
						ordering		: false
				        // fixedColumns:   {
				        //     leftColumns:4
				        // }

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
            start_page      : 0, //initial page
            limit		    : 30, //initial page
            htmldata        : '', //initial page
            lastScroll      : 0, //initial page
            valuea			:'<?php echo ($valuea ? : '0'); ?>',
            valueb			:'<?php echo ($valueb ? : '0'); ?>',
            valuec			:'<?php echo ($valuec ? : '0'); ?>',
            valued			:'<?php echo ($valued ? : '0'); ?>',
            valuee			:'<?php echo ($valuee ? : '0'); ?>',
            valuef			:<?php echo $valuef; ?>,
            valueg			:<?php echo $valueg; ?>,
            headerTable     :'<table id="data2" class="table table-bordered table-hover table-striped "'+
            					'cellspacing="0" width="100%">'+
                                '<thead style="background-color : #337ab7; color:white;">'+
                                    '<tr style="white-space: nowrap;">'+
                                        '<th><center>No</center></th>'+
                                        '<th><center>Document Date</center></th>'+
                                        '<th><center>Product No</center></th>'+
                                        '<th><center>Assistant Driver</center></th>'+
                                        '<th><center>Action</center></th>',
					                    
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
	function setup_data_orp(){
		// console.log("ada");
		$.ajax({
		    url   : '<?php echo site_url() ?>/Orp_v3/LoadDataForSetup',
		    success : function(data){
		    	$('#panelAddData').html(data);
		    }
		});
		$('#add-input-data').modal('show');
		// $('#spin_add').hide();
		// $('#spin_add_table').show();
		// get_dataForRetur();
		// show_data_input();
	}
	function update_data(id){
		// console.log(id);
		$.ajax({
		    url   	: '<?php echo site_url() ?>/Orp_v3/LoadDataForUpdate',
		    data 	: {'id':id},
		    method	: "POST",
		    success : function(data){
		    	console.log(data);
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
		    data  :{'limit':5,'offset':0},
		    url   : '<?php  echo site_url() ?>/Orp_v3/get_dataForRetur/',
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
		    url   : 'http://localhost:8091/outgoing_retur/Kps_outgoing_retur_product/filters/',
		    data  :{'limit':5,'offset':0},
		    // data  : { 'page': settings.start_page,'q': settings.q,'x': settings.x,'y': settings.y},
		    dataType : 'json',
		    async	:true,
		    success : function(data){
		    		console.log(data);
		    		for(i=0; i<data.length; i++){
		    	 		htmlChange +='<tr><td><center>'+(i+1)+'</center></td>'+
		                  		'<td>'+new Date(data[i].OUTGOING_RETUR_PRODUCT_DATE).format("dd-mm-yyyy")+'</td>'+
                                '<td>'+data[i].OUTGOING_RETUR_PRODUCT_NO+'</td>'+
                                '<td>'+data[i].OUTGOING_RETUR_ASISTEN_DRIVER+'</td>';	
		    		}
		    		htmlForInfo="No More Data Found";
		    	$("#show_data_add").html(htmlChange);
		    	$("#forInfo").html(htmlForInfo);
		    }
		});
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
<!-- 	    <div class="modal-footer" id="panelFooter">
	    	<table class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
			    <thead>
			      	<tr>
				        <th><center>No</center></th>
				        <th><center>Document Date</center></th>
				        <th><center>Product No</center></th>
				        <th><center>Assistant Driver</center></th>
			   		</tr>
			    </thead>
				<tbody id="show_data_add">
					<tr id="spin_add_table">
						<td ><span class="fa-spin fa fa-spinner"><span></td>
						<td ><span class="fa-spin fa fa-spinner"><span></td>
						<td ><span class="fa-spin fa fa-spinner"><span></td>
					</tr>
				</tbody>
			</table>
			<span id="forInfo"></span>
	    </div>  -->
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
	      <h4 class="modal-title">Update Outgoing Retur Product</h4>
	    </div>
	    <div class="modal-body" id="panelUpdateData">
	    
	    </div>
	  </div>
	</div>
</div>
<!-- Modal ADD UPDATE DATA -->