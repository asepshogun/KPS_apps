$( document ).on( "change", "#loiItemMaster", function() {
	var $this = $(this);
	var $value = $this.val();
	$url = $(this).attr('url');
	$.ajax({
		url : $url,
		type : 'POST',
		data : { id:$value },
		dataType : 'json',
		success : function(data){
			$('#code_item').val(data[0].KPS_ITEM_MASTER_CODE_ITEM);
			$('#part_no').val(data[0].KPS_ITEM_MASTER_PART_NO);
			$('#part_name').val(data[0].KPS_ITEM_MASTER_PART_NAME);
		}
		
	});
});
	$( document ).on( "change", "#modelLoi", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('url');
		$.ajax({
			url : $url,
			type : 'POST',
			data : { id:$value },
			dataType : 'json',
			success : function(data){
				$('#model').val(data[0].MODEL);
				$('#price').val(data[0].total_breakdown);
				$('#unit').val(data[0].KPS_RFQ_PART_UNIT);
			}
			
		});


	});

$( document ).on( "change", "#divisiPesanan", function() {
		var $this = $(this);
		var $value = $this.val();
		$url = $(this).attr('urldivisi');
		$urlcurr = $(this).attr('urlcurr');
		$urlPap = $(this).attr('urlPap');
		$urlPapSelect = $(this).attr('urlPapSelect');
		$.ajax({
			url : $url,
			data : { id:$value },
			success : function(data){
				$('#EQKPS_CUSTOMER_DIVISI_BK').html(data);
				$('#qdivisi').html(data);
			}
			
		});
		$.ajax({
			url : $urlcurr,
			data : { id:$value },
			success : function(data){
				$('#CURRENCY_BP').html(data);
				$('#qcurr').html(data);
			}
			
		});		
		$.ajax({
			url : $urlPap,
			data : { id:$value },
			success : function(data){
				$('#pap').val(data);
			}
			
		});
		$.ajax({
			url : $urlPapSelect,
			data : { id:$value },
			success : function(data){
				$('#papSelect').html(data);
			}
			
		});

	});