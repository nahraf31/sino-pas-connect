<?php 
	include "../../connect/conn.php";
	session_start();
	if(isset($_SESSION['username'])){
		//koneksi terpusat
		$username=$_SESSION['username'];
		$nis = $_SESSION['nis'];
		$statement = $pdo->query("SELECT siswa.nama_siswa, siswa.nis, kelas.nama_kelas from tbl_ruangan ruangan, data_siswa siswa, setup_kelas kelas WHERE ruangan.nis=siswa.nis and ruangan.nis='$nis' and ruangan.id_kelas=kelas.id_kelas");
		$siswa = $statement->fetch(PDO::FETCH_ASSOC);
		$nama_siswa = $siswa['nama_siswa'];
		$nis=$siswa['nis'];
		$nama_kelas=$siswa['nama_kelas'];
	}
	else {
		$nama_siswa=0; //supaya engga error, karena tampilan dibawah tetep ke load dan butuh var $nama_siswa
		$nama_kelas=0;
		header('Location: ../'); 
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
	
    <title>Pengaturan - SINO</title>

    <!-- Memanggil CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
	<!-- Memanggil Font dan Ikon-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../../assets/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="../../assets/images/favicon.png"/>
</head>

<body>
<div id="wrapper">
<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand"><img src="../../assets/images/logo-sino-dark.png"></li>
			<li><a href="../"><i class="fa fa-home"></i>&nbsp; &nbsp; Dashboard</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-line-chart"></i>&nbsp; &nbsp;Nilai Ulangan &nbsp;<span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="../nilai/uhar.php">Ulangan Harian</a></li>
				<li><a href="../nilai/uts.php">Ulangan Tengah Semester</a></li>
				<li><a href="../nilai/uas_1.php">Ulangan Akhir Semester</a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-question-circle"></i>&nbsp; &nbsp;Bantuan &nbsp;<span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Documentation</a></li>
				<li><a href="#">Meet team</a></li>
				<li><a href="#">Feedback</a></li>
			  </ul>
			</li>
		</ul>
	</div>
<!-- Akhir Sidebar -->
<div id="page-content-wrapper">
<!-- Menu Atas -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header dashboard">
				<a href="#menu-toggle" class="btn" id="menu-toggle"><i class="fa fa-bars"></i></a>
				<ul class="nav menu-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell-o"><span class="bubble"></span></i>
						</a>
						
						<ul class="dropdown-menu message-dropdown">
							<li class="message-header">
								Notifikasi
							</li>
							<?php
								$view=$pdo->query("SELECT info FROM info ORDER BY id_info desc");
								while($row = $view->fetch(PDO::FETCH_ASSOC)){
							?>
							<li class="message-preview">
								<p><?php echo $row['info'];?></p>
							</li>
							<?php
								}
							?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
						<ul class="dropdown-menu">
							<li class="active"><a href="../settings"><i class="fa fa-cog"></i>    Pengaturan</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="../logout"><i class="fa fa-sign-out"></i>    Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<!-- Akhir Menu Atas -->
	  
<!-- Isi Halaman -->
	<section class="page-header">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="../../">Dashboard</a></li>
				  <li class="active"><a href="../settings">Pengaturan</a></li>
				</ol>
				<h1>Pengaturan</h1>
				<h5><?php echo $nama_siswa; ?> <span class="label label-default"><?php echo $nama_kelas; ?></span></h5>
			</div>
		</div>
	</section>
	<section class="page-content">
		<div class="container-fluid">
			<div class="row settings">
				<div class="icon"><i class="fa fa-user"></i></div>
				<div class="main">
					<strong>Username</strong>
					<p><?php echo $username; ?></p>
				</div>
				<div class="action">
					<a href="#" class="btn btn-default disabled" role="button">Edit</a>
				</div>
			</div>
			<div class="row settings">
				<div class="icon"><i class="fa fa-lock"></i></div>
				<div class="main">
					<strong>Password</strong>
					<p>*******</p>
				</div>
				<div class="action">
					<a href="changepass/" class="btn btn-default" role="button">Edit</a>
				</div>
			</div>
		</div>	
	</section>
	<footer><i class="fa fa-copyright"></i> 2016. SINO V.4.0 Dibuat oleh IT Club SMAN 1 Cibadak</footer>
<!-- Akhir Halaman -->
</div>
</div>
	
<!-- Javascript -->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/parallax.js"></script>
<!-- Akhir Javascript 
</body>
</html>