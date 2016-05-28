<?php 
	include "../connect/conn.php";
	session_start();
	if(isset($_SESSION['username'])){
		//koneksi terpusat
		$username=$_SESSION['username'];
		$nis = $_SESSION['nis'];
		$statement = $pdo->query("SELECT siswa.nama_siswa, siswa.alamat_wali, siswa.no_telpon_wali, siswa.pekerjaan_wali, siswa.alamat_ortu, siswa.no_telpon_ortu, siswa.pekerjaan_ayah, siswa.pekerjaan_ibu, siswa.nama_wali, siswa.no_telpon_anak, siswa.asal_sekolah, siswa.asal_kelas, siswa.tgl_terima, siswa.nama_ayah, siswa.nama_ibu,  siswa.alamat_siswa, siswa.status, siswa.anak_ke, siswa.tempat_lahir, siswa.tanggal_lahir, siswa.kelamin, siswa.agama, siswa.nis, kelas.nama_kelas from tbl_ruangan ruangan, data_siswa siswa, setup_kelas kelas WHERE ruangan.nis=siswa.nis and ruangan.nis='$nis' and ruangan.id_kelas=kelas.id_kelas");
		$siswa = $statement->fetch(PDO::FETCH_ASSOC);
		$nama_siswa = $siswa['nama_siswa'];
		$nis=$siswa['nis'];
		$nama_kelas=$siswa['nama_kelas'];
		$tempat_lahir=$siswa['tempat_lahir'];
		$tanggal_lahir=$siswa['tanggal_lahir'];
		$kelamin=$siswa['kelamin'];
		$agama=$siswa['agama'];
		$status=$siswa['status'];
		$anak_ke=$siswa['anak_ke'];
		$alamat_siswa=$siswa['alamat_siswa'];
		$no_telpon_anak=$siswa['no_telpon_anak'];
		$asal_sekolah=$siswa['asal_sekolah'];
		$asal_kelas=$siswa['asal_kelas'];
		$tgl_terima=$siswa['tgl_terima'];
		$nama_ayah=$siswa['nama_ayah'];
		$nama_ibu=$siswa['nama_ibu'];
		$alamat_ortu=$siswa['alamat_ortu'];
		$no_telpon_ortu=$siswa['no_telpon_ortu'];
		$pekerjaan_ayah=$siswa['pekerjaan_ayah'];
		$pekerjaan_ibu=$siswa['pekerjaan_ibu'];
		$nama_wali=$siswa['nama_wali'];
		$alamat_wali=$siswa['alamat_wali'];
		$no_telpon_wali=$siswa['no_telpon_wali'];
		$pekerjaan_wali=$siswa['pekerjaan_wali'];
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
	
    <title>Dashboard - SINO</title>

    <!-- Memanggil CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
	<!-- Memanggil Font dan Ikon-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../assets/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="../assets/images/favicon.png"/>
</head>

<body>
<div id="wrapper">
<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand"><img src="../assets/images/logo-sino-dark.png"></li>
			<li class="active"><a href="../dashboard/"><i class="fa fa-home"></i>&nbsp; &nbsp; Dashboard</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-line-chart"></i>&nbsp; &nbsp;Nilai Ulangan &nbsp;<span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="nilai/uhar.php">Ulangan Harian</a></li>
				<li><a href="nilai/uts.php">Ulangan Tengah Semester</a></li>
				<li><a href="nilai/uas_1.php">Ulangan Akhir Semester</a></li>
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
							<li><a href="settings/"><i class="fa fa-cog"></i>    Pengaturan</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="../dashboard/logout"><i class="fa fa-sign-out"></i>    Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<!-- Akhir Menu Atas -->
	  
<!-- Isi Halaman -->
	<section class="page-header">
		<ol class="breadcrumb">
		  <li class="active"><a href="../dashboard/">Dashboard</a></li>
		</ol>
		<h1>Dashboard</h1>
		<h5><?php echo $nama_siswa; ?> <span class="label label-default"><?php echo $nama_kelas; ?></span></h5>
	</section>
	<section class="page-content primary">
		<div class="container-fluid">
			<div class="row">
			  <div class="col-md-9">
				<div class="hero">Hai <?php echo $nama_siswa; ?>!</div>
				<div class="sub-hero">Selamat datang di SINO Pas Connect.</div>
				<p>Melalui aplikasi web ini dapatkan informasi nilai anda secara online, mudah, cepat dan rahasia. Saran dan masukan Anda sangat diperlukan demi pengembangan aplikasi web ini.</p>
			  </div>
			  <div class="col-md-3">
				  <div class="pull-right">
					<img src="../assets/images/owl_ex1.png" style="width:120px">
				  </div>
			  </div>
			</div>
		</div>
	</section>
	<section class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				  <h2>Data Siswa</h2>
				  <div class="bio">
					<div class="atas">Nama Lengkap</div>
					<div class="bawah"><?php echo $nama_siswa; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">NIS / NISN</div>
					<div class="bawah"><?php echo $nis; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Tempat Tanggal Lahir</div>
					<div class="bawah"><?php echo $tempat_lahir.", ".$tanggal_lahir; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Jenis Kelamin</div>
					<div class="bawah"><?php echo $kelamin; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Agama</div>
					<div class="bawah"><?php echo $agama; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Status dalam Keluarga</div>
					<div class="bawah"><?php echo $status; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Anak ke</div>
					<div class="bawah"><?php echo $anak_ke; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Alamat Peserta Didik</div>
					<div class="bawah"><?php echo $alamat_siswa; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">No Telp Siswa</div>
					<div class="bawah"><?php echo $no_telpon_anak; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Sekolah Asal</div>
					<div class="bawah"><?php echo $asal_sekolah; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Diterima di kelas</div>
					<div class="bawah"><?php echo $asal_kelas; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Diterima pada tanggal</div>
					<div class="bawah"><?php echo $tgl_terima; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Nama Ayah</div>
					<div class="bawah"><?php echo $nama_ayah; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Nama Ibu</div>
					<div class="bawah"><?php echo $nama_ibu; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Alamat Orang Tua</div>
					<div class="bawah"><?php echo $alamat_ortu; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">No Telepon Rumah</div>
					<div class="bawah"><?php echo $no_telpon_ortu; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Pekerjaan Ayah</div>
					<div class="bawah"><?php echo $pekerjaan_ayah;?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Pekerjaan Ibu</div>
					<div class="bawah"><?php echo $pekerjaan_ibu; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Nama Wali</div>
					<div class="bawah"><?php echo $nama_wali; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Alamat Wali</div>
					<div class="bawah"><?php echo $alamat_wali; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">No Telepon Wali</div>
					<div class="bawah"><?php echo $no_telpon_wali; ?></div>
				  </div>
				  <div class="bio">
					<div class="atas">Pekerjaan Wali</div>
					<div class="bawah"><?php echo $pekerjaan_wali; ?></div>
				  </div>
				</div>
			</div>
		</div>
	</section>
	<footer><i class="fa fa-copyright"></i> 2016. SINO V.4.0 Dibuat oleh IT Club SMAN 1 Cibadak</footer>
<!-- Akhir Halaman -->
</div>
</div>
	
<!-- Javascript -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/parallax.js"></script>
<!-- Akhir Javascript 
</body>
</html>