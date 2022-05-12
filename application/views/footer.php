</section>      
    </div>    

    <!-- Main Footer -->
   <!--  <footer class="main-footer">
      2015 © PT. KPS (Karya Putra Sangkuriang)
    </footer> -->
  </div>
  <!--wrapper -->

  <script src="<?php echo base_url("bootstrap/plugins/jQuery/jQuery.min.js"); ?>"></script>  
  <script src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>  
  <script src="<?php echo base_url("bootstrap/dist/js/app.min.js"); ?>"></script>
  <script src="<?php echo base_url("bootstrap/plugins/slimScroll/jquery.slimscroll.min.js"); ?>"></script>
  <script src="<?php echo base_url("bootstrap/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
  <script src="<?php echo base_url("bootstrap/plugins/datatables/dataTables.bootstrap.min.js"); ?>"></script>
  <script src="<?php echo base_url("bootstrap/plugins/select2/select2.min.js"); ?>"></script>
  <script src="<?php echo base_url("bootstrap/plugins/datepicker/js/bootstrap-datepicker.min.js"); ?>"></script>
  <script src="<?php echo base_url("bootstrap/js/script.js"); ?>"></script>
  <script src="<?php echo base_url("bootstrap/js/revisiScript.js"); ?>"></script>
   <!-- revisi lable Start-->
  <script src="<?php echo base_url("bootstrap/js/revisiLabelScript.js"); ?>"></script>
 <!-- revisi lable end-->
 <!-- revisi retur 22-15-2016 start-->
  <script src="<?php echo base_url("bootstrap/js/revisiRetur.js"); ?>"></script>
 <!-- revisi retur 22-15-2016 end-->
 <!-- revisi retur 27-6-2016 start-->
  <script src="<?php echo base_url("bootstrap/js/revisiPpic.js"); ?>"></script>
  <script src="<?php echo base_url("assets/dataTables.scroller.min.js"); ?>"></script>
  <script src="<?php echo base_url("bootstrap/js/dataTables.fixedColumns.min.js"); ?>"></script>
  <!-- <script src="<?php //echo base_url("assets/jquery-3.3.1.js"); ?>"></script> -->
  <!-- <script src="<?php //echo base_url("assets/jquery.dataTables.min.js"); ?>"></script> -->
 <!-- revisi retur  27-6-2016 end-->
  
  <script type="text/javascript">
  $(document).ready(function() {
      // $('#employees').DataTable();
      $('#ogfg-pending').DataTable();
      $('#ofgo_detail_detail_sub').DataTable();
      $('#customer_plant').DataTable();
      $('#customer_divisi').DataTable();
      $('#customer_pic').DataTable();
      $('#customer_mc').DataTable();
      $('#customer_supplier').DataTable();
      $('#customer_finance').DataTable();
      $('#customer_account').DataTable();
      $('#customer_ds').DataTable();
      $('#customer_iso').DataTable();    
      $('#customer_pap').DataTable();  
      $('#fromAddInvoDo').DataTable(
         {
        "scrollX":true,
        "iDisplayLength":-1,
        "aLengthMenu": [[-1], ["All"]]
      });
      $('#departement').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#position').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#group').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#section').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      //$('#vehicle').DataTable();
      $('#bankref').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#marketing').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#user_data').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#BSTHP_RECORD_history').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#BSTHP_detail').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#BSTHPdetailSub').DataTable({
        "scrollX":true,
      "autoWidth": false
      });

      $('#msa').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#ms').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#mm').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#det_msa').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#det_ms').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      
      //$('#rfq_detail_pp').DataTable();
      //$('#breakdown').DataTable();
      //$('#quotation').DataTable();
      //$('#loi').DataTable();
      //$('#bukti_pesanan').DataTable();
      //$('#marketing_tooling').DataTable();
      $('#ogfg').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#ogfg-os').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#codp').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#dataLabelDetail').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#tableFromAddBpDetail').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#customer_cp').DataTable(
        {
      "scrollX":true,
      "iDisplayLength":10,
      "aLengthMenu": [[1,5, 10, 15, 25, 50, 100, -1], [1,5, 10, 15, 25, 50, 100, "All"]]
      });
      $('#os_Table').DataTable(
        {
        "scrollX":true,
        "aLengthMenu": [[-1], ["All"]]
      });
    //REVISI LABLE START
   
    //REVISI LABLE END 
    //REVISI BSTHP START
      //contoh tooling
      $(document).ready(function() {
       
          // DataTable
          var table = $('#det_mm').DataTable({
            "scrollX": true,
            "autoWidth": false
          });
      } );
      $(document).ready(function() {
       
          // DataTable
          var table = $('#rfq_detail_drawing-history').DataTable({
            "scrollX": true,
            "autoWidth": false
          });
      } );
      //end of contoh tooling
    //REVISI BSTHP END
      $('#item-master').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#invoice-print').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      // $('#invoice_detail_no').DataTable();
      $('#history-price').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      //$('#dod-confirmation').DataTable();
    $('#schedule_tracking').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
  
  //revisi retur start
    $('#retur_detail_data').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
  //revisi retur end
  
  //revisi retur 22-15-2016 start
    $('#retur_product_history_induk').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
    $('#retur_detail_data_history').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
  //revisi retur 22-15-2016 end
  //revisi sales 23-05-2016
    $('#os_pending_return_monitoring').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
    $('#os_pending_monitoring').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
    $('#os_monitoring').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
  // revisi PPIC 29-6-2016
    $('#dataMutation').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
    //stockopname
      $('#stock_opname_detail_induk').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#stock_opname_detail_half_compelete').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#stock_opname_detail_compelete').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
      $('#breakrep').DataTable({
        "scrollX":true,
      "autoWidth": false
      });
  
  } );
  </script>
