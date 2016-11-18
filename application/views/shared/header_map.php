<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RCMS AGS 216 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    #map {
      min-height:600px;
    }
  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url();?>" class="navbar-brand"><b>RCMS AGS 216</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($link_active == 'adsb') { echo  'class="active"'; } ?>><a href="<?php echo base_url();?>">Home <?php if($link_active == 'adsb') { echo  ' <span class="sr-only">(current)</span>'; } ?></a></li>
            <li <?php if($link_active == 'host') { echo  'class="active"'; } ?>><a href="<?php echo site_url('host'); ?>">Config <?php if($link_active == 'host') { echo  ' <span class="sr-only">(current)</span>'; } ?></a></li>
            <li <?php if($link_active == 'log') { echo  'class="active"'; } ?>><a href="<?php echo site_url('log'); ?>">Log <?php if($link_active == 'log') { echo  ' <span class="sr-only">(current)</span>'; } ?></a></li>
          </ul>
        </div>
		
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
			  <!-- User Account: style can be found in dropdown.less -->
			  <li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <img src="<?php echo base_url();?>asset/dist/img/user.jpg" class="user-image" alt="User Image">
				  <span class="hidden-xs"><?php echo $username; ?></span>
				</a>
			  </li>
			  <!-- Control Sidebar Toggle Button -->
			  <li>
				<a href="<?php echo site_url('/auth/logout/'); ?>"><i class="fa fa-lock"></i></a>
			  </li>
			</ul>
		</div>
        <!-- /.navbar-custom-menu -->
	  </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- =============================================== -->
