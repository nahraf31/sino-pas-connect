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
	
	/*
	**Nanti diterusin, wareugah :"
	
	if(isset($_POST['setup'])) {
		//$username=$_POST['user'];
		//$pass=$_POST['pass'];
		$nama_siswa = $_POST['nama_siswa'];
		$nis=$_POST['nis'];
		$nama_kelas=$_POST['nama_kelas'];
		$tempat_lahir=$_POST['tempat_lahir'];
		$tanggal_lahir=$_POST['tanggal_lahir'];
		$kelamin=$_POST['kelamin'];
		$agama=$_POST['agama'];
		$status=$_POST['status'];
		$anak_ke=$_POST['anak_ke'];
		$alamat_siswa=$_POST['alamat_siswa'];
		$no_telpon_anak=$_POST['no_telpon_anak'];
		$asal_sekolah=$_POST['asal_sekolah'];
		$asal_kelas=$_POST['asal_kelas'];
		$tgl_terima=$_POST['tgl_terima'];
		$nama_ayah=$_POST['nama_ayah'];
		$nama_ibu=$_POST['nama_ibu'];
		$alamat_ortu=$_POST['alamat_ortu'];
		$no_telpon_ortu=$_POST['no_telpon_ortu'];
		$pekerjaan_ayah=$_POST['pekerjaan_ayah'];
		$pekerjaan_ibu=$_POST['pekerjaan_ibu'];
		$nama_wali=$_POST['nama_wali'];
		$alamat_wali=$_POST['alamat_wali'];
		$no_telpon_wali=$_POST['no_telpon_wali'];
		$pekerjaan_wali=$_POST['pekerjaan_wali'];
		echo "HUEY";
		//$query=$pdo->query("UPDATE data_siswa SET username='$user', password='$pass', nis='$nis', nama_siswa='$nama' WHERE nis='$nis'");
	} */
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
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
	<!-- Memanggil Font dan Ikon-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="../assets/images/favicon.png"/>
</head>

<body>
<div id="wrapper">
<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand"><img src="../assets/images/logo-sino-dark.png"></li>
			<li><a href="../dashboard/"><i class="fa fa-home"></i>&nbsp; &nbsp; Dashboard</a></li>
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
		  <li class="active"><a href="../dashboard/">Registration Form</a></li>
		</ol>
		<h1>Registration Form</h1>
		<h5><?php echo $nama_siswa; ?> <span class="label label-default"><?php echo $nama_kelas; ?></span></h5>
	</div>
	<div class="container-fluid">
		<div class=" page-content biru">
			<div class="row">
				<div class="col-md-9">
					<div class="hero">Hai <?php echo $nama_siswa; ?>!</div>
					<div class="sub-hero">Selamat datang di SINO Pas Connect.</div>
					<p>Melalui aplikasi web ini dapatkan informasi nilai anda secara online, mudah dan cepat. Saran dan masukan Anda sangat diperlukan demi pengembangan aplikasi web ini.</p>
				</div>
				<div class="col-md-3">
					<div class="pull-right">
						<img src="../assets/images/owl_ex1.png" style="width:120px">
					</div>
				</div>
			</div>
		</div>
		<div class=" page-content">
			<div class="row">
				<div class="col-md-12">
					<section>
						<div class="wizard">
							<div class="wizard-inner">
								<div class="connecting-line"></div>
								<ul class="nav nav-tabs" role="tablist">

									<li role="presentation" class="active">
										<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
											<span class="round-tab">
												1
											</span>
										</a>
									</li>

									<li role="presentation" class="disabled">
										<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
											<span class="round-tab">
												2
											</span>
										</a>
									</li>
									<li role="presentation" class="disabled">
										<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
											<span class="round-tab">
												3
											</span>
										</a>
									</li>
								</ul>
							</div>
							<form action="" method="POST" name="datsis">
								<div class="tab-content">
									<div class="tab-pane active" role="tabpanel" id="step1">
										<h3>Setup Username</h3>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Username" name="user">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Password" name="pass">
										</div>
										<ul class="list-inline pull-right">
											<li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
										</ul>
									</div>
									<div class="tab-pane" role="tabpanel" id="step2">
										<h3>Data Siswa</h3>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $nama_siswa;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="NISN" name="nis" value="<?php echo $nis;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $tempat_lahir;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" required>
											<span id="helpBlock" class="help-block">Format tanggal: 31 Mei 1998</span>
										</div>
										<div class="form-group">
											<select class="form-control" name="kelamin" required>
											<?php if($kelamin == "") { ?>
												<option>--Jenis Kelamin--</option>
												<option>Laki-laki</option>
												<option>Perempuan</option>
											<?php	
											} else if($kelamin == "Laki-laki") { ?>
												<option>Laki-laki</option>
												<option>Perempuan</option>
												<option>--Jenis Kelamin--</option>
											<?php
											} else {
											?>
												<option>Perempuan</option>
												<option>Laki-laki</option>
												<option>--Jenis Kelamin--</option>
											<?php
											} ?>
											</select>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Anak ke" name="anak_ke" value="<?php echo $anak_ke;?>" required>
										</div>
										<div class="form-group">
											<textarea class="form-control" rows="3" placeholder="Alamat Siswa" name="alamat_siswa" required><?php echo $alamat_siswa;?></textarea>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="No Telepon Siswa" name="no_telpon_anak" value="<?php echo $no_telpon_anak;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" value="<?php echo $asal_sekolah;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Diterima di kelas" name="asal_kelas" value="<?php echo $asal_kelas;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Diterima pada tanggal" name="tgl_terima" value="<?php echo $tgl_terima;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" value="<?php echo $nama_ayah;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" value="<?php echo $nama_ibu;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Alamat Orang Tua" name="alamat_ortu" value="<?php echo $alamat_ortu;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Nomor Telepon Rumah" name="no_telpon_ortu" value="<?php echo $no_telpon_ortu;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah" value="<?php echo $pekerjaan_ayah;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" value="<?php echo $pekerjaan_ibu;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Nama Wali" nama="nama_wali" value="<?php echo $nama_wali;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Alamat Wali" nama="alamat_wali" value="<?php echo $alamat_wali;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Nomor Telepon Wali" nama="no_telpon_wali" value="<?php echo $no_telpon_wali;?>" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Pekerjaan Wali" name="pekerjaan_wali" value="<?php echo $pekerjaan_wali;?>" required>
										</div>
										<ul class="list-inline pull-right">
											<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
											<li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
										</ul>
									</div>
									<div class="tab-pane" role="tabpanel" id="complete">
										<h3>Selesai</h3>
										<p>Kamu sudah menyelesaikan semua tahap registrasi, silahkan klik tombol finish untuk selesai.</p>
										<button type="submit" class="btn btn-primary next-step" name="setup">Finish</button>
									</div>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
    <div class="footer"><i class="fa fa-copyright"></i> 2016. SINO V.4.0 Dibuat oleh IT Club SMAN 1 Cibadak</div>
<!-- Akhir Halaman -->
</div>
</div>
	
<!-- Javascript -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/sino.js"></script>
<!-- Akhir Javascript -->
</body>
</html>
