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
		$nis=0;
		header('Location: ../'); 
	}
?>
<!DOCTYPE html>
  <html>
    <head>
		  <title><?php echo $nama_siswa; ?> - UTS</title>
		  <!--Import Google Icon Font-->
		  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		  <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.png"/>
		  <!--Import materialize.css-->
		  <link type="text/css" rel="stylesheet" href="../../assets/css/materialize.min.css"  media="screen,projection"/>
		  <link type="text/css" rel="stylesheet" href="../../assets/css/custom.css"  media="screen,projection"/>
		  <link rel="stylesheet" href="../../assets/font/font-awesome/css/font-awesome.min.css">
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
						<a href="../logout"><i class="fa fa-sign-out"></i></a>
					</li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<div class="logo">
						<a href="#"><img class="logo-sino" src="../../assets/images/logo-sino-dark.png"></a>
					</div>
					<p class="text"><span><?php echo $nama_siswa; ?></span></br><?php echo $nama_kelas; ?></p>
					<li><a href="../">Home</a></li>
					<li><a href="uhar.php">Ulangan Harian</a></li>
					<li class="active"><a href="uts.php">Ulangan Tengah Semester</a></li>
					<li><a href="uas.php">Ulangan Akhir Semester</a></li>
					<li><a href="../settings/">Pengaturan</a></li>
				</ul>
			</div>
		</nav>
		<!-- Akhir Navbar-->

		<!-- Sidebar-->
		<div class="side-nav fixed">
			<div class="logo">
				<a href="#"><img class="logo-sino" src="../../assets/images/logo-sino-dark.png"></a>
			</div>
					<p class="text"><span><?php echo $nama_siswa; ?></span></br><?php echo $nama_kelas; ?></p>
					<li><a href="../">Home</a></li>
					<li><a href="uhar.php">Ulangan Harian</a></li>
					<li class="active"><a href="uts.php">Ulangan Tengah Semester</a></li>
					<li><a href="uas.php">Ulangan Akhir Semester</a></li>
					<li><a href="../settings/">Pengaturan</a></li>
		</div>
		<!-- Akhir Sidebar-->

		<!--Konten-->
		<main>
			<div class="container">
				<div class="row">
					<div class="col s7">
						<h1 class="judul-halaman">Ulangan Tengah Semester</h1>
					</div>
					<div class="col s5">
						<div class="keterangan">
							<i class="fa fa-circle" style="color:#77d972"></i>Lulus 
							<i class="fa fa-circle" style="color:#e34d4e"></i>Tidak Lulus
						</div>
					</div>
					<div class="row">
						<div class="col s12" style="text-align:center">
							<?php
								$view = $pdo->query("SELECT nama_pelajaran, nilai, kkm, jenis FROM tbl_nilai nilai, setup_pelajaran pelajaran WHERE nilai.nis='$nis' and nilai.id_pelajaran=pelajaran.id_pelajaran ORDER BY pelajaran.nama_pelajaran asc");
				
								$i = 1;
								while($row = $view->fetch(PDO::FETCH_ASSOC)){
							?>
							<?php	
									if ($row['jenis'] == 2 ) {
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
							<?php
										$i++;
									}
								}
							?>
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
		<script type="text/javascript" src="../../assets/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../../assets/js/materialize.min.js"></script>
		<script>  $(".button-collapse").sideNav();</script>
		<script type="text/javascript" src="../../assets/js/countup.js"></script>
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
		
		<!-- BEGIN JIVOSITE CODE {literal} -->
		<script type='text/javascript'>
			(function(){ var widget_id = 'br7vcqFLWo';
			var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/geo-widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();
		</script>
		<!-- {/literal} END JIVOSITE CODE -->
	</body>
</html>