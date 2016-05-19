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
 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Sistem Informasi Nilai Online</title>

    <!-- Memanggil CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
	
	<!-- Memanggil Font dan Ikon-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="assets/images/favicon.png"/>
	<style>
	body{
		background: linear-gradient( rgba(0, 0, 0, 0.32), rgba(0, 0, 0, 0.74) ), url(assets/images/bg_index.jpg);
		background-size: 1200px;
		background-repeat: no-repeat;
		background-position: center;
	}
	</style>
</head>

<body>
<div class="page-container">
	
	<div class="row">
		<div class="col-md-6">
			<img class="logo" src="assets/images/logo-sino.png">
		</div>
		<!-- Form Login -->
		
		<div class="col-md-6">
			<form class="form" action="index.php" method="post" name="postform">
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
		</div>
		
	</div>
    <div class="footer"><i class="fa fa-copyright"></i> 2016. SINO V.4.0 Dibuat oleh IT Club SMAN 1 Cibadak</div>
<!-- Akhir Halaman -->

</div>
	
<!-- Javascript -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/sino.js"></script>
<!-- Akhir Javascript -->
</body>
</html>
