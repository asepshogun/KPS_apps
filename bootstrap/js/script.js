$(document).on( "change", "#CustRfq", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('loadRfq');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#rfqMon').html(data);
			}
			
		});


	});
$('#noOutPending').click(function(){
		$('#deliveryschedulePending').attr('disabled','true');
		$('#deliveryschedule').removeAttr('disabled');
		//var $this = $(this);
		//var $value = $this.val();
		$url = $(this).attr('urlCustOutPending');
		$.ajax({
			url : $url,
		//	data : { id:$value },
			success : function(data){
				$('#CustomerForBpOut').html(data);
			}
			
		});
	});
$('#employees').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
$('#outPending').click(function(){
		$('#deliveryschedule').attr('disabled','true');
		$('#deliveryschedulePending').removeAttr('disabled');
		$url = $(this).attr('urlCustOutPending');
		$.ajax({
			url : $url,
		//	data : { id:$value },
			success : function(data){
				$('#CustomerForBpOut').html(data);
			}
			
		});
});
//JS Untuk POP Up ADD NEW Order sheet

$( document ).on( "change", "#divisiOs", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urldivisiOs');
		$urlDelSet = $(this).attr('urlDpOs');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#divisiOsGet').html(data);
			}
			
		});
		$.ajax({
			url : $urlDelSet,
			data : { id:$value },
			success : function(data){
				$('#cusDelSetUpOs').html(data);
			}
			
		});
	});

$( document ).on( "change", "#cusInvoCur", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$urldivisi = $(this).attr('urldivisi');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#currencyCustomer').html(data);
			}
			
		});
		$.ajax({
			url : $urldivisi,
			data : { id:$value },
			success : function(data){
				$('#divisiCustomer').html(data);
			}
			
		});
	});
//for Out Going
	$( document ).on( "change", "#CustomerForBpOut", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlBPOut');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#buktipesan').html(data);
			}
			
		});
	});
	
//For out going end	
//Pop Up Add Out going By OS
	$( document ).on( "change", "#CustomerForOsOut", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlOsOut');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#osForOutGoing').html(data);
			}
			
		});
	});
	$( document ).on( "change", "#osForOutGoing", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlDsOsOut');
		$.ajax({
			url : $url,
			type : 'GET',
			data : { id:$value },
			dataType : 'json',
			success : function(data){
				console.log(data);
				$('#DdForOsOut').val(data.dateDelivery);
			}
			
		});


	});
//Pop Up Add Out going By OS
//for Return Pending Order Sheet
$( document ).on( "change", "#BpIdReturn", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlForBpReturn');
		$.ajax({
			url : $url,
			// type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#BpOsidReturn').val(data);
			}
			
		});
	});
	$( document ).on( "change", "#idDsdForRemainingPending", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$urlGetBp = $(this).attr('urlGetBp');
		$.ajax({
			url : $url,
			// type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#remainingquantityOsRtnPending').val(data);
			}
			
		});
		$.ajax({
			url : $urlGetBp,
			// type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#IdBpForScdPending').val(data);
			}
			
		});
	});
//for Return Pending Order Sheet
$( document ).on( "change", "#divisiOsS", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urldivisiOs');
		$urlDelSet = $(this).attr('urlDpOs');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#divisiOsGetS').html(data);
			}
			
		});
		$.ajax({
			url : $urlDelSet,
			data : { id:$value },
			success : function(data){
				$('#cusDelSetUpOsS').html(data);
			}
			
		});
	});
//JS Untuk POP Up ADD NEW Order sheet

$('document').ready(function(){
	$('.update-link').click(function(){
		$target = $(this).attr('data-target');
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			success : function(data){

				$($target+' .modal-content').html(data);
			}
			
		});
	});


	$('#qrfq_id').change(function(){
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlcurr');
		$urlPic = $(this).attr('urlpic');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#QKPS_RFQ_CURENCY_ID_QUO').html(data);
			}
			
		});
		$.ajax({
			url : $urlPic,
			data : { id:$value },
			success : function(data){
				$('#qpic').html(data);
			}
		});



	});
	$( document ).on( "change", "#eqrfq_id", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlcurr');
		$urlPic = $(this).attr('urlpic');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#EQKPS_RFQ_CURENCY_ID_QUO').html(data);
			}
			
		});
		$.ajax({
			url : $urlPic,
			data : { id:$value },
			success : function(data){
				$('#eqpic').html(data);
			}
		});



	});

	
