<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PT KPS</title>    
    <link href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/fontawesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/ionicons/css/ionicons.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/select2/select2.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/datatables/dataTables.bootstrap.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/datepicker/css/bootstrap-datepicker3.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/dist/css/AdminLTE.min.css"); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("bootstrap/dist/css/skins/_all-skins.css"); ?>"> 
    <link href="<?php echo base_url("bootstrap/css/style.css"); ?>" rel="stylesheet">
    <script src="<?php echo base_url("bootstrap/plugins/jQuery/jQuery.min.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/plugins/datatables/dataTables.fixedColumns.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/chart/to/dist/Chart.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/js/date.format.js"); ?>"></script>
    <link rel="icon" href="<?php echo base_url("bootstrap/image/logo.png"); ?>" type="image/gif">
    <style type="text/css">
      #logoC {background-color: #FB8B37;}
    </style>
  </head>
  <body class="hold-transition skin-blue skin-black sidebar-collapse sidebar-mini">
  <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url() ?>/dashboard" class="logo" id="logoC">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>KPS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">PT. <b>KPS </b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">   
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <p role="button" class="label label-primary navbar-text navbar-left" onclick=self.history.back()><span class="glyphicon glyphicon-hand-left"></span> BACK</p>
        <?php 
        if($this->session->flashdata('title')) { ?>
          <p role="button" class="navbar-text navbar-left">
            <font size="4">
              <b> | <?php echo $this->session->flashdata('title'); ?> </b>
            </font>
          </p>
        <?php
        } ?>
        <p role="button" class="navbar-text navbar-left" id="titleHeader"></p>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">  
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <?php echo $this->session->userdata('name'); ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#changepassword"><i class="fa fa-lock"></i>Change Password</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url() ?>/login/logout"><i class="fa fa-sign-out"></i>Log Out</a></li> 
              </ul>
            </li>                        
          </ul>
        
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
       <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url(); ?>uploads/photo_employee/<?php echo $this->session->userdata('PHOTO_OF_EMPLOYEE'); ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $this->session->userdata('name'); ?></p>
            <a href="#"><?php echo $this->session->userdata('role'); ?></a><br/>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">  
          <li class="header">MAIN NAVIGATION</li>
          <li class="active"><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          
          <?php
          if($this->session->userdata('role')=="Administrator"){ //hapus SALES HEAD dibaris ini
          ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-database"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('department');?>"><i class="fa fa-chevron-circle-right"></i> <span>Department</span></a></li>
              <li><a href="<?php echo site_url('section');?>"><i class="fa fa-chevron-circle-right"></i> <span>Section</span></a></li>
              <li><a href="<?php echo site_url('position');?>"><i class="fa fa-chevron-circle-right"></i> <span>Position</span></a></li>
              <li><a href="<?php echo site_url('group');?>"><i class="fa fa-chevron-circle-right"></i> <span>Group</span></a></li>
              <li><a href="<?php echo site_url('bank_reference');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bank Reference</span></a></li>
              <li><a href="<?php echo site_url('target_growth');?>"><i class="fa fa-chevron-circle-right"></i> <span>Sales Target Growth</span></a></li>
              <li><a href="<?php echo site_url('Competitor');?>"><i class="fa fa-chevron-circle-right"></i> <span>Competitor</span></a></li>
              <li><a href="<?php echo site_url('Productivity_standart');?>"><i class="fa fa-chevron-circle-right"></i> <span>Productivity Standart</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-user"></i> <span>Employee Management</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('employee');?>"><i class="fa fa-chevron-circle-right"></i> <span>Employee</span></a></li>
              <li><a href="<?php echo site_url('user_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>User Data</span></a></li>
              <li><a href="<?php echo site_url('marketing_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Marketing Data</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>New Item Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('joint_retail_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>Master Join</span></a></li>
              <li><a href="<?php echo site_url('customer_informationNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Customer Information</span></a></li>
              <li><a href="<?php echo site_url('request_quotationNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Retail</span></a></li>
              <li><a href="<?php echo site_url('rfqmonitoringRetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Mon Retail</span></a></li>
              <li><a href="<?php echo site_url('breakdown_costNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Retail</span></a></li>
              <li><a href="<?php echo site_url('BreakrepNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Report Retail</span></a></li>
              <li><a href="<?php echo site_url('quotationNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation Retail</span></a></li>
              <!-- <li><a href="<?php // echo site_url('price_update');?>"><i class="fa fa-chevron-circle-right"></i> <span>Price Update</span></a></li>
              <li><a href="<?php // echo site_url('historyprice');?>"><i class="fa fa-chevron-circle-right"></i> <span>History Price</span></a></li> -->
               <li><a href="<?php echo site_url('quotationmonRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation Mon Retail</span></a></li>
               <li><a href="<?php echo site_url('Update_price_by_code');?>"><i class="fa fa-chevron-circle-right"></i> <span>Update Price By Coding</span></a></li>
              <li><a href="<?php echo site_url('itemNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>New Item (LOI) Retail</span></a></li>
              <li><a href="<?php echo site_url('ProjectNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Failed Project Retail</span></a></li>
              <!--  <li><a href="<?php // echo site_url('cost_of_delivery_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Cost Of Delivery Product</span></a></li> -->
            
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>New Item</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('customer_information');?>"><i class="fa fa-chevron-circle-right"></i> <span>Customer Information</span></a></li>
              <li><a href="<?php echo site_url('customer_list');?>"><i class="fa fa-chevron-circle-right"></i> <span>Customer List</span></a></li>
              <li><a href="<?php echo site_url('new_item_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>Item Master</span></a></li>
              <li><a href="<?php echo site_url('rfq_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Master</span></a></li>
               <li><a href="<?php echo site_url('request_quotation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Request for Quotation</span></a></li>
              <li><a href="<?php echo site_url('rfqmonitoring');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Monitoring</span></a></li>
              <li><a href="<?php echo site_url('breakdown_cost');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Cost</span></a></li>
              <li><a href="<?php echo site_url('breakrep');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Report</span></a></li>
              <li><a href="<?php echo site_url('quotation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation</span></a></li>
              <li><a href="<?php echo site_url('price_update');?>"><i class="fa fa-chevron-circle-right"></i> <span>Price Update</span></a></li>
              <li><a href="<?php echo site_url('historyprice');?>"><i class="fa fa-chevron-circle-right"></i> <span>History Price</span></a></li>
              <li><a href="<?php echo site_url('quotationmon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation Monitoring</span></a></li>
              <li><a href="<?php echo site_url('Item_dev_1');?>"><i class="fa fa-chevron-circle-right"></i> <span>New Item (LOI)</span></a></li>
              <li><a href="<?php echo site_url('mon_doc_ext_drawing');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Doc Ext Draw</span></a></li>
              <li><a href="<?php echo site_url('doc_new_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Doc New Product</span></a></li>
              <li><a href="<?php echo site_url('monitoring_price_by_code');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Price By Code</span></a></li>
              <li><a href="<?php echo site_url('project');?>"><i class="fa fa-chevron-circle-right"></i> <span>Failed Project</span></a></li>
              <li><a href="<?php echo site_url('cost_of_delivery_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Cost Of Delivery Product</span></a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file"></i> <span>Regular Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('pesanan/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan NT</span></a></li> 
              <li><a href="<?php echo site_url('delivery_orderRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retail</span></a></li>
              <li><a href="<?php echo site_url('delivery_order_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retur Retail</span></a></li>
              <li><a href="<?php echo site_url('monitorDoRetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Retail</span></a></li>
              <li><a href="<?php echo site_url('delivery_orderRETAIL/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon DO Confirm Retail</span></a></li>
              <li><a href="<?php echo site_url('monitorDoDelete');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Delete DO Retail</span></a></li>
              <li><a href="<?php echo site_url('invoiceRETAIL/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice Retail</span></a></li>
              <li><a href="<?php echo site_url('retur_productRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur Product Retail</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_retur_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Retur Prod Retail</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO PPIC Retail</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC Retail</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file-archive-o"></i> <span>Report Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('break_invo_ppn');?>"><i class="fa fa-chevron-circle-right"></i> <span>CBD Invoice PPN</span></a></li> 
              <li><a href="<?php echo site_url('outputInvoicePPN');?>"><i class="fa fa-chevron-circle-right"></i> <span>Output Invoice PPN</span></a></li>
              <li><a href="<?php echo site_url('kartupiutang');?>"><i class="fa fa-chevron-circle-right"></i> <span>Kartu Piutang PPN</span></a></li>
              <li><a href="<?php echo site_url('break_invo_ppn');?>"><i class="fa fa-chevron-circle-right"></i> <span>Lap CBD PPN</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file"></i> <span>Regular</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan</span></a></li>
              <li><a href="<?php echo site_url('reviewPO');?>"><i class="fa fa-chevron-circle-right"></i> <span>Review PO</span></a></li>
              <!-- <li><a href="<?php// echo site_url('pesanan/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan NT</span></a></li>  -->
              <li><a href="<?php echo site_url('monitoring_po_balance');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Balance</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Monitor</span></a></li>
              <li><a href="<?php echo site_url('monitoring_po_to_os');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO OS Monitor</span></a></li>
              
              <li><a href="<?php echo site_url('Monitoring_pesanan/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Detail Monitor</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_loss_PO');?>"><i class="fa fa-chevron-circle-right"></i> <span>MON Close PO ABNORMAL</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan_ppic');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO PPIC</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan_ppic/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC</span></a></li>
              <li><a href="<?php echo site_url('monitoring_po_to_os');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO OS Monitor</span></a></li>
              <li><a href="<?php echo site_url('retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur Product V 2.1</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Retur Product</span></a></li>
              
              <li><a href="<?php echo site_url('invoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice</span></a></li>
              <li><a href="<?php  echo site_url('invoice/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice NT</span></a></li>
              <li><a href="<?php echo site_url('monitorInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice</span></a></li>
              <li><a href="<?php echo site_url('monitoring_invo_detail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice Detail</span></a></li>
              <li><a href="<?php echo site_url('invoice/monitoringDeleteInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice</span></a></li>
              <li><a href="<?php echo site_url('invoice/monitoringDeleteInvoiceDetailDO');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice DO</span></a></li>
              <li><a href="<?php echo site_url('monitorDoF');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Do Finance</span></a></li>
              <li><a href="<?php echo site_url('Delivery_Order_mon_F');?>"><i class="fa fa-chevron-circle-right"></i> <span>Confirm Do Finance</span></a></li>
              <li><a href="<?php echo site_url('confirmFinance_Scan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Confirm Do Finance Scan</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Sales Report</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('total_sales_kps');?>"><i class="fa fa-chevron-circle-right"></i> <span>Total Sales</span></a></li>
              <li><a href="<?php echo site_url('Mon_total_po');?>"><i class="fa fa-chevron-circle-right"></i> <span>Total PO</span></a></li>
              <li><a href="<?php echo site_url('sales_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Sales Report</span></a></li>
              <!-- <li><a href="<?php // echo site_url('monthly_marketing_sales_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Marketing Sales Report</span></a></li> -->
              <li><a href="<?php echo site_url('monthly_marketing_sales_report_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly MKT SLS Report</span></a></li>
              <!-- <li><a href="<?php // echo site_url('total_sales_monthly_analize');?>"><i class="fa fa-chevron-circle-right"></i> <span>Marketing Sales Monthly Analize</span></a></li> -->
              <li><a href="<?php echo site_url('total_sales_monthly_analize_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>MKT SLS Monthly Analize</span></a></li>
              <!-- <li><a href="<?php // echo site_url('total_marketing_sales_analize');?>"><i class="fa fa-chevron-circle-right"></i> <span>Total Marketing Sales Analize</span></a></li> -->
              <li><a href="<?php echo site_url('total_marketing_sales_analize_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Total MKT SLS Analize</span></a></li>
              <li><a href="<?php echo site_url('monthly_marketing_sales_growth_report_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Month MKT SLS Growth</span></a></li>
              <li><a href="<?php echo site_url('Mon_deadly_stock/indexSales');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock</span></a></li>
              <li><a href="<?php echo site_url('Mon_deadly_stock_monthly/indexSales');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock Monthly</span></a></li>
              <li><a href="<?php echo site_url('Mon_missing_stock/searchSales?');?>"><i class="fa fa-chevron-circle-right"></i> <span>Missing Stock</span></a></li>
              <li><a href="<?php echo site_url('mon_produktifitas');?>"><i class="fa fa-chevron-circle-right"></i> <span>MON Produktifitas</span></a></li>
              <li><a href="<?php echo site_url('mon_produktifitas_resume');?>"><i class="fa fa-chevron-circle-right"></i> <span>MON Produktifitas Resume</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Sales Report Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('sales_report_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Sales Report Retail</span></a></li>
              <!-- <li><a href="<?php // echo site_url('monthly_marketing_sales_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Marketing Sales Report</span></a></li> -->
              <li><a href="<?php echo site_url('monthly_marketing_sales_report_dev_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Month MKT SLS Report RTL</span></a></li>
              <!-- <li><a href="<?php // echo site_url('total_sales_monthly_analize');?>"><i class="fa fa-chevron-circle-right"></i> <span>Marketing Sales Monthly Analize</span></a></li> -->
              <li><a href="<?php echo site_url('total_sales_monthly_analize_dev_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>MKT SLS month Analize RTL</span></a></li>
              <!-- <li><a href="<?php // echo site_url('total_marketing_sales_analize');?>"><i class="fa fa-chevron-circle-right"></i> <span>Total Marketing Sales Analize</span></a></li> -->
              <li><a href="<?php echo site_url('total_marketing_sales_analize_dev_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Total MKT SLS Analize RTL</span></a></li>
              <li><a href="<?php echo site_url('monthly_marketing_sales_growth_report_dev_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Month MKT SLS Growth RTL</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file-archive-o"></i> <span>Marketing Report</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('quantity');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quantity & Tooling</span></a></li>
              <li><a href="<?php echo site_url('tooling');?>"><i class="fa fa-chevron-circle-right"></i> <span>Tooling Monitoring</span></a></li>
              <li><a href="<?php echo site_url('report_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Report</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-gears"></i> <span>Production</span> <i class="fa fa-angle-left pull-right"></i></a>
            
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('Item_monitoring');?>"><i class="fa fa-chevron-circle-right"></i> <span>Item List</span></a></li>
              <li><a href="<?php echo site_url('label');?>"><i class="fa fa-chevron-circle-right"></i> <span>Label</span></a></li>
              <li><a href="<?php echo site_url('bsthp');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP</span></a></li>
              <!-- <li><a href="<?php // echo site_url('bsthp_verification/indexImpv');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification IMPV</span></a></li> -->
              <li><a href="<?php echo site_url('bsthp_verification/indexImpv');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification</span></a></li>
              <li><a href="<?php echo site_url('BSTHP_Verification_mobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification Mobile</span></a></li>
              <li><a href="<?php echo site_url('monitoring_bsthp_no_ver');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor BSTHP Unverify</span></a></li>
              
              <li><a href="<?php echo site_url('label_information');?>"><i class="fa fa-chevron-circle-right"></i> <span>Label Information</span></a></li>
              
              <!-- <li><a href="<?php// echo site_url('bsthp_verification');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification</span></a></li> -->
              <li><a href="<?php echo site_url('retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur</span></a></li>
              <li><a href="<?php echo site_url('label/barcodeSetting');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setting Print Barcode</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-tv"></i> <span>Production Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('retur/monitoring');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur Production Monitoring</span></a></li>
               <li><a href="<?php echo site_url('Inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
              <li><a href="<?php echo site_url('Inventory/indexCodeItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory By Code Item</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-repeat"></i> <span>Retur V 3.0</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><span><font color="white" >Transaction</font> </span></li>
              <li><a href="<?php echo site_url('Retur_product_v3');?>"><i class="fa fa-phone"></i> <span>Retur Request V 3.0</span></a></li> 
              <li><span><font color="white" >Monitoring</font> </span></li>
             </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('scheduleNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Retail</span></a></li> 
               <li><a href="<?php echo site_url('monitoring_pending_data_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Data Pending Retail</span></a></li>
             </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-cubes"></i> <span>PPIC Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule</span></a></li> 
              <li><a href="<?php echo site_url('order_sheet');?>"><i class="fa fa-chevron-circle-right"></i> <span>Order Sheet</span></a></li>
               <li><a href="<?php echo site_url('delivery_order');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order</span></a></li>
               <li><a href="<?php echo site_url('Delivery_Order_PL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Packing List</span></a></li>
               <li><a href="<?php echo site_url('delivery_Order_cl');?>"><i class="fa fa-chevron-circle-right"></i> <span>Covering Letter</span></a></li>
               <li><a href="<?php echo site_url('delivery_Order_tool');?>"><i class="fa fa-chevron-circle-right"></i> <span>DO Tool / Rent</span></a></li>
               <li><a href="<?php echo site_url('delivery_order_sewa');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Sewa</span></a></li>
                <li><a href="<?php echo site_url('delivery_order_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retur</span></a></li>
                <li><a href="<?php echo site_url('vehicle');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota Setup</span></a></li>
                <li><a href="<?php echo site_url('mutation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mutation Item</span></a></li> 
                <li><a href="<?php echo site_url('Setup_minimum_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Minimum Stock</span></a></li>
                <li><a href="<?php echo site_url('Setup_forecast');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Forecast</span></a></li>              
               </ul>
          </li> 
          <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('monitoring_schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Schedule</span></a></li>
              <li><a href="<?php echo site_url('Mon_balance_scd_cis');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Schedule Vs PO</span></a></li>
              <li><a href="<?php echo site_url('schedule/dsTracking');?>"><i class="fa fa-chevron-circle-right"></i> <span>DS Tracking </span></a></li>
              <li><a href="<?php echo site_url('schedule/dsTrackingByOs');?>"><i class="fa fa-chevron-circle-right"></i> <span>DS Tracking By OS</span></a></li>
              <li><a href="<?php echo site_url('order_sheet/monitoringSales');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Order Sheet Group</span></a></li>
              <li><a href="<?php echo site_url('order_sheet/monitoringSalesPerItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Order Sheet All</span></a></li>
              <li><a href="<?php echo site_url('monitorDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO</span></a></li>
              <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Confirm</span></a></li>
              <li><a href="<?php echo site_url('monitorDoDelete');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Delete DO</span></a></li>
              <!-- <li><a href="<?php // echo site_url('schedule_closing');?>"><i class="fa fa-chevron-circle-right"></i> <span>Closing Schedule</span></a></li> -->
              <!-- <li><a href="<?php // echo site_url('schedule_closing_mon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Closing Schedule</span></a></li> -->
              <li><a href="<?php echo site_url('delivery_status');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status</span></a></li>
              <li><a href="<?php echo site_url('Delivery_Status_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status V 2.0</span></a></li>
              <li><a href="<?php echo site_url('delivery_quota');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota</span></a></li>
              <li><a href="<?php echo site_url('monthly_loss_delivery');?>"><i class="fa fa-chevron-circle-right"></i> <span>Loss Quota</span></a></li>

              <li><a href="<?php echo site_url('Detail_delivery_cost_per_date');?>"><i class="fa fa-chevron-circle-right"></i> <span>Detail delivery cost</span></a></li>

              <li><a href="<?php echo site_url('mutation_item/monitoring');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mutation Item Monitoring</span></a></li>
              <!-- <li><a href="<?php // echo site_url('Inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li> -->
              <!-- <li><a href="<?php //echo site_url('Inventory/indexCodeItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory By Code Item</span></a></li> -->
              <li><a href="<?php echo site_url('monitoring_pending_data_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Pending V 2.0 </span></a></li>
              <li><a href="<?php echo site_url('monitoring_pending_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base Outgoing</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pending_data_base_do');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base DO</span></a></li>
              <li><a href="<?php echo site_url('Pending_Delivery_Monthly_Report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Report Pending Monthly </span></a></li>
              <!-- <li><a href="<?php //echo site_url('monitoring_pending_data_base_os---');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Data Pending OS</span></a></li> -->
              <li><a href="<?php echo site_url('Stock_card_for_ppic');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Card PPIC</span></a></li>
              <li><a href="<?php echo site_url('monitoring_forecast');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Forecast</span></a></li>
              <li><a href="<?php echo site_url('monitoring_forecast_outstanding');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Forecast Outstanding</span></a></li>
             </ul>
          </li> 
          <li class="treeview">
            <a href="#"><i class="fa fa-truck" aria-hidden="true"></i><span>Auto Deliver Quota</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><span><font color="white" >Master</font> </span></li>
              <li><a href="<?php echo site_url('Master_data_cluster');?>"><i class="fa fa-chevron-circle-right"></i> <span>Cluster</span></a></li>
              <li><a href="<?php echo site_url('Master_data_employee');?>"><i class="fa fa-chevron-circle-right"></i> <span>Employee For PPIC</span></a></li>
              <li><a href="<?php echo site_url('Setup_truck_speed');?>"><i class="fa fa-chevron-circle-right"></i> <span>Truck Speed</span></a></li>
              <li><a href="<?php echo site_url('Setup_driver_to_truck');?>"><i class="fa fa-chevron-circle-right"></i> <span>Driver To Truck</span></a></li>
               <li><a href="<?php echo site_url('Setup_cluster_consument');?>"><i class="fa fa-chevron-circle-right"></i> <span>Cluster Customer</span></a></li>
               <li><a href="<?php echo site_url('Setup_truck_to_cluster');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Truck Cluster</span></a></li>
              <li><span><font color="white" >Transaction</font> </span></li>
               <li><a href="<?php echo site_url('generating_outgoing_scd');?>"><i class="fa fa-chevron-circle-right"></i> <span>Generate Outgoing</span></a></li>
              <li><span><font color="white" >Monitoring</font> </span></li>
               <li><a href="<?php echo site_url('Readiness_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Readiness Stock</span></a></li>
               <li><a href="<?php echo site_url('Monitoring_mapping_del');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon delivery Veh</span></a></li>
               <li><a href="<?php echo site_url('Loading_capacity_Veh');?>"><i class="fa fa-chevron-circle-right"></i> <span>Loading Cap Veh</span></a></li>
               <li><a href="<?php echo site_url('performance_delivery');?>"><i class="fa fa-chevron-circle-right"></i> <span>Performance Delivery</span></a></li>
               <!-- <li><a href="<?php // echo site_url('Monitoring_detail_mapping_del');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon delivery Veh detail</span></a></li> -->

            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-plane" aria-hidden="true"></i><span>Deliver Quota</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><span><font color="white" >Master</font> </span></li>
              <li><a href="<?php echo site_url('Setup_assume_quota');?>"><i class="fa fa-chevron-circle-right"></i> <span>Assume</span></a></li>
              <li><span><font color="white" >Monitoring</font> </span></li>
               <li><a href="<?php echo site_url('Delivery_quota_target');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quota Target</span></a></li>
               <li><a href="<?php echo site_url('Daily_quota_delivery_target');?>"><i class="fa fa-chevron-circle-right"></i> <span>Daily Target</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('outgoing_finishedNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Retail</span></a></li>
               <li><a href="<?php echo site_url('outgoing_retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Retur Retail</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-archive"></i> <span>Warehouse Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
            <!--  <li><a href="<?php // echo site_url('stock_opname');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Opname</span></a></li> -->
                          
              <li><a href="<?php echo site_url('outgoing_finished');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G</span></a></li>
              <li><a href="<?php echo site_url('outgoingFinishRev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G V 2.0</span></a></li>
              
              <li><a href="<?php echo site_url('outgoing_finished_good_other');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Others</span></a></li>
              <li><a href="<?php echo site_url('outgoing_retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Retur</span></a></li>
              <li><a href="<?php echo site_url('outgoing_os');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing for Order Sheet</span></a></li>
              <li><a href="<?php echo site_url('outgoing_finished_verification');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver</span></a></li>
              <li><a href="<?php echo site_url('Outgoing_finished_verification_v1_1');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver V 1.1</span></a></li>
              <li><a href="<?php echo site_url('Outgoing_finished_ver_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver Retur</span></a></li>
              <li><a href="<?php echo site_url('delivery_execution_other');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Execution to Other</span></a></li> 
              <li><a href="<?php echo site_url('barcode_group');?>"><i class="fa fa-chevron-circle-right"></i> <span>Barcode Group</span></a></li>
              <li><a href="<?php echo site_url('stock_opname_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Opname V 2.1</span></a></li>  
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('monitoring_bsthp_no_ver');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor BSTHP Unverify</span></a></li>
             <li><a href="<?php echo site_url('monitoring_revisi_outgoing');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Monitor Outgoing F G Rev</span></a></li> 
             <li><a href="<?php echo site_url('outgoing_finished_verification/monitoringOutVerMon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Outgoing F G Ver</span></a></li>
             <li><a href="<?php echo site_url('Outgoing_finished_verification_v1_1');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver V 1.1</span></a></li>
             <li><a href="<?php echo site_url('outgoing_finished_verification/monitoringOutVerMonNG');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Outgoing F G Ver NG</span></a></li>
             <li><a href="<?php echo site_url('outgoing_finished_verification/indexDone');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Outgoing F G Ver Done</span></a></li>
             <li><a href="<?php echo site_url('Out_going_monitoring_to_del');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing TO DO Report</span></a></li>
             <li><a href="<?php echo site_url('Out_going_monitoring');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Outgoing report</span></a></li> 
             <li><a href="<?php echo site_url('Out_going_monitoring_mutation');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Outgoing Mutation report</span></a></li> 
             <li><a href="<?php echo site_url('Out_going_monitoring_other');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Outgoing to Other report</span></a></li> 
              <li><a href="<?php echo site_url('receiving_good');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Receiving Goods</span></a></li>            
              <li><a href="<?php echo site_url('inventory_warehouse');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
              <li><a href="<?php echo site_url('inventory_real_time');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time</span></a></li>
              <li><a href="<?php echo site_url('inventory_real_time/index_mobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time Mobile</span></a></li>
              <li><a href="<?php echo site_url('monitoring_matching_inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Matching Inventory</span></a></li>
              <li><a href="<?php echo site_url('mon_out_draft_to_do');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Draft To DO</span></a></li>
              <li><a href="<?php echo site_url('stock_card_delivery');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Card for Delivery</span></a></li>
              <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
              <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
              <li><a href="<?php echo site_url('Mon_deadly_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock</span></a></li>
              <li><a href="<?php echo site_url('Mon_deadly_stock_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock Monthly</span></a></li>
              <li><a href="<?php echo site_url('Mon_missing_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Missing Stock</span></a></li>
              <li><a href="<?php echo site_url('status_stock_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Status Stock Monthly</span></a></li>
            <!--  <li><a href="<?php // echo site_url('stock_opname');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Opname</span></a></li> -->
              
               
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-cubes"></i> <span>Raking</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('rakLine');?>"><i class="fa fa-chevron-circle-right"></i> <span>Line</span></a></li>
              <li><a href="<?php echo site_url('Setup_max_raking_capacity_item');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Max Rack Item</span></a></li>
              <li><a href="<?php echo site_url('Setup_plot_raking_item');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Mapping Rack Item</span></a></li>
              <li><a href="<?php echo site_url('Raking_scan_in/indexForx');?>"><i class="fa fa-chevron-circle-right"></i> <span>Scan In</span></a></li>
              <li><a href="<?php echo site_url('Raking_scan_out');?>"><i class="fa fa-chevron-circle-right"></i> <span>Scan Out</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_raking');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_raking_scan_out');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Scan Out</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_inventory_vs_racking_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Vs Inventory</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_raking/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Mobile</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_BSTHP_R_T_raking');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Receive To Racking</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_Employee_dis_ware_mon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Emply Distri Ware Monthly</span></a></li>
              <li><a href="<?php echo site_url('Racking_monthly_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Raking Monthly Report</span></a></li>
            </ul>
          </li> 
          <li class="treeview">
            <a href="#"><i class="fa fa-money"></i> <span>Finance Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('Invoice_to_FP');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice To FP</span></a></li>
              <li><a href="<?php echo site_url('Invoice_to_FP_monitor');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice To FP</span></a></li>
            </ul>
          </li>
          <?php 
          }
          ?>
           <?php
          if($this->session->userdata('role')=="Delivery Order P"){
          ?> 
          <li class="treeview">
            <a href="#"><i class="fa fa-user"></i> <span>Delivery Order</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
              <li><a href="<?php echo site_url('confirmOK');?>"><i class="fa fa-chevron-circle-right"></i> <span>DO Confimation</span></a></li>
            </ul>
          </li>
         <?php } 
          if($this->session->userdata('role')=="Delivery Order"){
          ?> 
          <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
                <li><a href="<?php echo site_url('delivery_order');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order</span></a></li>
                <li><a href="<?php echo site_url('delivery_Order_tool');?>"><i class="fa fa-chevron-circle-right"></i> <span>DO Tool / Rent</span></a></li>
                <li><a href="<?php echo site_url('delivery_order_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retur</span></a></li>
             </ul>
          </li>
          <li class="treeview">
              <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('monitoring_schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Schedule</span></a></li>
                 <li><a href="<?php echo site_url('Mon_balance_scd_cis');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Schedule Vs PO</span></a></li>
                <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Confirm</span></a></li>
                <li><a href="<?php echo site_url('monitorDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO</span></a></li>
                <li><a href="<?php echo site_url('monitorDoDelete');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Delete DO</span></a></li> 
                <li><a href="<?php echo site_url('monitoring_pending_data_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Pending V 2.0 </span></a></li>
                <li><a href="<?php echo site_url('monitoring_pending_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base Outgoing</span></a></li>
                <li><a href="<?php echo site_url('Detail_delivery_cost_per_date');?>"><i class="fa fa-chevron-circle-right"></i> <span>Detail delivery cost</span></a></li>
                <li><a href="<?php echo site_url('Pending_Delivery_Monthly_Report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Report Pending Monthly </span></a></li>
                <li><a href="<?php echo site_url('delivery_quota');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota</span></a></li>
                <li><a href="<?php echo site_url('delivery_status');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status</span></a></li>
                 <li><a href="<?php echo site_url('Delivery_Status_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status V 2.0</span></a></li>
                <li><a href="<?php echo site_url('Stock_card_for_ppic');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Card PPIC</span></a></li>
                <li><a href="<?php echo site_url('monitoring_forecast');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Forecast</span></a></li>
                <li><a href="<?php echo site_url('monitoring_forecast_outstanding');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Forecast Outstanding</span></a></li>
              </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo site_url('inventory_warehouse');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
                <li><a href="<?php echo site_url('inventory_real_time');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time</span></a></li>
                <li><a href="<?php echo site_url('inventory_real_time/index_mobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time Mobile</span></a></li>
                <li><a href="<?php echo site_url('monitoring_matching_inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Matching Inventory</span></a></li>
                <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
                <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
                <li><a href="<?php echo site_url('Mon_deadly_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock</span></a></li>
                <li><a href="<?php echo site_url('Mon_deadly_stock_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock Monthly</span></a></li>
                <li><a href="<?php echo site_url('Mon_missing_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Missing Stock</span></a></li>
                <li><a href="<?php echo site_url('receiving_good');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Receiving Goods</span></a></li>
                
                <li><a href="<?php echo site_url('monitoring_revisi_outgoing');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Mon Out going Rev</span></a></li> 
                <li><a href="<?php echo site_url('outgoing_finished_verification/indexDone');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Outgoing F G Ver Done</span></a></li>
                <li><a href="<?php echo site_url('outgoing_finished_verification/monitoringOutVerMonNG');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Outgoing FG Ver NG</span></a></li>
                <li><a href="<?php echo site_url('monitoring_bsthp_no_ver');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor BSTHP Unverify</span></a></li>
                <li><a href="<?php echo site_url('outgoing_finished_verification/monitoringOutVerMon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Outgoing FG Ver</span></a></li>
                <li><a href="<?php echo site_url('Out_going_monitoring_mutation');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going Mutation report</span></a></li>
                <li><a href="<?php echo site_url('Out_going_monitoring');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going report</span></a></li>
                <li><a href="<?php echo site_url('Out_going_monitoring_other');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going Other report</span></a></li> 
                <li><a href="<?php echo site_url('Out_going_monitoring_to_del');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing TO DO Report</span></a></li>
                <li><a href="<?php echo site_url('status_stock_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Status Stock Monthly</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Retur Product</span></a></li>
                
            </ul>
          </li>
         <?php }
          if($this->session->userdata('role')=="Sales Head"){
          ?> 
          <li class="treeview">
            <a href="#"><i class="fa fa-user"></i> <span>Employee Management</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
              <li><a href="<?php echo site_url('marketing_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Marketing Data</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-database"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('department');?>"><i class="fa fa-chevron-circle-right"></i> <span>Department</span></a></li>
              <li><a href="<?php echo site_url('section');?>"><i class="fa fa-chevron-circle-right"></i> <span>Section</span></a></li>
              <li><a href="<?php echo site_url('position');?>"><i class="fa fa-chevron-circle-right"></i> <span>Position</span></a></li>
              <li><a href="<?php echo site_url('group');?>"><i class="fa fa-chevron-circle-right"></i> <span>Group</span></a></li>
              <li><a href="<?php echo site_url('bank_reference');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bank Reference</span></a></li>
              <li><a href="<?php echo site_url('Competitor');?>"><i class="fa fa-chevron-circle-right"></i> <span>Competitor</span></a></li>
              <li><a href="<?php echo site_url('Productivity_standart');?>"><i class="fa fa-chevron-circle-right"></i> <span>Productivity Standart</span></a></li>
              
            </ul>
          </li> 
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>New Item</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('customer_information');?>"><i class="fa fa-chevron-circle-right"></i> <span>Customer Information</span></a></li>
              <li><a href="<?php echo site_url('customer_list');?>"><i class="fa fa-chevron-circle-right"></i> <span>Customer List</span></a></li>
              <li><a href="<?php echo site_url('new_item_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>Item Master</span></a></li>
              <li><a href="<?php echo site_url('rfq_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Master</span></a></li>
              <li><a href="<?php echo site_url('request_quotation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Request for Quotation</span></a></li>
              <li><a href="<?php echo site_url('rfqmonitoring');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Monitoring</span></a></li>
              <li><a href="<?php echo site_url('breakdown_cost');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Cost</span></a></li>
              <li><a href="<?php echo site_url('breakrep');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Report</span></a></li>
              <li><a href="<?php echo site_url('quotation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation</span></a></li>
              <li><a href="<?php echo site_url('price_update');?>"><i class="fa fa-chevron-circle-right"></i> <span>Price Update</span></a></li>
              <li><a href="<?php echo site_url('historyprice');?>"><i class="fa fa-chevron-circle-right"></i> <span>History Price</span></a></li>
               <li><a href="<?php echo site_url('quotationmon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation Monitoring</span></a></li>
              <li><a href="<?php echo site_url('Item_dev_1');?>"><i class="fa fa-chevron-circle-right"></i> <span>New Item (LOI)</span></a></li>
              <li><a href="<?php echo site_url('mon_doc_ext_drawing');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Doc Ext Draw</span></a></li>
              <li><a href="<?php echo site_url('doc_new_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Doc New Product</span></a></li>
              <li><a href="<?php echo site_url('project');?>"><i class="fa fa-chevron-circle-right"></i> <span>Failed Project</span></a></li>
              <li><a href="<?php echo site_url('cost_of_delivery_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Cost Of Delivery Product</span></a></li>
              <li><a href="<?php echo site_url('monitoring_price_by_code');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Price By Code</span></a></li>

            </ul>
          </li>
          
          <li class="treeview">
            <a href="#"><i class="fa fa-file"></i> <span>Regular</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan</span></a></li>
              <li><a href="<?php echo site_url('pesanan/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan NT</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Monitor</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Detail Monitor</span></a></li>
               <li><a href="<?php echo site_url('Monitoring_pesanan_ppic');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO PPIC</span></a></li>
               <li><a href="<?php echo site_url('monitoring_po_to_os');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO OS Monitor</span></a></li>
               <li><a href="<?php echo site_url('monitoring_po_balance');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Balance</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_loss_PO');?>"><i class="fa fa-chevron-circle-right"></i> <span>MON Close PO ABNORMAL</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan_ppic/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC</span></a></li>
              <li><a href="<?php echo site_url('retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur Product V 2.1</span></a></li>
               <li><a href="<?php echo site_url('Monitoring_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Retur Product</span></a></li>
              <li><a href="<?php echo site_url('order_sheet');?>"><i class="fa fa-chevron-circle-right"></i> <span>Order Sheet</span></a></li>
              <li><a href="<?php echo site_url('order_sheet/monitoringSales');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Order Sheet Group</span></a></li>
              <li><a href="<?php echo site_url('order_sheet/monitoringSalesPerItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Order Sheet All</span></a></li>
             <li><a href="<?php echo site_url('delivery_order');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order</span></a></li>
             <li><a href="<?php echo site_url('Delivery_Order_PL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Packing List</span></a></li>
             <li><a href="<?php echo site_url('delivery_Order_tool');?>"><i class="fa fa-chevron-circle-right"></i> <span>DO Tool / Rent</span></a></li>
             <li><a href="<?php echo site_url('delivery_order_sewa');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Sewa old</span></a></li>
              <li><a href="<?php echo site_url('delivery_order_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retur</span></a></li>
              <li><a href="<?php echo site_url('monitorDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO</span></a></li>
              <li><a href="<?php echo site_url('monitorDoF');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Do Finance</span></a></li>
              <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Confirm</span></a></li>
               <li><a href="<?php echo site_url('monitorDoDelete');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Delete DO</span></a></li>
              <li><a href="<?php echo site_url('invoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice</span></a></li>
              <li><a href="<?php echo site_url('invoiceRETAIL/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice Retail</span></a></li>
              <li><a href="<?php echo site_url('monitorInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice</span></a></li>
              <li><a href="<?php echo site_url('monitoring_invo_detail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice Detail</span></a></li>
              <li><a href="<?php echo site_url('invoice/monitoringDeleteInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice</span></a></li>
              <li><a href="<?php echo site_url('invoice/monitoringDeleteInvoiceDetailDO');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice DO</span></a></li> 
              <li><a href="<?php echo site_url('mon_produktifitas');?>"><i class="fa fa-chevron-circle-right"></i> <span>MON Produktifitas</span></a></li>
              <li><a href="<?php echo site_url('mon_produktifitas_resume');?>"><i class="fa fa-chevron-circle-right"></i> <span>MON Produktifitas Resume</span></a></li>
            </ul>
          </li>
           <!-- <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Sales Report</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
              <li><a href="<?php// echo site_url('monthly_marketing_sales_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Marketing</span></a></li>
              
             
            </ul>
          </li> -->
          <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule</span></a></li> 
              <!-- <li><a href="<?php// echo site_url('schedule/dsTracking');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Tracking </span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('schedule/dsTrackingByOs');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Tracking By OS</span></a></li> -->
              <li><a href="<?php echo site_url('delivery_status');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status</span></a></li>
              <li><a href="<?php echo site_url('Delivery_Status_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status V 2.0</span></a></li>
              <!-- <li><a href="<?php// echo site_url('vehicle');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota Setup</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('delivery_quota');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('mutation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mutation Item</span></a></li>               -->
              <!-- <li><a href="<?php// echo site_url('mutation_item/monitoring');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mutation Item Monitoring</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('Inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('Inventory/indexCodeItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory By Code Item</span></a></li> -->
              <li><a href="<?php echo site_url('monitoring_pending_data_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Pending V 2.0 </span></a></li>
              <li><a href="<?php echo site_url('monitoring_pending_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base Outgoing</span></a></li>
              <li><a href="<?php echo site_url('Detail_delivery_cost_per_date');?>"><i class="fa fa-chevron-circle-right"></i> <span>Detail delivery cost</span></a></li>
              <!-- <li><a href="<?php //echo site_url('monitoring_pending_data_base_os---');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Data Pending OS</span></a></li> -->
             </ul>
          </li> 
           <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">s
              <li><a href="<?php echo site_url('inventory_warehouse');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
              <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
              <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
            </ul>
           </li>
          <?php 
          }
          ?>
          <?php
          if($this->session->userdata('role')=="Sales New Item NT"){
          ?>  
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>New Item Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('joint_retail_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>Master Join</span></a></li>
              <li><a href="<?php echo site_url('customer_informationNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Customer Information</span></a></li>
              <li><a href="<?php echo site_url('new_item_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>Item Master</span></a></li>
              
              <li><a href="<?php echo site_url('rfq_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Master</span></a></li>
              <li><a href="<?php echo site_url('request_quotationNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Request for Quotation</span></a></li>
              <li><a href="<?php echo site_url('breakdown_costNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Cost</span></a></li>
              <li><a href="<?php echo site_url('BreakrepNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Report Retail</span></a></li>
              <li><a href="<?php echo site_url('quotationNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation</span></a></li>
              <li><a href="<?php echo site_url('itemNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>New Item (LOI)</span></a></li>
              <li><a href="<?php echo site_url('ProjectNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Failed Project Retail</span></a></li>
               <li><a href="<?php echo site_url('quotationmonRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation Mon Retail</span></a></li>
               <li><a href="<?php echo site_url('rfqmonitoringRetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Mon Retail</span></a></li>
              <li><a href="<?php echo site_url('Update_price_by_code');?>"><i class="fa fa-chevron-circle-right"></i> <span>Update Price By Coding</span></a></li>
            </ul>
          </li>
          
          <li class="treeview">
            <a href="#"><i class="fa fa-file"></i> <span>Regular Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('pesanan/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan NT</span></a></li>

              <li><a href="<?php echo site_url('delivery_orderRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retail</span></a></li>
              <li><a href="<?php echo site_url('monitorDoRetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Retail</span></a></li>
              <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Delivery Order Confirm</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO PPIC Retail</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC Retail</span></a></li>
             <!--  <li><a href="<?php // echo site_url('InvoiceRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice NT</span></a></li> -->
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Sales Report Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
              <li><a href="<?php echo site_url('sales_report_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Sales Report Retail</span></a></li>
            </ul>
          </li>
         <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('scheduleNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Retail</span></a></li>
               <li><a href="<?php echo site_url('monitoring_pending_data_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Data Pending Retail</span></a></li> 

             </ul>
          </li>
         <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('outgoing_finishedNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Retail</span></a></li>
               <li><a href="<?php echo site_url('outgoing_retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Retur Retail</span></a></li>
               <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
               <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
            </ul>
          </li>
          <?php 
          }
          ?>
          <?php
          if($this->session->userdata('role')=="Sales New Item"){
          ?>  
           <li class="treeview">
            <a href="#"><i class="fa fa-user"></i> <span>Employee Management</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
              <li><a href="<?php echo site_url('marketing_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Marketing Data</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-database"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('department');?>"><i class="fa fa-chevron-circle-right"></i> <span>Department</span></a></li>
              <li><a href="<?php echo site_url('section');?>"><i class="fa fa-chevron-circle-right"></i> <span>Section</span></a></li>
              <li><a href="<?php echo site_url('position');?>"><i class="fa fa-chevron-circle-right"></i> <span>Position</span></a></li>
              <li><a href="<?php echo site_url('group');?>"><i class="fa fa-chevron-circle-right"></i> <span>Group</span></a></li>
              <li><a href="<?php echo site_url('bank_reference');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bank Reference</span></a></li>
              <li><a href="<?php echo site_url('Competitor');?>"><i class="fa fa-chevron-circle-right"></i> <span>Competitor</span></a></li>
              
            </ul>
          </li>
         <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>New Item</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('customer_information');?>"><i class="fa fa-chevron-circle-right"></i> <span>Customer Information</span></a></li>
              <li><a href="<?php echo site_url('customer_list');?>"><i class="fa fa-chevron-circle-right"></i> <span>Customer List</span></a></li>
              <li><a href="<?php echo site_url('new_item_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>Item Master</span></a></li>
              <li><a href="<?php echo site_url('rfq_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Master</span></a></li>
              <li><a href="<?php echo site_url('request_quotation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Request for Quotation</span></a></li>
              <li><a href="<?php echo site_url('rfqmonitoring');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Monitoring</span></a></li>
              <li><a href="<?php echo site_url('breakdown_cost');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Cost</span></a></li>
              <li><a href="<?php echo site_url('breakrep');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Report</span></a></li>
              <li><a href="<?php echo site_url('quotation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation</span></a></li>
              <li><a href="<?php echo site_url('price_update');?>"><i class="fa fa-chevron-circle-right"></i> <span>Price Update</span></a></li>
              <li><a href="<?php echo site_url('historyprice');?>"><i class="fa fa-chevron-circle-right"></i> <span>History Price</span></a></li>
               <li><a href="<?php echo site_url('quotationmon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation Monitoring</span></a></li>
              <li><a href="<?php echo site_url('Item_dev_1');?>"><i class="fa fa-chevron-circle-right"></i> <span>New Item (LOI)</span></a></li>
              <li><a href="<?php echo site_url('mon_doc_ext_drawing');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Doc Ext Draw</span></a></li>
              <li><a href="<?php echo site_url('doc_new_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Doc New Product</span></a></li>
              <li><a href="<?php echo site_url('project');?>"><i class="fa fa-chevron-circle-right"></i> <span>Failed Project</span></a></li>
              <li><a href="<?php echo site_url('cost_of_delivery_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Cost Of Delivery Product</span></a></li>
              <li><a href="<?php echo site_url('monitoring_price_by_code');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Price By Code</span></a></li>

            </ul>
          </li>
           <li class="treeview">
            <a href="#"><i class="glyphicon glyphicon-briefcase"></i> <span>Purchase Order</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan</span></a></li>
              <li><a href="<?php echo site_url('pesanan/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan NT</span></a></li>
              
            </ul>
          </li>
         <!--  <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php// echo site_url('outgoing_finished');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G</span></a></li>
            </ul>
           </li> -->
          <?php 
          }
          ?>
          <?php
          if($this->session->userdata('role')=="Finance Head" || $this->session->userdata('role')=="Finance"){
          ?> 
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>New Item</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('customer_information');?>"><i class="fa fa-chevron-circle-right"></i> <span>Customer Information</span></a></li>
            </ul>
          </li> 
          <li class="treeview">
            <a href="#"><i class="glyphicon glyphicon-briefcase"></i> <span>Purchase Order</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo site_url('pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan</span></a></li>
                <li><a href="<?php echo site_url('pesanan/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan NT</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Monitor</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Detail Monitor</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO PPIC Retail</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC Retail</span></a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-truck"></i> <span>Delivery</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo site_url('retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur Product V 2.1</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Retur Product</span></a></li>
                <li><a href="<?php echo site_url('delivery_order');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order</span></a></li>
                <li><a href="<?php echo site_url('delivery_orderRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retail</span></a></li>
                <li><a href="<?php echo site_url('delivery_Order_tool');?>"><i class="fa fa-chevron-circle-right"></i> <span>DO Tool / Rent</span></a></li>
                <li><a href="<?php echo site_url('delivery_Order_cl');?>"><i class="fa fa-chevron-circle-right"></i> <span>Covering Letter</span></a></li>
                <li><a href="<?php echo site_url('delivery_Order_tool');?>"><i class="fa fa-chevron-circle-right"></i> <span>DO Tool / Rent</span></a></li>
                <li><a href="<?php echo site_url('delivery_order_sewa');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Sewa old</span></a></li>
                <li><a href="<?php echo site_url('delivery_order_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retur</span></a></li>
                <li><a href="<?php echo site_url('monitorDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO</span></a></li>
                <li><a href="<?php echo site_url('monitorDoF');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Do Finance</span></a></li>
                <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Confirm</span></a></li>
                <li><a href="<?php echo site_url('monitorDoDelete');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Delete DO</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-calculator"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo site_url('invoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice</span></a></li>
               <li><a href="<?php echo site_url('invoiceRETAIL/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice Retail</span></a></li>
                 <li><a href="<?php echo site_url('monitorInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice</span></a></li>
                <li><a href="<?php echo site_url('monitoring_invo_detail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice Detail</span></a></li>
                <li><a href="<?php echo site_url('invoice/monitoringDeleteInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice</span></a></li>
                <li><a href="<?php echo site_url('invoice/monitoringDeleteInvoiceDetailDO');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice DO</span></a></li> 
                <li><a href="<?php echo site_url('Delivery_Order_mon_F');?>"><i class="fa fa-chevron-circle-right"></i> <span>Confirm Do Finance</span></a></li>
                <li><a href="<?php echo site_url('confirmFinance_Scan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Confirm Do Finance Scan</span></a></li>
                <li><a href="<?php echo site_url('Invoice_to_FP');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice To FP</span></a></li>
                <li><a href="<?php echo site_url('Invoice_to_FP_monitor');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice To FP</span></a></li>
            </ul>
          </li>
           <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Sales Report</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
              <li><a href="<?php echo site_url('monthly_marketing_sales_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Marketing</span></a></li>
             
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('delivery_status');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status</span></a></li>
              <li><a href="<?php echo site_url('Delivery_Status_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status V 2.0</span></a></li>
              <li><a href="<?php echo site_url('Inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
              <li><a href="<?php echo site_url('Inventory/indexCodeItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory By Code Item</span></a></li>
              <li><a href="<?php echo site_url('monitoring_pending_data_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Pending V 2.0 </span></a></li>
              <li><a href="<?php echo site_url('monitoring_pending_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base Outgoing</span></a></li>
              <li><a href="<?php echo site_url('Detail_delivery_cost_per_date');?>"><i class="fa fa-chevron-circle-right"></i> <span>Detail delivery cost</span></a></li>
             </ul>
          </li> 
          <?php 
          }
          ?>
          <?php
          if($this->session->userdata('role')=="Sales Regular"){
          ?>  
          <li class="treeview">
            <a href="#"><i class="fa fa-file"></i> <span>Regular</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan</span></a></li>
              <li><a href="<?php echo site_url('pesanan/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan NT</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Monitor</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Detail Monitor</span></a></li>
             <li><a href="<?php echo site_url('retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur Product V 2.1</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Retur Product</span></a></li>
              <li><a href="<?php echo site_url('order_sheet');?>"><i class="fa fa-chevron-circle-right"></i> <span>Order Sheet</span></a></li>
              <!-- <li><a href="<?php// echo site_url('order_sheet/monitoringSales');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Order Sheet Group</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('order_sheet/monitoringSalesPerItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Order Sheet All</span></a></li> -->
             // <!-- <li><a href="<?php// echo site_url('delivery_order');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order</span></a></li> -->
             <!-- <li><a href="<?php //echo site_url('delivery_order_sewa');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Sewa</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('delivery_order_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retur</span></a></li> -->
              <li><a href="<?php echo site_url('monitorDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO</span></a></li>
              <li><a href="<?php echo site_url('monitorDoF');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Do Finance</span></a></li>
              <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Confirm</span></a></li>
              <!-- <li><a href="<?php// echo site_url('monitorDoDelete');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Delete DO</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('invoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('invoiceRETAIL/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Invoice Retail</span></a></li> -->s
               <!-- <li><a href="<?php //echo site_url('monitorInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('monitoring_invo_detail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice Detail</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('invoice/monitoringDeleteInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice</span></a></li> -->
              <!-- <li><a href="<?php //echo site_url('invoice/monitoringDeleteInvoiceDetailDO');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice DO</span></a></li>  -->
              <!-- <li><a href="<?php// echo site_url('Delivery_Order_mon_F');?>"><i class="fa fa-chevron-circle-right"></i> <span>Confirm Do Finance</span></a></li> -->
            </ul>
          </li>
           <!-- <li class="treeview"> -->
            <!-- <a href="#"><i class="fa fa-bar-chart"></i> <span>Sales Report</span> <i class="fa fa-angle-left pull-right"></i></a> -->
            <!-- <ul class="treeview-menu"> -->
              
              <!-- <li><a href="<?php //echo site_url('monthly_marketing_sales_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Marketing</span></a></li> -->
             
            <!-- </ul> -->
          <!-- </li> -->
          <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule</span></a></li> 
              <!-- <li><a href="<?php //echo site_url('schedule/dsTracking');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Tracking </span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('schedule/dsTrackingByOs');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Tracking By OS</sspan></a></li> -->
              <li><a href="<?php echo site_url('delivery_status');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status</span></a></li>
              <li><a href="<?php echo site_url('Delivery_Status_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status V 2.0</span></a></li>
              <!-- <li><a href="<?php //echo site_url('vehicle');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota Setup</span></a></li> -->
              <!-- <li><a href="<?php //echo site_url('delivery_quota');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('mutation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mutation Item</span></a></li>               -->
              <!-- <li><a href="<?php //echo site_url('mutation_item/monitoring');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mutation Item Monitoring</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('Inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('Inventory/indexCodeItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory By Code Item</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('monitoring_pending_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Data Pending</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('monitoring_pending_data_base_os---');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Data Pending OS</span><s/a></li> -->
             </ul>
          </li> 
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">s
              <li><a href="<?php echo site_url('inventory_warehouse');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
              <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
              <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
              <li><a href="<?php echo site_url('Detail_delivery_cost_per_date');?>"><i class="fa fa-chevron-circle-right"></i> <span>Detail delivery cost</span></a></li>
            </ul>
           </li>
          <?php 
          }
          ?>
          <?php
          if($this->session->userdata('role')=="Marketing"){
          ?>
          <!-- Marketing Menus start -->
          <li class="treeview">
            <a href="#"><i class="fa fa-file-archive-o"></i> <span>Marketing Report</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('quantity');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quantity & Tooling</span></a></li>
              <li><a href="<?php echo site_url('tooling');?>"><i class="fa fa-chevron-circle-right"></i> <span>Tooling Monitoring</span></a></li>
              <li><a href="<?php echo site_url('report_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Report</span></a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule</span></a></li> 
              <li><a href="<?php echo site_url('schedule/dsTracking');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Tracking </span></a></li>
              <!-- <li><a href="<?php // echo site_url('schedule/dsTrackingByOs');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Tracking By OS</span></a></li> -->
              <li><a href="<?php echo site_url('order_sheet');?>"><i class="fa fa-chevron-circle-right"></i> <span>Order Sheet</span></a></li>
              <!-- <li><a href="<?php // echo site_url('order_sheet/monitoringSales');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Order Sheet Group</span></a></li> -->
              <!-- <li><a href="<?php // echo site_url('order_sheet/monitoringSalesPerItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Order Sheet All</span></a></li> -->
             <li><a href="<?php echo site_url('delivery_order');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order</span></a></li>
             <li><a href="<?php echo site_url('Delivery_Order_PL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Packing List</span></a></li>
             <li><a href="<?php echo site_url('delivery_Order_cl');?>"><i class="fa fa-chevron-circle-right"></i> <span>Covering Letter</span></a></li>
             <li><a href="<?php echo site_url('delivery_Order_tool');?>"><i class="fa fa-chevron-circle-right"></i> <span>DO Tool / Rent</span></a></li>
             <!-- <li><a href="<?php // echo site_url('delivery_order_sewa');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Sewa</span></a></li> -->
              <!-- <li><a href="<?php // echo site_url('delivery_order_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retur</span></a></li> -->
              <li><a href="<?php echo site_url('monitorDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO</span></a></li>
              <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Confirm</span></a></li>
              <li><a href="<?php echo site_url('monitorDoDelete');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Delete DO</span></a></li>
              <!-- <li><a href="<?php // echo site_url('schedule_closing');?>"><i class="fa fa-chevron-circle-right"></i> <span>Closing Schedule</span></a></li> -->
              <!-- <li><a href="<?php // echo site_url('schedule_closing_mon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Closing Schedule</span></a></li> -->
              <li><a href="<?php echo site_url('delivery_status');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status</span></a></li>
              <li><a href="<?php echo site_url('Delivery_Status_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status V 2.0</span></a></li>
              <!-- <li><a href="<?php // echo site_url('vehicle');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota Setup</span></a></li> -->
              <li><a href="<?php echo site_url('delivery_quota');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota</span></a></li>
             
              <li><a href="<?php echo site_url('monthly_loss_delivery');?>"><i class="fa fa-chevron-circle-right"></i> <span>Loss Quota</span></a></li>

              <li><a href="<?php echo site_url('Detail_delivery_cost_per_date');?>"><i class="fa fa-chevron-circle-right"></i> <span>Detail delivery cost</span></a></li>

              <li><a href="<?php echo site_url('monitoring_pending_data_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Pending V 2.0 </span></a></li>
              <li><a href="<?php echo site_url('monitoring_pending_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base Outgoing</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pending_data_base_do');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base DO</span></a></li>
              <li><a href="<?php echo site_url('Pending_Delivery_Monthly_Report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Report Pending Monthly </span></a></li>
             </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('receiving_good');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Receiving Goods</span></a></li>            
              <li><a href="<?php echo site_url('monitoring_bsthp_no_ver');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor BSTHP Unverify</span></a></li>
              <li><a href="<?php echo site_url('Out_going_monitoring');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going report</span></a></li> 
              <li><a href="<?php echo site_url('monitoring_revisi_outgoing');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Mon Out going Rev</span></a></li> 
              <li><a href="<?php echo site_url('Out_going_monitoring_mutation');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going Mutation report</span></a></li> 
              <li><a href="<?php echo site_url('Out_going_monitoring_other');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going Other report</span></a></li> 
              <li><a href="<?php echo site_url('inventory_warehouse');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
              <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
              <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
              <li><a href="<?php echo site_url('Mon_deadly_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock</span></a></li>
              <li><a href="<?php echo site_url('Mon_deadly_stock_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock Monthly</span></a></li>
              <li><a href="<?php echo site_url('Mon_missing_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Missing Stock</span></a></li>
              <!-- <li><a href="<?php // echo site_url('outgoing_finished');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G</span></a></li> -->
               <li><a href="<?php echo site_url('outgoing_finished_verification/monitoringOutVerMonNG');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver Mon NG</span></a></li>
                <li><a href="<?php echo site_url('Outgoing_finished_ver_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver Retur</span></a></li>
               <li><a href="<?php echo site_url('outgoing_finished_verification/indexDone');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Outgoing F G Ver Done</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Raking</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('Monitoring_raking');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_raking_scan_out');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Scan Out</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_raking/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Mobile</span></a></li>
            </ul>
          </li>

          <!-- Marekting Menus end -->

          <?php 
          }
          ?>
           <?php
          if($this->session->userdata('role')=="Production" OR $this->session->userdata('role')=="Production Head"){
          ?>
            <li class="treeview">
            <a href="#"><i class="fa fa-gears"></i> <span>Production</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <?php
                if ($this->session->userdata('role')=="Production Head") { ?>
                   <li><a href="<?php echo site_url('user_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>User Data</span></a></li>
        <?php   }
              ?>
              <li><a href="<?php echo site_url('employee');?>"><i class="fa fa-chevron-circle-right"></i> <span>Employee</span></a></li>
              <li><a href="<?php echo site_url('Item_monitoring');?>"><i class="fa fa-chevron-circle-right"></i> <span>Item List</span></a></li>
              <li><a href="<?php echo site_url('label');?>"><i class="fa fa-chevron-circle-right"></i> <span>Label</span></a></li>
              <li><a href="<?php echo site_url('bsthp');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP</span></a></li>
             
             
          
            
               <li><a href="<?php echo site_url('label/barcodeSetting');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setting Print Barcode</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-tv"></i> <span>Production Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
              
              <li><a href="<?php echo site_url('Inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
              <li><a href="<?php echo site_url('Inventory/indexCodeItem');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory By Code Item</span></a></li>
              <li><a href="<?php echo site_url('receiving_good');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Receiving Goods</span></a></li>  
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
                <li><a href="<?php echo site_url('schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule</span></a></li>
                <li><a href="<?php echo site_url('order_sheet');?>"><i class="fa fa-chevron-circle-right"></i> <span>Order Sheet</span></a></li>
                <li><a href="<?php echo site_url('delivery_order');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order</span></a></li>           
             </ul>
          </li>
          <li class="treeview">
              <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('monitoring_pending_data_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Pending V 2.0 </span></a></li>
                <li><a href="<?php echo site_url('monitoring_pending_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base Outgoing</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pending_data_base_do');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base DO</span></a></li>
              </ul>
          </li> 
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('Out_going_monitoring');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Outgoing report</span></a></li> 
              <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
              <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
              <li><a href="<?php echo site_url('inventory_warehouse');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
              <li><a href="<?php echo site_url('inventory_real_time');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time</span></a></li>
              <li><a href="<?php echo site_url('inventory_real_time/index_mobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time Mobile</span></a></li>
              <li><a href="<?php echo site_url('monitoring_matching_inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Matching Inventory</span></a></li>
             
            </ul>
          </li>
          <?php 
          }
          ?>

          <?php
          if($this->session->userdata('role')=="PPIC Delivery" OR $this->session->userdata('role')=="PPIC Delivery Head"){
          ?>
             <li class="treeview">
              <a href="#"><i class="fa fa-file"></i> <span>Regular</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <?php
                if ($this->session->userdata('role')=="PPIC Delivery Head") { ?>
                   <li><a href="<?php echo site_url('user_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>User Data</span></a></li>
            <?php   }
                ?>
                <li><a href="<?php echo site_url('employee');?>"><i class="fa fa-chevron-circle-right"></i> <span>Employee</span></a></li>
                <li><a href="<?php echo site_url('reviewPO');?>"><i class="fa fa-chevron-circle-right"></i> <span>Review PO</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan_ppic');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO  PPIC</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan_ppic/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC</span></a></li>
                <li><a href="<?php echo site_url('monitoring_po_to_os');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO OS Monitor</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC Retail</span></a></li>
               <li><a href="<?php echo site_url('retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur Product V 2.1</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Retur Product</span></a></li>
                <li><a href="<?php echo site_url('confirmFinance_Scan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Confirm Do Finance Scan</span></a></li>
                <li><a href="<?php echo site_url('Delivery_Order_mon_F');?>"><i class="fa fa-chevron-circle-right"></i> <span>Confirm Do Finance</span></a></li>
                
              </ul>
            </li>
           <li class="treeview">
            <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
                <li><a href="<?php echo site_url('schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule</span></a></li>
                <li><a href="<?php echo site_url('order_sheet');?>"><i class="fa fa-chevron-circle-right"></i> <span>Order Sheet</span></a></li>
                <li><a href="<?php echo site_url('delivery_order');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order</span></a></li>
                <li><a href="<?php echo site_url('Delivery_Order_PL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Packing List</span></a></li>
                <li><a href="<?php echo site_url('delivery_Order_tool');?>"><i class="fa fa-chevron-circle-right"></i> <span>DO Tool / Rent</span></a></li>
                <li><a href="<?php echo site_url('delivery_order_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retur</span></a></li>
                <li><a href="<?php echo site_url('vehicle');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota Setup</span></a></li>
                <li><a href="<?php echo site_url('mutation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mutation Item</span></a></li>
                <li><a href="<?php echo site_url('Setup_minimum_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Minimum Stock</span></a></li>
                <li><a href="<?php echo site_url('Setup_forecast');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Forecast</span></a></li>              
             </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-truck" aria-hidden="true"></i><span>Auto Deliver Quota</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><span><font color="white" >Master</font> </span></li>
              <li><a href="<?php echo site_url('Master_data_cluster');?>"><i class="fa fa-chevron-circle-right"></i> <span>Cluster</span></a></li>
              <li><a href="<?php echo site_url('Master_data_employee');?>"><i class="fa fa-chevron-circle-right"></i> <span>Employee For PPIC</span></a></li>
              <li><a href="<?php echo site_url('Setup_truck_speed');?>"><i class="fa fa-chevron-circle-right"></i> <span>Truck Speed</span></a></li>
              <li><a href="<?php echo site_url('Setup_driver_to_truck');?>"><i class="fa fa-chevron-circle-right"></i> <span>Driver To Truck</span></a></li>
               <li><a href="<?php echo site_url('Setup_cluster_consument');?>"><i class="fa fa-chevron-circle-right"></i> <span>Cluster Customer</span></a></li>
               <li><a href="<?php echo site_url('Setup_truck_to_cluster');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Truck Cluster</span></a></li>
              <li><span><font color="white" >Transaction</font> </span></li>
               <li><a href="<?php echo site_url('generating_outgoing_scd');?>"><i class="fa fa-chevron-circle-right"></i> <span>Generate Outgoing</span></a></li>
              <li><span><font color="white" >Monitoring</font> </span></li>
               <li><a href="<?php echo site_url('Readiness_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Readiness Stock</span></a></li>
               <li><a href="<?php echo site_url('Monitoring_mapping_del');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon delivery Veh</span></a></li>
               <li><a href="<?php echo site_url('Loading_capacity_Veh');?>"><i class="fa fa-chevron-circle-right"></i> <span>Loading Cap Veh</span></a></li>
               <li><a href="<?php echo site_url('performance_delivery');?>"><i class="fa fa-chevron-circle-right"></i> <span>Performance Delivery</span></a></li>
            </ul>
          </li>
          <li class="treeview">
              <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('monitoring_schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Schedule</span></a></li>
                 <li><a href="<?php echo site_url('Mon_balance_scd_cis');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Schedule Vs PO</span></a></li>
                <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Confirm</span></a></li>
                <li><a href="<?php echo site_url('monitorDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO</span></a></li>
                <li><a href="<?php echo site_url('monitorDoDelete');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Delete DO</span></a></li> 
                <li><a href="<?php echo site_url('monitoring_pending_data_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Pending V 2.0 </span></a></li>
                <li><a href="<?php echo site_url('monitoring_pending_data');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base Outgoing</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pending_data_base_do');?>"><i class="fa fa-chevron-circle-right"></i> <span>Pending Base DO</span></a></li>
                <li><a href="<?php echo site_url('Detail_delivery_cost_per_date');?>"><i class="fa fa-chevron-circle-right"></i> <span>Detail delivery cost</span></a></li>
                <li><a href="<?php echo site_url('Pending_Delivery_Monthly_Report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Report Pending Monthly </span></a></li>
                <li><a href="<?php echo site_url('delivery_quota');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota</span></a></li>
                <li><a href="<?php echo site_url('delivery_status');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status</span></a></li>
                <li><a href="<?php echo site_url('Delivery_Status_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status V 2.0</span></a></li>
                <li><a href="<?php echo site_url('Stock_card_for_ppic');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Card PPIC</span></a></li>
                <li><a href="<?php echo site_url('monitoring_forecast');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Forecast</span></a></li>
                <li><a href="<?php echo site_url('monitoring_forecast_outstanding');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Forecast Outstanding</span></a></li>
              </ul>
          </li> 

          
          <?php 
          }
          ?>

          <?php
           if($this->session->userdata('role')=="Warehouse Delivery"){ ?>
              <li class="treeview">
                <a href="#"><i class="fa fa-building"></i> <span>Warehouse Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <!-- <li><a href="<?php // echo site_url('bsthp_verification/indexImpv');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification IMPV</span></a></li> -->
                    <li><a href="<?php echo site_url('bsthp_verification/indexImpv');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification</span></a></li>
                    
                    <li><a href="<?php echo site_url('BSTHP_Verification_mobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification Mobile</span></a></li>
                </ul>           
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-building"></i> <span>Warehouse Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('inventory_warehouse');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
                    <li><a href="<?php echo site_url('inventory_real_time');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time</span></a></li>
                    <li><a href="<?php echo site_url('inventory_real_time/index_mobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time Mobile</span></a></li>
                    <li><a href="<?php echo site_url('monitoring_matching_inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Matching Inventory</span></a></li>
                    <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
                    <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
                    <li><a href="<?php echo site_url('Mon_missing_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Missing Stock</span></a></li>
                    <li><a href="<?php echo site_url('receiving_good');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Receiving Goods</span></a></li>
                    <li><a href="<?php echo site_url('Out_going_monitoring');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Outgoing report</span></a></li> 
                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-building"></i> <span>Raking</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo site_url('Raking_scan_in/indexForx');?>"><i class="fa fa-chevron-circle-right"></i> <span>Scan In</span></a></li>
                  <li><a href="<?php echo site_url('Raking_scan_out');?>"><i class="fa fa-chevron-circle-right"></i> <span>Scan Out</span></a></li>
                  <li><a href="<?php echo site_url('Monitoring_raking');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking</span></a></li>
                  <li><a href="<?php echo site_url('Monitoring_raking_scan_out');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Scan Out</span></a></li>
                  <li><a href="<?php echo site_url('Monitoring_raking/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Mobile</span></a></li>
                  <li><a href="<?php echo site_url('Monitoring_inventory_vs_racking_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Vs Inventory</span></a></li>
                  <li><a href="<?php echo site_url('Monitoring_BSTHP_R_T_raking');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Receive To Racking</span></a></li>
                  <li><a href="<?php echo site_url('Monitoring_Employee_dis_ware_mon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Emply Distri Ware Monthly</span></a></li>
                  <li><a href="<?php echo site_url('Racking_monthly_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Raking Monthly Report</span></a></li>
                </ul>
              </li>
          <?php
          }
          if($this->session->userdata('role')=="Warehouse" OR $this->session->userdata('role')=="PPIC Delivery" OR $this->session->userdata('role')=="PPIC Delivery Head"){
          ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Confirm</span></a></li>
              </ul>
            </li>
         <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            
             <!-- <li><a href="<?php// echo site_url('Inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Prodcustion</span></a></li> -->
                        
              
             
              <!-- <li><a href="<?php// echo site_url('stock_card_delivery');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Card for Delivery</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('stock_card_in_out');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Card by In Out</span></a></li> -->
              <!-- <li><a href="<?php// echo site_url('stock_opname');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Opname</span></a></li>       -->
                
                <li><a href="<?php echo site_url('outgoing_finished');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G</span></a></li>
                 <!-- <li><a href="<?php echo site_url('mon_out_draft_to_do');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Out To DO</span></a></li> -->
                <li><a href="<?php echo site_url('outgoingFinishRev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G V 2.0</span></a></li>
                <li><a href="<?php echo site_url('outgoing_finished_good_other');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Others</span></a></li>
                <li><a href="<?php echo site_url('outgoing_retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Retur</span></a></li>
              
                <li><a href="<?php echo site_url('outgoing_finished_verification');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver</span></a></li>
                <li><a href="<?php echo site_url('Outgoing_finished_verification_v1_1');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver V 1.1</span></a></li>
                <li><a href="<?php echo site_url('Outgoing_finished_ver_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver Retur</span></a></li>

                <li><a href="<?php echo site_url('stock_opname_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Opname V 2.1</span></a></li>
                <li><a href="<?php echo site_url('mutation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mutation Item</span></a></li>         
                <li><a href="<?php echo site_url('retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur Product V 2.1</span></a></li>
                <!-- <li><a href="<?php // echo site_url('bsthp_verification/indexImpv');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification IMPV</span></a></li> -->
                <li><a href="<?php echo site_url('bsthp_verification/indexImpv');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification</span></a></li>
                
                <li><a href="<?php echo site_url('BSTHP_Verification_mobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Verification Mobile</span></a></li>

                <li><a href="<?php echo site_url('barcode_group');?>"><i class="fa fa-chevron-circle-right"></i> <span>Barcode Group</span></a></li>

            </ul>           
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Warehouse Monitoring</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo site_url('inventory_warehouse');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
                <li><a href="<?php echo site_url('inventory_real_time');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time</span></a></li>
                <li><a href="<?php echo site_url('inventory_real_time/index_mobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time Mobile</span></a></li>
                <li><a href="<?php echo site_url('monitoring_matching_inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Matching Inventory</span></a></li>
                <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
                <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
                <li><a href="<?php echo site_url('Mon_deadly_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock</span></a></li>
                <li><a href="<?php echo site_url('Mon_deadly_stock_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock Monthly</span></a></li>
                <li><a href="<?php echo site_url('Mon_missing_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Missing Stock</span></a></li>
                <li><a href="<?php echo site_url('receiving_good');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Receiving Goods</span></a></li>
                
                <li><a href="<?php echo site_url('monitoring_revisi_outgoing');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Mon Out going Rev</span></a></li> 
                 <li><a href="<?php echo site_url('mon_out_draft_to_do');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Draft To DO</span></a></li>
                <li><a href="<?php echo site_url('outgoing_finished_verification/indexDone');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Outgoing F G Ver Done</span></a></li>
                <li><a href="<?php echo site_url('outgoing_finished_verification/monitoringOutVerMonNG');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Outgoing FG Ver NG</span></a></li>
                <li><a href="<?php echo site_url('monitoring_bsthp_no_ver');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor BSTHP Unverify</span></a></li>
                <li><a href="<?php echo site_url('outgoing_finished_verification/monitoringOutVerMon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Outgoing FG Ver</span></a></li>
                <li><a href="<?php echo site_url('Out_going_monitoring_mutation');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going Mutation report</span></a></li>
                <li><a href="<?php echo site_url('Out_going_monitoring');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going report</span></a></li>
                <li><a href="<?php echo site_url('Out_going_monitoring_other');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going Other report</span></a></li> 
                <li><a href="<?php echo site_url('Out_going_monitoring_to_del');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing TO DO Report</span></a></li>
                <li><a href="<?php echo site_url('status_stock_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Status Stock Monthly</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Retur Product</span></a></li>
                
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Raking</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('rakLine');?>"><i class="fa fa-chevron-circle-right"></i> <span>Line</span></a></li>
              <li><a href="<?php echo site_url('Setup_max_raking_capacity_item');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Max Rack Item</span></a></li>
              <li><a href="<?php echo site_url('Setup_plot_raking_item');?>"><i class="fa fa-chevron-circle-right"></i> <span>Setup Mapping Rack Item</span></a></li>
              <li><a href="<?php echo site_url('Raking_scan_in/indexForx');?>"><i class="fa fa-chevron-circle-right"></i> <span>Scan In</span></a></li>
              <li><a href="<?php echo site_url('Raking_scan_out');?>"><i class="fa fa-chevron-circle-right"></i> <span>Scan Out</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_raking');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_raking_scan_out');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Scan Out</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_raking/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Mobile</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_BSTHP_R_T_raking');?>"><i class="fa fa-chevron-circle-right"></i> <span>BSTHP Receive To Racking</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_inventory_vs_racking_stock');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Raking Vs Inventory</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_Employee_dis_ware_mon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Emply Distri Ware Monthly</span></a></li>
              <li><a href="<?php echo site_url('Racking_monthly_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Raking Monthly Report</span></a></li>
            </ul>
          </li> 
      <?php
          if ($this->session->userdata('role')=="PPIC Delivery Head") { ?>
          <li class="treeview">
              <a href="#"><i class="fa fa-file"></i> <span>Regular Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO PPIC Retail</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC Retail</span></a></li>
                <li><a href="<?php echo site_url('delivery_orderRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retail</span></a></li>
                <li><a href="<?php echo site_url('monitorDoRetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Retail</span></a></li>
                <li><a href="<?php echo site_url('delivery_orderRETAIL/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon DO Confirm Retail</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('order_sheet/indexNT');?>"><i class="fa fa-chevron-circle-right"></i> <span>Order Sheet Retail</span></a></li>
                <li><a href="<?php echo site_url('scheduleNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Retail</span></a></li>
                <li><a href="<?php echo site_url('monitoring_pending_data_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Data Pending Retail</span></a></li>
               </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-building"></i> <span>Warehouse Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('outgoing_finishedNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Retail</span></a></li>
              </ul>
            </li>
      <?php   }
          }
          ?>

          <?php
          if($this->session->userdata('role')=="Manajemen"){
          ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Sales Report</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              
              <li><a href="<?php echo site_url('sales_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Sales Report</span></a></li>
              <li><a href="<?php echo site_url('monthly_marketing_sales_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Marketing Sales Report</span></a></li>
              <li><a href="<?php echo site_url('total_sales_monthly_analize');?>"><i class="fa fa-chevron-circle-right"></i> <span>Total Sales Monthly Analize</span></a></li>
              <li><a href="<?php echo site_url('total_marketing_sales_analize');?>"><i class="fa fa-chevron-circle-right"></i> <span>Total Marketing Sales Analize</span></a></li>
              <li><a href="<?php echo site_url('monthly_marketing_sales_growth_report');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Marketing Sales Growth Report</span></a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file-archive-o"></i> <span>Marketing Report</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('quantity');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quantity & Tooling</span></a></li>
              <li><a href="<?php echo site_url('tooling');?>"><i class="fa fa-chevron-circle-right"></i> <span>Tooling Monitoring</span></a></li>
              <li><a href="<?php echo site_url('report_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monthly Report</span></a></li>
            </ul>
          </li>
          <?php 
          }
          ?>
          <?php
          if($this->session->userdata('role')=="Finance"){
          ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-file"></i> <span>Regular</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <!-- <li><a href="<?php// echo site_url('pesanan/indexNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan NT</span></a></li>  -->
              <li><a href="<?php echo site_url('Monitoring_pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Monitor</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Detail Monitor</span></a></li>
              <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC Retail</span></a></li>
              <li><a href="<?php echo site_url('delivery_order/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Delivery Order Confirm</span></a></li>
              <li><a href="<?php echo site_url('monitorInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice</span></a></li>
              <li><a href="<?php echo site_url('monitoring_invo_detail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor Invoice Detail</span></a></li>
              <li><a href="<?php echo site_url('invoice/monitoringDeleteInvoice');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice</span></a></li>
              <li><a href="<?php echo site_url('invoice/monitoringDeleteInvoiceDetailDO');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Delete Invoice DO</span></a></li>
              <li><a href="<?php echo site_url('monitorDoF');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitoring Do Finance</span></a></li>
              <li><a href="<?php echo site_url('Delivery_Order_mon_F');?>"><i class="fa fa-chevron-circle-right"></i> <span>Confirm Do Finance</span></a></li>
              <li><a href="<?php echo site_url('confirmFinance_Scan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Confirm Do Finance Scan</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file-archive-o"></i> <span>Report Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('break_invo_ppn');?>"><i class="fa fa-chevron-circle-right"></i> <span>CBD Invoice PPN</span></a></li> 
             <li><a href="<?php echo site_url('outputInvoicePPN');?>"><i class="fa fa-chevron-circle-right"></i> <span>Output Invoice PPN</span></a></li>
              <li><a href="<?php echo site_url('kartupiutang');?>"><i class="fa fa-chevron-circle-right"></i> <span>Kartu Piutang PPN</span></a></li>
              <li><a href="<?php echo site_url('break_invo_ppn');?>"><i class="fa fa-chevron-circle-right"></i> <span>Lap CBD PPN</span></a></li>
            </ul>
          </li>
          <?php 
          }
          ?>
          <?php
          if($this->session->userdata('role')=="PPIC Retail"){
          ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-file"></i> <span>Regular Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO PPIC Retail</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan_ppic_retail/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor PO Detail PPIC Retail</span></a></li>
                <li><a href="<?php echo site_url('delivery_orderRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retail</span></a></li>
                <li><a href="<?php echo site_url('delivery_order_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Order Retur Retail</span></a></li>
                <li><a href="<?php echo site_url('monitorDoRetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Retail</span></a></li>
                <li><a href="<?php echo site_url('delivery_orderRETAIL/monitoringDo');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon DO Confirm Retail</span></a></li>
                <li><a href="<?php echo site_url('monitorDoDelete');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Delete DO Retail</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_retur_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Retur Prod Retail</span></a></li>
                <li><a href="<?php echo site_url('retur_productRETAIL');?>"><i class="fa fa-chevron-circle-right"></i> <span>Retur Product Retail</span></a></li>
              </ul>
            </li>
           <li class="treeview">
              <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('order_sheet/indexNT');?>"><i class="fa fa-chevron-circle-right"></i> <span>Order Sheet Retail</span></a></li>
                <li><a href="<?php echo site_url('scheduleNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule Retail</span></a></li>
                <li><a href="<?php echo site_url('delivery_status_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status Retail</span></a></li> 
                <li><a href="<?php echo site_url('Delivery_Status_v2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Status V 2.0</span></a></li>
                <li><a href="<?php echo site_url('monitoring_pending_data_retail');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Data Pending Retail</span></a></li>
               </ul>
            </li>
           <li class="treeview">
              <a href="#"><i class="fa fa-building"></i> <span>Warehouse Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('outgoing_finishedNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Retail</span></a></li>
                 <li><a href="<?php echo site_url('outgoing_retur_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Retur Retail</span></a></li>
                 <li><a href="<?php echo site_url('outgoing_finished_verification');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver</span></a></li>
                 <li><a href="<?php echo site_url('Outgoing_finished_verification_v1_1');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver V 1.1</span></a></li>
                 <li><a href="<?php echo site_url('outgoing_finished_verification/monitoringOutVerMon');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver Mon</span></a></li>
                 <li><a href="<?php echo site_url('outgoing_finished_verification/monitoringOutVerMonNG');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver Mon NG</span></a></li>
                  <li><a href="<?php echo site_url('Outgoing_finished_ver_retur');?>"><i class="fa fa-chevron-circle-right"></i> <span>Outgoing F G Ver Retur</span></a></li>
                 <li><a href="<?php echo site_url('outgoing_finished_verification/indexDone');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Outgoing F G Ver Done</span></a></li>
              </ul>
            </li>
          <?php } 
          if($this->session->userdata('role')=="Finance SO Recon"){
          ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-building"></i> <span>Warehouse</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="<?php echo site_url('stock_opname_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Opname V 2.1</span></a></li>
                 <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
                 <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
              </ul>
            </li>
          <?php } 
           if($this->session->userdata('role')=="Admin BOX"){
          ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-building"></i> <span>Warehouse</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo site_url('Out_going_monitoring');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Out going report</span></a></li> 
              </ul>
            </li>
          <?php } 
         if($this->session->userdata('role')=="Deadly Stock"){ ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-building"></i> <span>Warehouse</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo site_url('Mon_deadly_stock/indexSales');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock</span></a></li> 
              </ul>
            </li>
        <?php        
         }

          if($this->session->userdata('role')=="Cost Control"){
          ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-building"></i> <span>New Item OEM </span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('rfq_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Master</span></a></li>
                 <li><a href="<?php echo site_url('request_quotation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Request for Quotation</span></a></li>
                 <li><a href="<?php echo site_url('breakdown_cost');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Cost</span></a></li>
                  <li><a href="<?php echo site_url('quotation');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation</span></a></li>
                  <li><a href="<?php echo site_url('Item_dev_1');?>"><i class="fa fa-chevron-circle-right"></i> <span>New Item (LOI)</span></a></li>
                  <li><a href="<?php echo site_url('mon_doc_ext_drawing');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Doc Ext Draw</span></a></li>
                  <li><a href="<?php echo site_url('doc_new_product');?>"><i class="fa fa-chevron-circle-right"></i> <span>Doc New Product</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-building"></i> <span>Pre Order </span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('pesanan');?>"><i class="fa fa-chevron-circle-right"></i> <span>Bukti Pesanan</span></a></li>
                <li><a href="<?php echo site_url('Monitoring_pesanan/indexDetail');?>"><i class="fa fa-chevron-circle-right"></i> <span>PO Detail Monitor</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>New Item Retail</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('rfq_master');?>"><i class="fa fa-chevron-circle-right"></i> <span>RFQ Master</span></a></li>
                 <li><a href="<?php echo site_url('request_quotationNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Request for Quotation</span></a></li>
                 <li><a href="<?php echo site_url('breakdown_costNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Breakdown Cost</span></a></li>
                 <li><a href="<?php echo site_url('quotationNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quotation</span></a></li>
                 <li><a href="<?php echo site_url('itemNt');?>"><i class="fa fa-chevron-circle-right"></i> <span>New Item (LOI)</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-tachometer"></i> <span>PPIC</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('schedule');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Schedule</span></a></li>
                <li><a href="<?php echo site_url('monitorDoF');?>"><i class="fa fa-chevron-circle-right"></i> <span>Monitor DO Finance</span></a></li>
                <li><a href="<?php echo site_url('delivery_quota');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota</span></a></li>
                <li><a href="<?php echo site_url('monthly_loss_delivery');?>"><i class="fa fa-chevron-circle-right"></i> <span>Loss Quota</span></a></li>

                <li><a href="<?php echo site_url('vehicle');?>"><i class="fa fa-chevron-circle-right"></i> <span>Delivery Quota Setup</span></a></li>

                 <li><a href="<?php echo site_url('Detail_delivery_cost_per_date');?>"><i class="fa fa-chevron-circle-right"></i> <span>Detail delivery cost</span></a></li>
                 <li><a href="<?php echo site_url('Stock_card_for_ppic');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock Card PPIC</span></a></li>


              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-plane" aria-hidden="true"></i><span>Deliver Quota</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><span><font color="white" >Master</font> </span></li>
                <li><a href="<?php echo site_url('Setup_assume_quota');?>"><i class="fa fa-chevron-circle-right"></i> <span>Assume</span></a></li>
                <li><span><font color="white" >Monitoring</font> </span></li>
                 <li><a href="<?php echo site_url('Delivery_quota_target');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quota Target</span></a></li>
                 <li><a href="<?php echo site_url('Daily_quota_delivery_target');?>"><i class="fa fa-chevron-circle-right"></i> <span>Daily Target</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-tachometer"></i> <span>Tooling</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('quantity');?>"><i class="fa fa-chevron-circle-right"></i> <span>Quantity & Tooling</span></a></li>
                <li><a href="<?php echo site_url('tooling');?>"><i class="fa fa-chevron-circle-right"></i> <span>Tooling Monitoring</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-tachometer"></i> <span>Warehouse</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('Mon_deadly_stock/indexSales');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock</span></a></li>
                <li><a href="<?php echo site_url('Mon_deadly_stock_monthly/indexSales');?>"><i class="fa fa-chevron-circle-right"></i> <span>Deadly Stock Monthly</span></a></li>
                <li><a href="<?php echo site_url('Mon_missing_stock/searchSales?');?>"><i class="fa fa-chevron-circle-right"></i> <span>Missing Stock</span></a></li>
                <li><a href="<?php echo site_url('stock_card_in_out_dev');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out</span></a></li>
                <li><a href="<?php echo site_url('stock_card_in_out_dev/indexMobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Stock In Out Mobile</span></a></li>
                <li><a href="<?php echo site_url('receiving_good');?>"><i class ="fa fa-chevron-circle-right"></i> <span>Receiving Goods</span></a></li>            
                <li><a href="<?php echo site_url('inventory_warehouse');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory</span></a></li>
                <li><a href="<?php echo site_url('inventory_real_time');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time</span></a></li>
                <li><a href="<?php echo site_url('inventory_real_time/index_mobile');?>"><i class="fa fa-chevron-circle-right"></i> <span>Inventory Real Time Mobile</span></a></li>
                <li><a href="<?php echo site_url('monitoring_matching_inventory');?>"><i class="fa fa-chevron-circle-right"></i> <span>Mon Matching Inventory</span></a></li>
                <li><a href="<?php echo site_url('status_stock_monthly');?>"><i class="fa fa-chevron-circle-right"></i> <span>Status Stock Monthly</span></a></li>
              </ul>
            </li>
          <?php } ?>
        </ul>
        <!--sidebar-menu -->
      </section>
      <!--sidebar -->
    </aside>
    
    <div class="content-wrapper">                               
    <!--MODAL-->
    <!-- Modal CHANGE PASSWORD-->
    <div class="modal fade" id="changepassword" role="dialog">
      <div class="modal-dialog">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Form Change Password</h4>
          </div>
          <div class="modal-body">
            <form action="<?php echo site_url()."/login/changes";?>" method="POST" class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>">
              <div class="form-group">
                  <label for="departName" class="col-sm-3 control-label">Current Password</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="password" placeholder="Ex. HRD" value="<?php echo $this->session->userdata('password') ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="departName" class="col-sm-3 control-label">New Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="PASSWORD" placeholder="New Password" value="">
                  </div>
                </div>
                <div class="form-group">              
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger pull-right">Save Data</button>
                  </div>
                </div>              
              </form>                                       
          </div>
        </div>
        
      </div>
    </div>
    <!-- Modal CHANGE PASSWORD -->
  </body>
</html>