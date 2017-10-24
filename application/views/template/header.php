<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
  <link href="<?php echo base_url() . 'assets/vendor/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() . 'assets/vendor/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url() . 'assets/vendor/datatables/dataTables.bootstrap4.css'; ?>" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() . 'assets/css/sb-admin.css'; ?>" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Restaurant Order Placement</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <?php if($this->session->userdata['user_type'] == 'A') { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url(); ?>user/dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <?php }?>
        <?php if($this->session->userdata['user_type'] == 'A') { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">User</span>
          </a>
          
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
                <a href="<?php echo base_url(); ?>user/create_user">Create</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>user/list_user">Manage User</a>
            </li>
          </ul>
        </li>
        <?php }?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Order Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseOrderPages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Order</span>
          </a>
          
          <ul class="sidenav-second-level collapse" id="collapseOrderPages">
                            <?php if($this->session->userdata['user_type'] == 'R') { ?>
                            <li>
                                <a href="<?php echo base_url(); ?>orders/create_order">Create Order</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>orders/view_order">View Order</a>
                            </li>
                            <?php } ?>
                            <?php if($this->session->userdata['user_type'] == 'A') { ?>
                            <li>
                                <a href="<?php echo base_url(); ?>orders/list_order">Manage Order</a>
                            </li>
                            <?php } ?>
                        </ul>
        </li>
        <?php if($this->session->userdata['user_type'] == 'A') { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Item Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseItemPages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Item</span>
          </a>
          
          <ul class="sidenav-second-level collapse" id="collapseItemPages">
                            <li>
                                <a href="<?php echo base_url(); ?>item/add_item">Add Item</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>item/list_item">Manage Item</a>
                            </li>
                        </ul>
        </li>
        <?php }?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>login/logout">
            <i class="fa fa-fw fa-sign-out"></i>fuck off</a>
        </li>
      </ul>
    </div>
  </nav>
        <!-- /. NAV SIDE  -->
<div class="content-wrapper">
    <?php if($this->session->userdata['user_type'] == 'A') { ?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      

      <?php } ?>