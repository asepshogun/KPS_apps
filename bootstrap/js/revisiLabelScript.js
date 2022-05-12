$(document).ready(function() {
	  
	    // DataTable
	    var table = $('#label_produksi').DataTable({
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
	    var table = $('#BSTHP_RECORD').DataTable({
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
$( document ).on( "change", "#labelcustomerUpdate", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			success : function(data){
				$('#labelproductUpdate').html(data);
			}
			
		});


	});
// var siteurl = "<?php print site_url(); ?>";
// $(document).ready(function() {
	// $.ajax({
			// url : siteurl+"label/loadProductBeforeUpdate",
			// type : 'POST',
			// data : { id:$value },
			// success : function(data){
				// $('#labelproductUpdate').html(data);
			// }
			
		// });
// });