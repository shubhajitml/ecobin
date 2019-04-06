<?php
	include_once('connection.php');
	session_start();
	if(isset($_SESSION['uname']) && !empty($_SESSION['uname']) && isset($_SESSION['uid']) && !empty($_SESSION['uid']))
	{
		header("Location:dashboard.php");
		exit();
	}
	if(isset($_POST['submit']))
    {
		if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']))
		{
			print_R($_POST);
			$username = $_POST['username'];
			$password = $_POST['password'];

			$stmt = $conn->prepare("SELECT * FROM users WHERE email = :e AND password = :p"); 
			if(!$stmt->execute(array(':e'=>$username, ':p'=>$password)))
			{
				echo 'Not executed';
			}
			//var_dump( $stmt->queryString, $stmt->_debugQuery() );
			if($stmt->rowCount() == 1)
			{
				// set the resulting array to associative
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$_SESSION['uname'] 	= $result['email'];
				$_SESSION['uid']	= $result['id'];
				header("Location:dashboard.php");
				exit();
			}
			else
			{
				echo "Wrong username or password";
			}
		}
		else
		{
			echo "Username and password fields should not be blank";
		}
	}
?>
<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bin3.png">

    <title>ecoBIN - smart waste management for cities</title>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="assets/bootstrap.min.css" rel="stylesheet">

    <link href="assets/starter-template.css" rel="stylesheet">
  </head>

  <body data-gr-c-s-loaded="true" style="padding-top:0;">
	<section class="material-half-bg">
		<div class="cover"></div>
    </section>
	<section class="login-content">
		<div class="logo">
			<h1>ecoBIN</h1>
		</div>
		<div class="login-box">
			<form class="login-form" action="" method="POST">
				<h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
				<div class="form-group">
					<label class="control-label">USERNAME</label>
					<input class="form-control" name="username" placeholder="Email" autofocus="" type="text">
				</div>
				<div class="form-group">
					<label class="control-label">PASSWORD</label>
					<input class="form-control" name="password" placeholder="Password" type="password">
				</div>
				<div class="form-group btn-container">
					<input type="submit" class="btn btn-primary btn-block" name="submit" value="Login">
				</div>
			</form>
		</div>
	</section>

    <!-- Core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
  

</body></html>