<script type="text/javascript">
$(document).ready(function() {
  $(".select2").select2();
});
</script>

<script>
$(document).ready(function() {
  $(".datepicker").datepicker({
    autoclose: true
  });
});
</script>
<script>
function priceUpdateconfirm()
{
    job=confirm("Are you sure to update Price ?");
    if(job!=true)
    {
        return false;
    }
}
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>
<script>
function doconfirmVer()
{
    job=confirm("Are you sure want to verify this outgoing ?");
    if(job!=true)
    {
        return false;
    }
}
</script>

<script type="text/javascript">
 $(document).on( "change", "#companyOutMon", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('url');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#loiOutMon').html(data);
      }
      
    });
  });
 $(document).on( "change", "#marketing_search", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('loadCustomer');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#customer_search').html(data);
      }
      
    });
  });
 $(document).on( "change", "#customer_search", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('loadItem');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#code_search').html(data);
      }
      
    });
  });
 $(document).on( "change", "#MarketRfq", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('loaCust');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#CustRfq').html(data);
      }
      
    });
  });
 $(document).on( "change", "#CustPu", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('loadRfq');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#codPu').html(data);
      }
      
    });
  });
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
 $(document).on( "change", "#CustRfqQtt", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('loadRfq');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#rfqMonQtt').html(data);
      }
      
    });
  });
 $(document).on( "change", "#CustRfqBreak", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('loadRfq');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#rfqMonBreak').html(data);
      }
      
    });


  });
  $( document ).on( "change", "#CustomerForBpOutPending", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlBPOut');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#buktipesanPending').html(data);
      }
      
    });
  });
   $( document ).on( "change", "#CustScdTrac", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlBpScdTrac');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#bpIdDscTrac').html(data);
      }
      
    });
  });
     $( document ).on( "change", "#CustDelStat", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlBPOut');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#buktipesanDelStat').html(data);
      }
      
    });
  });
    $( document ).on( "change", "#CustLoiCod", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlLoiForCod');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#loiCod').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustPoMon", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlBPPoMon');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#buktipesanPoMon').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustOsMonDet", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlBPPoMon');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#OSMonPend').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustPoMonDet", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlBPPoMon');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#buktipesanPoMonDet').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustLoiInv", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlLoiInv');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#codeItemInv').html(data);
      }
      
    });
  });
   $( document ).on( "change", "#CustSOcom", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlItemSO');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#codeItemSOcom').html(data);
      }
      
    });
  });
   $( document ).on( "change", "#CustSOcomACt", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlItemSO');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#codeItemSOcomAct').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustRetMonDet", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlRetPoMon');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#returNo').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustInvoMonDet", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlInvoMon');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#invoNo').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustDo", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlBPDo');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#buktipesanDo').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustDo", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlBPOs');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#buktipesanOs').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustPoOs", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlBPPoOS');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#buktipesanPoOs').html(data);
      }
      
    });
  });
  $( document ).on( "change", "#CustDelStat", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlCodeItem');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#loiDelStat').html(data);
      }
      
    });
  });
   $( document ).on( "change", "#buktipesanDelStat", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlCodeItem');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#loiDelStat').html(data);
      }
      
    });
  });
</script>
<script type="text/javascript">
  $( document ).on( "change", "#CustomerForOsOutPending", function() {
    var $this = $(this);
    var $value = $this.val();
    $url = $(this).attr('urlOsOut');
    $.ajax({
      url : $url,
      data : { id:$value },
      success : function(data){
        $('#OsPending').html(data);
      }
      
    });
  });
</script>