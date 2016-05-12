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
  <html>
    <head>
		<title><?php echo $nama_siswa ?> - SINO</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		<link rel="icon" type="image/x-icon" href="../assets/images/favicon.png"/>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../assets/css/custom.css"  media="screen,projection"/>
		<link rel="stylesheet" href="../assets/font/font-awesome/css/font-awesome.min.css">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
	<body>
		<!-- Navbar-->
		<nav>
			<div class="nav-wrapper">
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right">	
				<li id="notification_li">
					<a href="#" id="notificationLink"><i class="fa fa-bell-o"></i></a>
						<div id="notificationContainer">
							<div id="notificationTitle">Pemberitahuan</div>				
								<div id="notificationsBody" class="notifications">
								<?php
									$view=$pdo->query("SELECT info FROM info ORDER BY id_info desc");
									while($row = $view->fetch(PDO::FETCH_ASSOC)){
								?>
										<ul class="collection">
											<li class="collection-item avatar">
												<i class="material-icons circle green">insert_chart</i>
												<p><?php echo $row['info'];?></p>
											</li>
										</ul>
								<?php
									}
								?>
								</div>
						</div>
					</li>
					<li>
						<a href="../dashboard/logout"><i class="fa fa-sign-out"></i></a>
					</li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<div class="logo">
						<a href="../dashboard/"><img class="logo-sino" src="../assets/images/logo-sino-dark.png"></a>
					</div>
					<p class="text"><span><?php echo $nama_siswa; ?></span></br><?php echo $nama_kelas; ?></p>
					<!-- 
					<li class="active"><a href="../dashboard/">Home</a></li>
					<li><a href="nilai/uhar.php">Ulangan Harian</a></li>
					<li><a href="nilai/uts.php">Ulangan Tengah Semester</a></li>
					<li><a href="nilai/uas.php">Ulangan Akhir Semester</a></li>
					<li><a href="settings/">Pengaturan</a></li>
					-->
				</ul>
			</div>
		</nav>
		<!-- Akhir Navbar-->

		<!-- Sidebar-->
		<div class="side-nav fixed">
			<div class="logo">
				<a href="../dashboard/"><img class="logo-sino" src="../assets/images/logo-sino-dark.png"></a>
			</div>
			<p class="text"><span><?php echo $nama_siswa; ?></span></br><?php echo $nama_kelas; ?></p>
			<!--
			<li class="active"><a href="../dashboard/">Home</a></li>
			<li><a href="nilai/uhar.php">Ulangan Harian</a></li>
			<li><a href="nilai/uts.php">Ulangan Tengah Semester</a></li>
			<li><a href="nilai/uas.php">Ulangan Akhir Semester</a></li>
			<li><a href="settings/">Pengaturan</a></li>
			-->
		</div>
		<!-- Akhir Sidebar-->

		<!--Konten-->
		<main>
			<div class="container">
				<div class="row">
					<div class="col s12">
						<h2>Biodata Siswa<b></b></h2>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<!-- Modal Structure -->
						<div id="modal1" class="modal modal-fixed-footer">
							<div class="modal-content">
								<h1>Getting Started</h1>
								<p>Selamat datang di Sistem Informasi Nilai Online, Silahkan isi form dibawah terlebih dahulu.</p>
								<p class="red-text">*Isi data sesuai raport.</p>
								<form class="col s12" action="" method="post" name="edit">
									<input value="" type="hidden" name="id">
									<div class="input-field col s12">
										<input value="" id="first_name2" type="text" name="nama" required>
										<label class="active" for="first_name2">Nama</label>
									</div>
									<div class="input-field col s12">
										<input value="" id="first_name2" type="text" name="nama" required>
										<label class="active" for="first_name2">Nama</label>
									</div>
									<div class="input-field col s12">
										<input value="" id="first_name2" type="text" name="nama" required>
										<label class="active" for="first_name2">Nama</label>
									</div>
									<button class="btn waves-effect waves-light" href="infosis.php">Back
									</button>
									<button class="btn waves-effect waves-light" type="submit" name="submit">Submit
									</button>
								</form>
							</div>
							<div class="modal-footer">
								<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		<!--Akhir Konten-->	
		
		<!--Footer-->
			<div class="footer">
				<i class="fa fa-copyright"></i>2015. Dibuat oleh IT Club SMAN 1 Cibadak
			</div>
		</main>
		<!--Akhir Footer-->
		  
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
		<script>  $(".button-collapse").sideNav();</script>
		<script type="text/javascript" src="../assets/js/countup.js"></script>
		<script type="text/javascript" >
			$(document).ready(function()
			{
			$("#notificationLink").click(function()
			{
			$("#notificationContainer").fadeToggle(300);
			$("#notification_count").fadeOut("slow");
			return false;
			});

			//Document Click hiding the popup 
			$(document).click(function()
			{
			$("#notificationContainer").hide();
			});

			//Popup on click
			$("#notificationContainer").click(function()
			{
			return false;
			});

			});
		</script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-77179797-1', 'auto');
		  ga('send', 'pageview');
		</script>
		<script>
			$('#modal1').openModal(
			{
				dismissible: false, // Modal can be dismissed by clicking outside of the modal
				opacity: .5, // Opacity of modal background
				in_duration: 300, // Transition in duration
				out_duration: 200, // Transition out duration
			}
			);
		</script>
		<!-- BEGIN JIVOSITE CODE {literal} -->
		<script type='text/javascript'>
			(function(){ var widget_id = 'br7vcqFLWo';
			var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/geo-widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();
		</script>
		<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>