$( document ).on( "change", "#comschedule", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#bpbp').html(data);
			}
			
		});


	});

	$( document ).on( "change", "#divisiPesanans", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urldivisi');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#EQKPS_CUSTOMER_DIVISI_BKs').html(data);
			}
			
		});


	});
	$( document ).on( "change", "#dept", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urldep');
		$.ajax({
			url : $url,
			data : { id:$value,table:'kps_section_employee',field:'DEPT_EMPLOYEE_ID_SEC' },
			success : function(data){
				$('#sect').html(data);
			}
			
		});


	});
	$( document ).on( "change", "#sect", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlsec');
		$.ajax({
			url : $url,
			data : { id:$value,table:'kps_position_employee',field:'SEC_EMPLOYEE_ID_POS' },
			success : function(data){
				$('#pos').html(data);
			}
			
		});


	});

$( document ).on( "change", "#eddept", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urldivisi');
		$.ajax({
			url : $url,
			data : { id:$value,table:'kps_section_employee',field:'DEPT_EMPLOYEE_ID_SEC' },
			success : function(data){
				$('#edsect').html(data);
			}
			
		});


	});
	$( document ).on( "change", "#edsect", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urldivisi');
		$.ajax({
			url : $url,
			data : { id:$value,table:'kps_position_employee',field:'SEC_EMPLOYEE_ID_POS' },
			success : function(data){
				$('#edpos').html(data);
			}
			
		});


	});
$( document ).on( "change", "#buktipesan", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urldivisi');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#deliveryschedule').html(data);
			}
			
		});


	});
	$( document ).on( "change", "#outgoing", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urldivisi');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#plant').html(data);
			}
			
		});


	});

	$( document ).on( "change", "#productsch", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#remainingquantity').val(data);
			}
			
		});


	});
	$( document ).on( "change", "#productschOs", function() {
		var $this = $(this);
		var $values= $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$values },
			success : function(data){
				$('#remainingquantityOs').val(data);
			}
			
		});


	});
	$( document ).on( "change", "#modelQuo", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			dataType : 'json',
			success : function(data){
				$('#part_no').val(data[0].KPS_RFQ_PART_NO);
				$('#part_name').val(data[0].KPS_RFQ_PART_NAME);
				$('#model').val(data[0].MODEL);
				$('#price').val(data[0].total_breakdown);
				$('#unit').val(data[0].KPS_RFQ_PART_UNIT);
			}
			
		});


	});
	$( document ).on( "change", "#modelBreakDown", function() {
		var $this = $(this);
		var $value = $this.val();
		
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			dataType : 'json',
			success : function(data){
				$('#qty_unit').val(data[0].QTY_UNIT);
				$('#qty_month').val(data[0].QTY_MONTH);
				$('#periode').val(data[0].PERIODE);
				$('#model').val(data[0].MODEL);
			}
			
		});


	});
	$( document ).on( "change", "#pesananloiid", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			dataType : 'json',
			success : function(data){
				console.log(data);
				$('#peunit').val(data.unit);
				$('#peprice').val(data.price);
			}
			
		});


	});

$( document ).on( "change", "#edmodel", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			dataType : 'json',
			success : function(data){
				$('#edqty_unit').val(data[0].QTY_UNIT);
				$('#edqty_month').val(data[0].QTY_MONTH);
				$('#edperiode').val(data[0].PERIODE);
			}
			
		});


	});

$( document ).on( "change", "#customers", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#lois').html(data);
			}
			
		});


	});
$( document ).on( "change", "#customersed", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#loised').html(data);
			}
			
		});


	});
$( document ).on( "change", "#scbuktipesanan", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#scproduct').html(data);
			}
			
		});


	});
$( document ).on( "change", "#custOutgoings", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlcurr');
		$urlDsup = $(this).attr('urlDsup');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#outgoing').html(data);
			}
			
		});
		$.ajax({
			url : $urlDsup,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#dsup').html(data);
			}
			
		});


	});
$( document ).on( "change", "#custOutgoing", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlcurr');
		$urlDsup = $(this).attr('urlDsup');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#outgoing').html(data);
			}
			
		});
		$.ajax({
			url : $urlDsup,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#dsup').html(data);
			}
			
		});


	});
$( document ).on( "click", ".cdsss", function() {
		var $this = $(this);
		var $value = $this.val();
		// alert($value);
		if($value=="NG" || $value=="NGs"){
			$('.ifng').show();
		}else{
			$('.ifng').hide();
		}
	});
$( document ).on( "change", "#labelcustomer", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#labelproduct').html(data);
			}
			
		});


	});

