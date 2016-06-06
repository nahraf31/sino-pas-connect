<?php
session_start();
include_once 'connect/conn.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: dashboard/");
}

if(isset($_POST['btn-login']))
{
	$user = $_POST['user'];
	$upass = $_POST['pass'];
	$res= $pdo->query("SELECT * FROM user_admin WHERE username='$user'");
	$row= $res->fetch(PDO::FETCH_ASSOC);
	
	if($row['password']==$upass)
	{
		$_SESSION['user'] = $row['id_admin'];
		header("Location: dashboard/");
	}
	else
	{
		?>
        <script>alert('Password yang Anda masukan salah.');</script>
        <?php
	}
	
}
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Admin Panel - SINO</title>
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
	<link rel="icon" type="image/x-icon" href="assets/images/favicon.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
<body>
	<!-- Form Login -->
	<section id="login">
		<img class="logo" src="assets/images/logo-sino.png">
		<form class="form-inline space-top" action="index.php" method="post" name="postform">
			<div class="form-group">
				<div class="input-group space-top">
					<div class="input-group-addon"><i class="fa fa-user"></i></div>
						<input class="form-control" type="text" name="user" placeholder="Username" required>
				</div>
				<div class="input-group space-top">
					<div class="input-group-addon"><i class="fa fa-lock"></i></div>
						<input class="form-control" type="password" name="pass" placeholder="Password" type="password" required>
				</div>
			</div>
			<button class="btn btn-primary space-top" button type="submit" style="width:100%" name="btn-login">Login</button>
		</form>
	</section>
	<!-- Akhir Form Login -->
	
	<!-- Footer -->
	<div class="footer">
		<i class="fa fa-copyright"></i>2015. Dibuat oleh IT Club SMAN 1 Cibadak
	</div>
	<!-- Akhir Footer -->
	
	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
		(function(){ var widget_id = 'Za69heKYPf';
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
	<!-- {/literal} END JIVOSITE CODE -->
</body>	
</html>