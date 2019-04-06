<?php
	include_once('connection.php');
  session_start();
  if(!isset($_SESSION['uname']) && empty($_SESSION['uname']) && !isset($_SESSION['uid']) && empty($_SESSION['uid']))
	{
		header("Location:index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bin3.png">

    <title>ecoBIN - smart waste management for cities</title>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="assets/bootstrap.min.css" rel="stylesheet">

    <link href="assets/starter-template.css" rel="stylesheet">
    <script type="text/javascript" src="assets/jquery.js"></script>
  </head>

  <body data-gr-c-s-loaded="true">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top cus-nav">
      <a class="navbar-brand" href="">ecoBIN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bin_master.php">Bin Master</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bin_sensors_report.php">Bin Sensor Report</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <?php echo $_SESSION['uname']; ?>
            </a>  
            <div class="dropdown-menu">
              <a class="dropdown-item"  href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>