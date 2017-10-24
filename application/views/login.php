<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Restaurant Order Placement</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(). '/assets/vendor/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url().'/assets/vendor/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url().'/assets/css/sb-admin.css'; ?>" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <!-- <form method="post" action="<?php echo base_url().'login/login_validation'; ?>"> -->
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <?php echo form_open('login/login'); ?>
          <div class="form-group">
            <label for="inputUsername">Username</label>
            <input class="form-control" id="inputUsername" type="text" required="true" aria-describedby="emailHelp" placeholder="Enter Username" name="username">
            
          </div>
          <div class="form-group">
            <label for="inputPassword1">Password</label>
            <input class="form-control" id="inputPassword" type="password" placeholder="Password" required="true" name="password">
            
          </div>          
          <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>       
      </div>
    </div>
  <!-- </form> -->
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url().'/assets/vendor/jquery/jquery.min.js'; ?>"></script>
  <script src="<?php echo base_url().'/assets/vendor/popper/popper.min.js'; ?>"></script>
  <script src="<?php echo base_url().'/assets/vendor/bootstrap/js/bootstrap.min.js'; ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url().'/assets/vendor/jquery-easing/jquery.easing.min.js'; ?>"></script>
</body>

</html>
