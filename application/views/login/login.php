<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>PT. KPS | Login Page</title>

    <link href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/css/login.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/fontawesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/ionicons/css/ionicons.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/select2/select2.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/datatables/dataTables.bootstrap.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/plugins/datepicker/css/bootstrap-datepicker3.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/dist/css/AdminLTE.min.css"); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("bootstrap/dist/css/skins/_all-skins.css"); ?>">

  </head>
  <body>
    <div class="col-lg-4 center">

      <div class="login-logo">   
          <a href="" class="logo-name"><img src="<?php echo base_url("bootstrap/image/logo.png"); ?>">
            <div class="form-group">
              <a href="" class="logo-name text-lg text-center"><b>KPS (Karya Putra Sangkuriang)</b>
            </div>
          </a>                         
          <div class="form-group">
            <p class="text-center m-t-md">Please login into your account.</p>
          </div>                 
      </div>

      <div class="login-box" align="middle">
        <form method="post" action="<?php echo site_url() ?>/login/action">
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Username" name="username" required>
          </div>
          <div class="form-group">
            <input class="form-control" type="password" placeholder="Password" name="password" required>
          </div>                 
          <button type="submit" class="btn btn-block btn-info btn-flat">Login</button>
          <br>
          <?php if($this->session->flashdata('errorlogin')) { ?>
            <p style="color:red;text-align: center;">
             <?php echo $this->session->flashdata('errorlogin'); ?> 
            </p>
          <?php } ?>
          <a href="">Forgot Password?</a>          
        </form>
      </div>
      
    </div>
    
    <script src="<?php echo base_url("bootstrap/plugins/jQuery/jQuery.min.js"); ?>"></script>  
    <script src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>  
    <script src="<?php echo base_url("bootstrap/dist/js/app.min.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/plugins/slimScroll/jquery.slimscroll.min.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/plugins/datatables/dataTables.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/plugins/select2/select2.min.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/plugins/datepicker/js/bootstrap-datepicker.min.js"); ?>"></script>
  </body>
</html>