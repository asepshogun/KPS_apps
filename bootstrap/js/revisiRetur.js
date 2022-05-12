$(document).ready(function() {
	  
	    // DataTable
	    var table = $('#retur_product_history_induk').DataTable({
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
} );
$(document).ready(function() {
	  
	    // DataTable
	    var table = $('#retur_detail_data_history').DataTable({
	      
	      "autoWidth": true
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 
	        // Get the column API object
	        var column = table.column( $(this).attr('data-column') );
	 
	        // Toggle the visibility
	        column.visible( ! column.visible() );
	    } );
} );
$(document).ready(function() {
	  

	    var table = $('#invoice_detail_no').DataTable({
	      "scrollX":true,
	      "autoWidth": true
	    });

	    $('a.toggle-vis').on( 'click', function (e) {
	        e.preventDefault();
	 

	        var column = table.column( $(this).attr('data-column') );
	 

	        column.visible( ! column.visible() );
	    } );
} );
$( document ).on( "change", "#idCustomer", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#noRetur').html(data);
			}
			
		});
	});