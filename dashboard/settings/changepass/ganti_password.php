<?php 
	include "../../../connect/conn.php";
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
		$nis=0;
		header('Location: ../'); 
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="SINO merupakan aplikasi web yang memungkinkan para pelajar mengetahui nilainya secara online, mudah, cepat dan rahasia. Sehingga user tidak perlu khawatir privasi data miliknya diketahui oleh orang lain. SINO sendiri merupakan singkatan dari "Sistem Informasi Nilai Online", pengembangan web ini terinspirasi dari aplikasi Pas Connect. Sehingga dalam versi ini kami menggunakan nama "SINO Pas Connect".">
    <meta name="author" content="Rizqi Farhan, Alvira Mohamad, Rizky Ilhamsyah, Alfian Isnan, Adhiyatma Nugraha, M.Irsyad">
	
    <title>Edit Password - <?php echo $nama_siswa; ?></title>

    <!-- Memanggil CSS -->
    <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/css/main.css" rel="stylesheet">
	<!-- Memanggil Font dan Ikon-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/x-icon" href="../../../assets/images/favicon.png"/>
</head>

<body>
<div id="wrapper">
<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand"><img src="../../../assets/images/logo-sino-dark.png"></li>
			<li><a href="../../../dashboard/"><i class="material-icons">dashboard</i>Dashboard</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">pie_chart_outlined</i>Nilai Ulangan &nbsp;<span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="../../nilai/uhar.php">Ulangan Harian</a></li>
				<li><a href="../../nilai/uts.php">Ulangan Tengah Semester</a></li>
				<li><a href="../../nilai/uas_1.php">Ulangan Akhir Semester</a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">help_outline</i>Bantuan &nbsp;<span class="caret"></span></a>
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
				<a href="#menu-toggle" class="menu" id="menu-toggle"><i class="material-icons">menu</i></a>
				<ul class="nav menu-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="material-icons">notifications_none</i><span class="bubble"></span></i>
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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_vert</i></a>
						<ul class="dropdown-menu">
							<li><a class= "active" href="../"><i class="material-icons">settings</i>Pengaturan</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="../../logout"><i class="material-icons">power_settings_new</i>Logout</a></li>
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
				  <li><a href="../">Pengaturan</a></li>
				  <li class="active"><a href="../changepass">Edit Password</a></li>
				</ol>
				<h1>Edit Password</h1>
				<h5><?php echo $nama_siswa; ?> <span class="label label-default"><?php echo $nama_kelas; ?></span></h5>
			</div>
		</div>
	</section>
	<section class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php 
						if(isset($_POST['login'])){
							$nis=$_POST['nis'];
							$query=$pdo->query("SELECT * FROM data_siswa WHERE nis='$nis'");
							$row=$query->fetch(PDO::FETCH_ASSOC);
							$oldp=$_POST['old_pass'];
							$roldp=$row['password'];
							$newp=$_POST['new_pass'];
							$rnewp=$_POST['rnew_pass'];
							$query=0;
							if ($oldp == $roldp && $newp == $rnewp) {
								$query=$pdo->query("UPDATE data_siswa SET password='$newp' WHERE nis='$nis'");
								$exe=$query->fetch(PDO::FETCH_ASSOC);
							} else if(!$query) {
					?>
					<div class="alert alert-danger">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  Gagal, kemungkinan password lama salah atau pengulangan password baru tidak sama
					</div>	
					<?php	
						} if ($query) {
					?>
					<div class="alert alert-success">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  Berhasil! Password baru telah disimpan, ingatkan dan amankan password baru Anda
					</div>
					<?php
						}
					}
					?>
					
					
					
				</div>
			</div>
			<form action="../changepass/" method="post" name="pass">
				<input type="hidden" name="nis" value="<?php echo $nis; ?>">
				<div class="row">
					<div class="col-md-8">
						<label for="password">Password Lama</label>
						<input placeholder="Masukan Password Lama" name="old_pass" type="password" class="form-control" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<label for="password">Password Baru</label>
						<input placeholder="Masukan Password Baru" name="new_pass" type="password" class="form-control" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<label for="password">Ketik ulang password baru</label>
						<input placeholder="Masukan Ulang Password Baru" name="rnew_pass" type="password" class="form-control" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<a href="../"class="btn btn-default">Batal</a>
						<button class="btn btn-primary" type="submit" name="login">Ganti</button>
					</div>
				</div>
			</form>
		</div>	
	</section>
	<footer><i class="fa fa-copyright"></i> 2016. SINO V.4.0 Dibuat oleh IT Club SMAN 1 Cibadak</footer>
<!-- Akhir Halaman -->
</div>
</div>
	
<!-- Javascript -->
<script src="../../../assets/js/jquery.js"></script>
<script src="../../../assets/js/bootstrap.min.js"></script>
<script src="../../../assets/js/main.js"></script>
<script src="../../../assets/js/parallax.js"></script>
<!-- Akhir Javascript 
</body>
</html>