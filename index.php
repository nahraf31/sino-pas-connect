<?php  
	session_start();
	include "connect/conn.php";

	if (isset($_POST['login'])){
		//koneksi terpusat
		$username=$_POST['username'];
		$password=$_POST['password'];
		$statement = $pdo->query("SELECT * FROM data_siswa WHERE username='$username' AND password='$password'");
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$nis=$row['nis'];
		if($row){
			$_SESSION['username']=$username;
			$_SESSION['nis']=$nis;
			$_SESSION['waktu']=date("Y-m-d H:i:s");
?>
			<script language="javascript">document.location.href="dashboard/";</script>
<?php
		} else {
?>
			<script language="javascript">document.location.href="index.php?status=1";</script>
<?php
		}
	} else {
		unset($_POST['login']);
	}
	
	if(isset($_SESSION['username'])){
?>
		<script language="javascript">document.location.href="dashboard/";</script>
<?php
	}
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>SINO - Sistem Informasi Nilai Online</title>
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
			<?php 
			if (isset($_GET['status'])) {
				if ($_GET['status']==1) {
			?>
						<p class="bg-danger">Username atau Password yang Anda masukan salah.</p>

			<?php	
				} else if ($_GET['status']==2) {
			?>
						<p class="bg-success">Anda sudah keluar, jika ingin masuk kembali silahkan login.</p>
			<?php			
				}
			}	
			?>
			<div class="form-group">
				<div class="input-group space-top">
					<div class="input-group-addon"><i class="fa fa-user"></i></div>
						<input class="form-control" placeholder="ID User" name="username" type="text">
				</div>
				<div class="input-group space-top">
					<div class="input-group-addon"><i class="fa fa-lock"></i></div>
						<input class="form-control" placeholder="Password" name="password" onFocus="this.value=''" type="password">
				</div>
			</div>
			<button type="submit" class="btn btn-primary space-top" style="width:100%" name="login">Login</button>
		</form>
	</section>
	<!-- Akhir Form Login -->
	
	<!-- Footer -->
	<div class="footer">
		<i class="fa fa-copyright"></i>2016. Dibuat oleh IT Club SMAN 1 Cibadak
	</div>
	<!-- Akhir Footer -->
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-77179797-1', 'auto');
		  ga('send', 'pageview');
	</script>
		
	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
		(function(){ var widget_id = 'br7vcqFLWo';
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/geo-widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();
	</script>
	<!-- {/literal} END JIVOSITE CODE -->
</body>	
</html>
