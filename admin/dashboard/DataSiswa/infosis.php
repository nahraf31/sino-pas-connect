<?php
	session_start();
	include_once '../../connect/conn.php';

	if(!isset($_SESSION['user']))
	{
		header("Location: ../../");
	}
	$res=$pdo->query("SELECT * FROM user_admin WHERE id_admin=".$_SESSION['user']);
	$row=$res->fetch(PDO::FETCH_ASSOC);
	$status=1;
	if(isset($_GET['status'])) {
		$status=$_GET['status'];
	}
	if(isset($_POST['submit']))
	{
		$status=0;
		$id=$_POST['id'];
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$nis=$_POST['nis'];
		$nama=$_POST['nama'];
		$query=$pdo->query("UPDATE data_siswa SET username='$user', password='$pass', nis='$nis', nama_siswa='$nama' WHERE nis='$nis'");
		if($query) {
			$status=2;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Info Siswa - <?php echo $row['nama_admin'];?> </title>
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
					<li><a href="../logout"><i class="fa fa-sign-out"></i></a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="../logout"><i class="fa fa-sign-out"></i> Keluar</a></li>
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
				<li class="active"><a href="../DataSiswa">Data Siswa &rarr; Info Siswa</a></a></li>
				<?php if($row['jabatan'] == 'Administrator') {
				?>
					<li><a href="../dashboard/DataAdmin/">Data Admin</a></li>
				<?php }
				?>
				<li><a href="../SetupPelajaran/">Setup Pelajaran</a></li>
				<li><a href="../SetupKelas/">Setup Kelas</a></li>
				<li><a href="../notifikasi/">Tambah Notifikasi</a></li>
				<li><a href="../UploadNilai/">Upload Nilai</a></li>
		</div>
		<main>
			<div class="container">
				<div class="row">
					<div class="row">
						<h1>Info Siswa</h1>
					</div>
					<div class="row">
						<?php
							if($status == 2) {
						?>
								<div class="row">
									<div class="col s12 m5">
										<div class="card-panel light-blue lighten-3">
											<span class="white-text">Berhasil edit.
											</span>
										</div>
									</div>
								</div>
						<?php
							} else if($status == 0) {
								echo "<p>Gagal edit.</p>";
							} else if($status == 5) {
						?>
								<div class="row">
									<div class="col s12 m5">
										<div class="card-panel light-blue lighten-3">
											<span class="white-text">Berhasil hapus.
											</span>
										</div>
									</div>
								</div>
						<?php
							}
						?>
							
						<table class="highlight">
							<thead>
							  <tr>
								  <th data-field="no">No</th>
								  <th data-field="nama">Nama</th>
								  <th data-field="nis">NIS</th>
								  <th data-field="kelas">Kelas</th>
								  <th data-field="user">Username</th>
								  <th data-field="pass">Password</th>
								  <th data-field="edit">Action</th>
							  </tr>
							</thead>

							<tbody>
							<?php 
								$view=$pdo->query("SELECT * FROM data_siswa");
								$query=$pdo->query("SELECT * FROM tbl_ruangan");
								$col=$query->fetch(PDO::FETCH_ASSOC);
								$i = 1;
								while($row=$view->fetch(PDO::FETCH_ASSOC)){ 
									$nis1=$row['nis'];
									$lihat=$pdo->query("SELECT kelas.nama_kelas FROM setup_kelas kelas, tbl_ruangan ruangan WHERE ruangan.nis='$nis1' AND ruangan.id_kelas=kelas.id_kelas ");
									$tbl=$lihat->fetch(PDO::FETCH_ASSOC);
							?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['nama_siswa']; ?></td>
										<td><?php echo $row['nis']; ?></td>
										<td><?php echo $tbl['nama_kelas']; ?></td> <!-- Repaired soon -->
										<td><?php echo $row['username']; ?></td>
										<td>*****</td>
										<td><a onclick="return confirm('Are you sure you want to delete this item?');" href="delinfosis.php?id=<?php echo $row['nis']; ?>"> Delete </a></td>
										<td><a href="editinfosis.php?id=<?php echo $row['nis']; //bug ?>"> Edit </a></td>
									</tr>
							<?php
									$i++;
								}
							?>
							</tbody>
						</table>
					</div>
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