<?php 
	include "../../connect/conn.php";
	session_start();
	if(isset($_SESSION['username'])){
		//koneksi terpusat
		$username=$_SESSION['username'];
		$nis = $_SESSION['nis'];
		$statement = $pdo->query("SELECT siswa.nama_siswa, siswa.nis, kelas.nama_kelas, siswa.no_peserta from tbl_ruangan ruangan, data_siswa siswa, setup_kelas kelas WHERE ruangan.nis=siswa.nis and ruangan.nis='$nis' and ruangan.id_kelas=kelas.id_kelas");
		$siswa = $statement->fetch(PDO::FETCH_ASSOC);
		$nama_siswa = $siswa['nama_siswa'];
		$nis=$siswa['nis'];
		$nama_kelas=$siswa['nama_kelas'];
		$no_peserta=$siswa['no_peserta'];
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Sistem Informasi Nilai Online</title>

    <!-- Memanggil CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
	<!-- Memanggil Font dan Ikon-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
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
				<li><a href="uhar.php">Ulangan Harian</a></li>
				<li><a href="uts.php">Ulangan Tengah Semester</a></li>
				<li class="active"><a href="uas_1.php">Ulangan Akhir Semester</a></li>
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
			<div class="navbar-header"><a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars"></i></a></div>
			<ul class="nav navbar-right top-nav">
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
	</nav>
<!-- Akhir Menu Atas -->
<!-- Isi Halaman -->
	<div class="page-header">
		<ol class="breadcrumb">
		  <li><a href="../">Dashboard</a></li>
		  <li><a href="uas.php">Nilai UAS</a></li>
		  <li class="active"><a href="uas_3.php">Semester 3</a></li>
		</ol>
		<h1>Dashboard</h1>
		<h5><?php echo $nama_siswa; ?> <span class="label label-default"><?php echo $nama_kelas; ?></span></h5>
	</div>
	<div class="container-fluid">
		<div class=" page-content biru">
			<div class="row">
			  <div class="col-md-9">
			    <div class="hero"><?php echo $nama_siswa; ?>,</div>
				<div class="sub-hero">Silakan pilih semester yang ingin ditampilkan.</div>
					<nav>
					  <ul class="pagination">
						<li><a href="uas_1.php">1</a></li>
						<li><a href="uas_2.php">2</a></li>
						<li class="active"><a href="uas_3.php">3</a></li>
						<li><a href="uas_4.php">4</a></li>
						<li><a href="uas_5.php">5</a></li>
					  </ul>
					</nav>
				</div>
			  <div class="col-md-3">
				  <div class="pull-right">
					<img src="../../assets/images/owl_ex1.png" style="width:120px">
				  </div>
			  </div>
			</div>
		</div>
		<div class="page-content">
			<div class="row">
			
				<h2>Semester 3</h2>
			</div>
			<div class="row">
			<?php
								$view = $pdo->query("SELECT nama_pelajaran, nilai, kkm, jenis FROM tbl_nilai nilai, setup_pelajaran pelajaran WHERE nilai.no_peserta='$no_peserta' and nilai.id_pelajaran=pelajaran.id_pelajaran ORDER BY pelajaran.nama_pelajaran asc");
				
								$i = 1;
								while($row = $view->fetch(PDO::FETCH_ASSOC)){
							?>
				<div class="col-md-3" style="text-align:center">
				
							<?php	
									if ($row['jenis'] == 3 ) {
										if ($row['nilai'] >= $row['kkm']) { ?>
											<div class="nilai lulus">
												<div class="rate" data-count="<?php echo $row['nilai']; ?>"></div>
												<span><?php echo $row['nama_pelajaran']; ?></span>
											</div>
							<?php
										} else if ($row['nilai'] < $row['kkm']) { 
							?>			
										<div class="nilai tidak-lulus">
											<div class="rate" data-count="<?php echo $row['nilai']; ?>"></div>
											<span><?php echo $row['nama_pelajaran']; ?></span>
										</div>
							<?php 		
										} 
							
							?>
							
				</div>
				<?php
							$i++;
						}
					}
				?>
			</div>
		</div>
    <div class="footer"><i class="fa fa-copyright"></i> 2016. SINO V.4.0 Dibuat oleh IT Club SMAN 1 Cibadak</div>
<!-- Akhir Halaman --> 

</div>
</div>
	
<!-- Javascript -->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/sino.js"></script>
<!-- Akhir Javascript -->
</body>
</html>