<?php
	session_start();
	include_once '../../connect/conn.php';

	if(!isset($_SESSION['user']))
	{
		header("Location: ../../");
	}
	$res=$pdo->query("SELECT * FROM user_admin WHERE id_admin=".$_SESSION['user']);
	$row=$res->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Siswa - <?php echo $row['nama_admin']; ?> </title>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../../assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../../assets/css/custom.css"  media="screen,projection"/>
		<link rel="stylesheet" href="../../assets/font/font-awesome/css/font-awesome.min.css">
		<link rel="icon" type="image/x-icon" href="../../assets/images/favicon.png"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
    <body>
		<nav>
			<div class="nav-wrapper">
				<a href="#!" class="brand-logo">SINO</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<!-- <li><a href="sass.html"><i class="fa fa-bell-o"></i></a></li> -->
					<li><a href="../logout/"><i class="fa fa-sign-out"></i></a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="../logout/"><i class="fa fa-sign-out"></i> Keluar</a></li>
				</ul>
			</div>
		</nav>
		<!-- Page Layout here -->
		<div class="side-nav fixed">
			<div class="logo">
				<a href="#"><img class="logo-sino" src="../../assets/images/logo-sino-admin.png"></a>
			</div>
				<p class="text">
					<span><b><?php echo $row['nama_admin']; ?></b></span></br><?php echo $row['jabatan']; ?>
				</p>
				<li><a href="../">Dashboard</a></li>
				<li class="active"><a href="../DataSiswa">Data Siswa &rarr; Tambah</a></li>
				<?php if($row['jabatan'] == 'Administrator') {
				?>
					<li><a href="../DataAdmin/">Data Admin</a></li>
				<?php }
				?>
				<li><a href="../SetupPelajaran/">Setup Pelajaran</a></li>
				<li><a href="../SetupKelas/">Setup Kelas</a></li>
				<li><a href="../notifikasi/">Tambah Notifikasi</a></li>
				<li><a href="../UploadNilai/">Upload Nilai</a></li>
				<li><a href="../Settings/">Pengaturan</a></li>
		</div>
		<main>
			<div class="container">
				<div class="row">
					<h2>Tambah Siswa</h2>
				</div>
				<div class="row">
					<p class="red-text">*Download panduan terlebih dahulu.</p>
					<a href="../../files/PETUNJUK1.pdf" class="waves-effect waves-light btn">Panduan</a>
					<a href="../../files/Master%20Datsis.xlsx" class="waves-effect waves-light btn">Master Siswa</a>
					<a href="../../files/Master%20tbl_ruangan.xlsx" class="waves-effect waves-light btn">Master Ruangan</a>
					<a href="http://hayageek.com/examples/php/xls-to-csv/convert.php" target="_blank" class="waves-effect waves-light btn">Convert</a>
					<a href="../SetupKelas/" target="_blank" class="waves-effect waves-light btn">Kelas</a>
				</div>
				<div class="row">
				</div>
				<div class="row">
					<h2>Data Siswa</h2>
				</div>
				<div class="row">
					<?php if (isset($_POST['submit_siswa'])) { //Script akan berjalan jika di tekan tombol submit..
	 
							//Script Upload File..
							if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
								echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
								echo "<h2>Menampilkan Hasil Upload:</h2>";
								readfile($_FILES['filename']['tmp_name']);
							}
		 
							//Import uploaded file to Database, Letakan dibawah sini..
							$handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
							while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
								if(($data[0] != "NAMA_SISWA") && ($data[0] != "")) {
									$import= $pdo->query ("INSERT into data_siswa (nama_siswa,nis,no_peserta,username,password) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')");
								}
								 //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
							}
					 
							fclose($handle); //Menutup CSV file
							echo "<br><strong>Import data selesai.</strong>";
		
						}else { 
						//Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
							<form enctype='multipart/form-data' action='' method='post'>
								<div class="file-field input-field">
									<div class="btn">
										<span>File</span>
										<input type="file" name='filename' size='100' multiple>
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" placeholder="Upload CSV">
									</div>
									<button class="btn waves-effect waves-light" type="submit" name="submit_siswa">Upload
									</button>
								</div>
							</form>
				<?php } ?>
				</div>
				<br>
				<div class="row">
					<h2>Tabel Ruangan</h2>
				</div>
				<div class="row">
					<?php if (isset($_POST['submit_kelas'])) { //Script akan berjalan jika di tekan tombol submit..
	 
							//Script Upload File..
							if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
								echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
								echo "<h2>Menampilkan Hasil Upload:</h2>";
								readfile($_FILES['filename']['tmp_name']);
							}
		 
							//Import uploaded file to Database, Letakan dibawah sini..
							$handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
							while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
								if(($data[0] != "NIS") && ($data[0] != "")) {
									$import= $pdo->query ("INSERT into tbl_ruangan (nis,id_kelas) values('$data[0]','$data[1]')");
								}
								 //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
							}
					 
							fclose($handle); //Menutup CSV file
							echo "<br><strong>Import data selesai.</strong>";
		
						}else { 
						//Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
							<form enctype='multipart/form-data' action='' method='post'>
								<div class="file-field input-field">
									<div class="btn">
										<span>File</span>
										<input type="file" name='filename' size='100' multiple>
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" placeholder="Upload CSV">
									</div>
									<button class="btn waves-effect waves-light" type="submit" name="submit_kelas">Upload
									</button>
								</div>
							</form>
				<?php } ?>
				</div>
				
				
			</div>
	<div class="footer">
		<i class="fa fa-copyright"></i>2015. Dibuat oleh IT Club SMAN 1 Cibadak
	</div>
  
	</main>

          
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../../assets/js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../../assets/js/materialize.min.js"></script>
	  <script>  $(".button-collapse").sideNav();</script>
	  <script type="text/javascript" src="../../assets/js/countup.js"></script>
	  </body>
  </html>