// $( document ).on( "change", "#labelproduct", function() {
// 		var $this = $(this);
// 		var $value = $this.val();
// 		$url = $(this).attr('url');
// 		$.ajax({
// 			url : $url,
// 			type : 'POST',
// 			data : { id:$value },
// 			success : function(data){
// 				$('#labelbarcode').val(data["barcode"]);
// 				$('#labelqtyStandard').val(data["qty_standard_packing"]);
// 			}
			
// 		});


// 	});

$(document).on( "change", "#delProd", function() {
		var $this = $(this);
		var $value = $this.val();
		var $idout = $('#KPS_OUTGOING_FINISHED_GOOD_ID_D').val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'GET',
			data : { id:$value,idout:$idout },
			dataType : 'json',
			success : function(data){
				console.log(data);
				$('#outPo').val(data.outstanding);
				$('#outPosss').val(data.po);
				$('#outSch').val(data.ds);
				$('#outPending').val(data.pending);
				$('#outware').val(100000000000);
			}
			
		});


	});
	$( document ).on( "change", "#delProdOS", function() {
		var $this = $(this);
		var $value = $this.val();
		var $idout = $('#KPS_OUTGOING_FINISHED_GOOD_ID_D').val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'GET',
			data : { id:$value,idout:$idout },
			dataType : 'json',
			success : function(data){
				console.log(data);
				$('#outPo').val(data.outstanding);
				$('#outPosss').val(data.po);
				$('#outSch').val(data.ds);
				$('#outPending').val(data.pending);
				$('#outware').val(100000000000);
			}
			
		});


	});

	$(document).on("keyup","#barcodeno",function(){
		$url = $('#generatebarcodeno').attr('url');
		$barcode = $(this).val();
		$('#generatebarcodeno').attr('href',$url+""+$barcode);

	});

	$(document).on("keyup","#barcodenoed",function(){
		$url = $('#generatebarcodenoed').attr('url');
		$barcode = $(this).val();
		$('#generatebarcodenoed').attr('href',$url+""+$barcode);

	});
	

	
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#quotation_mon tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );
	 
	    // DataTable
	    var table = $('#quotation_mon').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });  		   
		

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	} );
	//end of contoh RFQmon

	//contoh rfq
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    //$('#rfq tfoot th').each( function () {
	    //   var title = $(this).text();
	    //    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    //} );
	 
	    // DataTable
	    var table = $('#rfq').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    /*// Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh RFQ

	//contoh break
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    //$('#rfq tfoot th').each( function () {
	    //   var title = $(this).text();
	    //    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    //} );
	 
	    // DataTable
	    var table = $('#breakdown').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    /*// Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh break

	//contoh quo
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#quotation tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#quotation').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    /*// Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh quo

	//contoh loi
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#loi tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#loi').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    /*// Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh loi

	//contoh fproject
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#fproject tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#fproject').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    /*// Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh fproject

	//contoh bukti_pesanan
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#bukti_pesanan tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#bukti_pesanan').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    /*// Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh bukti_pesanan

	//contoh retur product
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#retur_product').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );*/
	} );
	//end of contoh retur product

	//contoh retur Quantity
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#quantity').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );*/
	} );
	//end of contoh retur Quantity

	//contoh outgoing retur product
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#outgoing_rp').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );*/
	} );
	//end of outgoing retur product

	//contoh os
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#os tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#os').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh os

	//contoh ogos
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#ogos tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#ogos').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh ogos

	//contoh delivery
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#delivery tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#delivery').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh delivery

	//contoh delivery order retur
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#delivery tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#delivery_or').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh delivery order retur

	//contoh invoice
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#invoice tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#invoice').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh invoice

	//contoh invoice
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#invoice_det tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );
	 
	    // DataTable
	    var table = $('#invoice_det').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	} );
	//end of contoh invoice
	
	//contoh invoice
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#cis tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );
	 */
	    // DataTable
	    var table = $('#cis').DataTable({
	      "scrollX": true,
	      "autoWidth": true
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    /*// Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh cis

	//contoh invoice
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#schedule tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#schedule').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh cis

	//contoh tooling
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#tooling').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });
	} );
	//end of contoh tooling

	//contoh report monthly
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#report_monthly').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    // DataTable detail
	    var table = $('#report_monthly_detail').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });
	} );
	//end of contoh report monthly

	//contoh item master
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#item_master').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    // DataTable
	    var table = $('#item_master_detail').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });
	} );
	//end of contoh item master	

	//contoh label
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#label').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });
	} );
	//end of contoh label

	//contoh label
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#label_information').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });
	} );
	//end of contoh label

	//contoh bsthp
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#bsthp').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });


	    // DataTable
	    var table = $('#bsthp_detail').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	} );
	//end of contoh bsthp

	//contoh label informatio ng waste
	$(document).ready(function() {
	 
	    // DataTable
	    var table = $('#li_ng_waste').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    // DataTable
	    var table = $('#li_ng_waste_detail').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });
	} );
	//end of contoh label information ng waste	

	//modul detail
	$(document).ready(function() {
	 //request quotation
	 $('#rfq_detail_attachment').DataTable({
	  
	  });
	 $('#rfq_detail_currency').DataTable({
	  	
	  });
	 $('#rfq_detail_drawing').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	 $('#marketing-tooling-satu').DataTable({
	 	"scrollX":true,
	 	"autoWidth": false
	 });
	 $('#rfq_detail_pp').DataTable({
	  
	  });
	 $('#rfq_detail_schedule').DataTable({
	  	
	  });
	 $('#rfq_detail_tp').DataTable({
	  
	  });

	 //	breakdown cost detail
	  $('#breakdown_depreciation').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });

      $('#breakdown_manufacturing').DataTable({
      });
      
      $('#breakdown_material').DataTable({
      });
      $('#breakdown_part').DataTable({
      });
      $('#breakdown_tooling').DataTable({
      });
    
      //quotation detail
      $('#quotation_qd').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#history_update_x').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });


      //new item detail
      $('#item_nia').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });	

      //failed project detail
      $('#project_fpa').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });	

      //bukti pesanan detial
       $('#pesanan_bpd').DataTable({
       	"scrollX":true,
	  	 "autoWidth": false
       });	

      //retur product detail
      $('#retur_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });	

      //delivery schedule detail
      $('#schedule_dsd').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });

      //order sheet detail
      $('#os_osd').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#os_osa').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });

      //outgoing retur product detail
      $('#out_retur_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });      

      //outgoing finished good detail
      $('#outgoing_finished_ofgd').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });

      //delivery order detail
      $('#delivery_order_dod').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });

      //invoice detail
      $('#invoice_detail_id').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });

      //marketing -> quantity detail
      $('#quantity_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });

	    
	} );
	//modul detail	

	//modul modul production
	$(document).ready(function() {
	 //	production
	  $('#daftar_karyawan').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
      $('#additional_sj').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#absen_harian').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#setup_group').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#setup_upah_harian').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#pembayaran_borongan').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#label_information').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#inventory').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#bsthp_verification').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#retur').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#harga_borongan').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });


      //production detail
      $('#daftar_karyawan_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#additional_sj_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#absen_harian_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#setup_group_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#setup_upah_harian_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });	    
      $('#pembayaran_borongan_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#label_information_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#inventory_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#bsthp_verification_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#retur_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#harga_borongan_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#label_prod').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#inventory_codeitem').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#msr_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#msr').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });

      

      //production monitoring   
		$(document).ready(function() {	    
		    $('#harga_borongan_monitoring tfoot th').each( function () {
		       var title = $(this).text();
		        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		    } );
		    var table = $('#harga_borongan_monitoring').DataTable({
		      "scrollX": true,
		      "autoWidth": false
		    }); 
		    $('a.toggle-vis').on( 'click', function (e) {
		        e.preventDefault();
		 	        
		        var column = table.column( $(this).attr('data-column') );
		 	        
		        column.visible( ! column.visible() );
		    } );	 
		    table.columns().every( function () {
		        var that = this;
		 
		        $( 'input', this.footer() ).on( 'keyup change', function () {
		            if ( that.search() !== this.value ) {
		                that
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );
		} );	

		$(document).ready(function() {	    
		    $('#absen_harian_monitoring tfoot th').each( function () {
		       var title = $(this).text();
		        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		    } );
		    var table = $('#absen_harian_monitoring').DataTable({
		      "scrollX": true,
		      "autoWidth": false
		    }); 
		    $('a.toggle-vis').on( 'click', function (e) {
		        e.preventDefault();
		 	        
		        var column = table.column( $(this).attr('data-column') );
		 	        
		        column.visible( ! column.visible() );
		    } );	 
		    table.columns().every( function () {
		        var that = this;
		 
		        $( 'input', this.footer() ).on( 'keyup change', function () {
		            if ( that.search() !== this.value ) {
		                that
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );
		} );  	                

      $(document).ready(function() {	    
		    $('#retur_production_monitoring tfoot th').each( function () {
		       var title = $(this).text();
		        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		    } );
		    var table = $('#retur_production_monitoring').DataTable({
		      "scrollX": true,
		      "autoWidth": false
		    }); 
		    $('a.toggle-vis').on( 'click', function (e) {
		        e.preventDefault();
		 	        
		        var column = table.column( $(this).attr('data-column') );
		 	        
		        column.visible( ! column.visible() );
		    } );	 
		    table.columns().every( function () {
		        var that = this;
		 
		        $( 'input', this.footer() ).on( 'keyup change', function () {
		            if ( that.search() !== this.value ) {
		                that
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );
		} );
	} );
	//modul modul production

	//modul modul PPIC
	$(document).ready(function() {
	 //	PPIC
	  $('#delivery_quota').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#delivery_quota_setup').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#delivery_status').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#mutation_item').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#sales_report').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });


      //PPIC detail
      $('#delivery_quota_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      //PPIC detail
      $('#delivery_status_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      //PPIC detail
      $('#mutation_item_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });

      //PPIC monitoring   	                
      $(document).ready(function() {	    
		    $('#mutation_item_monitoring tfoot th').each( function () {
		       var title = $(this).text();
		        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		    } );
		    var table = $('#mutation_item_monitoring').DataTable({
		      "scrollX": true,
		      "autoWidth": false
		    }); 
		    $('a.toggle-vis').on( 'click', function (e) {
		        e.preventDefault();
		 	        
		        var column = table.column( $(this).attr('data-column') );
		 	        
		        column.visible( ! column.visible() );
		    } );	 
		    table.columns().every( function () {
		        var that = this;
		 
		        $( 'input', this.footer() ).on( 'keyup change', function () {
		            if ( that.search() !== this.value ) {
		                that
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );
		} );
	} );
	//modul modul PPIC

	//modul modul WAREHOUSE
	$(document).ready(function() {
	 //	warehouse
	  $('#delivery_execution_other').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#vehicle').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#warehouse_inventory').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#ofgo').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#receiving_good').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#stock_card_delivery').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });
	  $('#stock_card_in_out').DataTable({
	  	"scrollX":true,
	  	"iDisplayLength":5,
	  	"aLengthMenu": [[5, 10, 15, 25, 50, 100, -1], [5, 10, 15, 25, 50, 100, "All"]]
	  });
	  $('#stock_opname').DataTable({
	  	"scrollX":true,
	  	"autoWidth": false
	  });


      //WAREHOUSE detail
      $('#delivery_execution_other_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#delivery_execution_other2_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#ofgo_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#receiving_good_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#stock_card_delivery_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#stock_card_in_out_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      });
      $('#stock_opname_detail').DataTable({
      	"scrollX":true,
	  	"autoWidth": false
      }); 
    //   $('#fromAddInvoDo').DataTable({
    //   	"scrollX":true,
	  	// "autoWidth": false
    //   });
   
     


      //WAREHOUSE monitoring   	                
      $(document).ready(function() {	    
		    $('#delivery_execution_other_report tfoot th').each( function () {
		       var title = $(this).text();
		        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		    } );
		    var table = $('#delivery_execution_other_report').DataTable({
		      "scrollX": true,
		      "autoWidth": false
		    }); 
		    $('a.toggle-vis').on( 'click', function (e) {
		        e.preventDefault();
		 	        
		        var column = table.column( $(this).attr('data-column') );
		 	        
		        column.visible( ! column.visible() );
		    } );	 
		    table.columns().every( function () {
		        var that = this;
		 
		        $( 'input', this.footer() ).on( 'keyup change', function () {
		            if ( that.search() !== this.value ) {
		                that
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );
		} );
	} );
	//modul modul WAREHOUSE

	//contoh markettooling
	$(document).ready(function() {
	    /*// Setup - add a text input to each footer cell
	    $('#marketooling tfoot th').each( function () {
	       var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );*/
	 
	    // DataTable
	    var table = $('#marketooling').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });

	    var table = $('#dod-confirmation').DataTable({
	      "scrollX": true,
	      "autoWidth": false
	    });
	    /*$('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	} );
	//end of contoh markettooling

});
$( document ).on( "change", "#mutationcustomer", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#mutationloi').html(data);
			}
			
		});


	});
		$( document ).on( "change", "#mutationcustomer2", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#mutationloi2').html(data);
			}
			
		});


	});