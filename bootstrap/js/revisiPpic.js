$( document ).on( "change", "#KPS_OFGDOT_LOI_ID", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			dataType : 'json',
			success : function(data){
				$('#KPS_OFGDOT_PART_NO').val(data[0].LOI_PART_NO);
				$('#KPS_OFGDOT_PART_NAME').val(data[0].LOI_PART_NAME);
				$('#KPS_OFGDOT_MODEL').val(data[0].LOI_MODEL);
				$('#KPS_OFGDOT_QTY_UNIT').val(data[0].KPS_RFQ_PART_UNIT);
			}
			
		});


	});
$( document ).on( "change", "#KPS_OFGDOT_LOI_ID", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urlStock');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			dataType : 'json',
			success : function(data){
				if(data[0]){
				$('#KPS_OFGDOT_QTY_WAREHOUSE').val(data[0].KPS_STOCK_FINAL_QTY);
				}else{
				$('#KPS_OFGDOT_QTY_WAREHOUSE').val(0);	
				}
			}
			
		});


	});
