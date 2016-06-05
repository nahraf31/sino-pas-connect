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
	if(isset($_POST['tambah']))
	{
		$status=0;
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$query=$pdo->query ("INSERT into setup_kelas (nama_kelas,id_kelas) values('$nama','$id')");
		if($query) {
			$status=3;
		}
	}
	if(isset($_POST['submit']))
	{
		$status=0;
		$id=$_POST['id'];
		$id_lama=$_POST['id_lama'];
		$nama=$_POST['nama'];
		$query=$pdo->query("UPDATE setup_kelas SET id_kelas='$id', nama_kelas='$nama' WHERE id_kelas='$id_lama'");
		if($query) {
			$status=2;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Setup Kelas - <?php echo $row['nama_admin'];?> </title>
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
						<span><b><?php echo $row['nama_admin']; ?></b></span></br><?php echo "Jabatan Admin"; ?>
				</p>
				<li><a href="../">Dashboard</a></li>
				<li><a href="../DataSiswa">Data Siswa</a></a></li>
				<li><a href="../DataAdmin/">Data Admin</a></li>
				<li><a href="../SetupPelajaran/">Setup Pelajaran</a></li>
				<li class="active"><a href="../SetupKelas/">Setup Kelas</a></li>
				<li><a href="../notifikasi/">Tambah Notifikasi</a></li>
				<li><a href="../UploadNilai/">Upload Nilai</a></li>
		</div>
		<main>
			<div class="container">
				<div class="row">
					<div class="row">
						<h1>Tambah Kelas</h1>
					</div>
					<div class="row">
						<form class="col s12" action="../SetupKelas/" method="post" name="edit">
							<div class="input-field col s12">
								<input id="first_name2" type="text" name="nama">
								<label class="active" for="first_name2">Nama Kelas</label>
							</div>
							<div class="input-field col s12">
								<input id="first_name2" type="text" name="id">
								<label class="active" for="first_name2">ID Kelas</label>
							</div>
							<button class="btn waves-effect waves-light" type="submit" name="tambah">Submit
							</button>
						</form>
					</div>
					<br>
					<div class="row">
						<h1>Setup Kelas</h1>
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
							} else if($status == 3) {
						?>
								<div class="row">
									<div class="col s12 m5">
										<div class="card-panel light-blue lighten-3">
											<span class="white-text">Berhasil Tambah.
											</span>
										</div>
									</div>
								</div>
						<?php
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
								  <th data-field="nama">Nama Kelas</th>
								  <th data-field="id">ID Kelas</th>
								  <th data-field="id">Action</th>
							  </tr>
							</thead>

							<tbody>
							<?php 
								$query=$pdo->query("SELECT * FROM setup_kelas");
								$i = 1;
								while($row=$query->fetch(PDO::FETCH_ASSOC)){ 
								
							?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['nama_kelas']; ?></td>
										<td><?php echo $row['id_kelas']; ?></td>
										<td><a onclick="return confirm('Are you sure you want to delete this item?');" href="delsetkel.php?id=<?php echo $row['id_kelas']; ?>"> Delete </a></td>
										<td><a href="editsetkel.php?id=<?php echo $row['id_kelas']; //bug ?>"> Edit </a></td>
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
      <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
	  <script>  $(".button-collapse").sideNav();</script>
	  <script type="text/javascript" src="../assets/js/countup.js"></script>
	  </body>
  </html>