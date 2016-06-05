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
		<title>Tambah Notifikasi - <?php echo $row['nama_admin'];?> </title>
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
				<li><a href="../DataSiswa">Data Siswa</a></a></li>
				<?php if($row['jabatan'] == 'Administrator') {
				?>
					<li><a href="../DataAdmin/">Data Admin</a></li>
				<?php }
				?>
				<li><a href="../SetupPelajaran/">Setup Pelajaran</a></li>
				<li><a href="../SetupKelas/">Setup Kelas</a></li>
				<li class="active"><a href="../notifikasi/">Tambah Notifikasi</a></li>
				<li><a href="../UploadNilai/">Upload Nilai</a></li>
		</div>
		<main>
			<div class="container">
				<div class="row">
					<div class="row">
						<h1> Masukan notifikasi</h1>
						<form action="simpani.php" method="post" name="postform">
							<div class="input-field col s12">
								<textarea name="info" id="textarea1" class="materialize-textarea"></textarea>
								<label for="textarea1">Notifikasi info</label>
							</div>
							<button name="simpan" class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
						</form>
					</div>
					<div class="row">
						<table class="highlight">
							<thead>
							  <tr>
								  <th data-field="id">No</th>
								  <th data-field="name">Notifikasi</th>
								  <th data-field="price">Action</th>
							  </tr>
							</thead>

							<tbody>
							<?php 
								$view=$pdo->query("SELECT info,id_info FROM info");
								$i = 1;
								while($row=$view->fetch(PDO::FETCH_ASSOC)){ 
							?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['info']; ?></td>
										<td><a href="deletei.php?info=<?php echo $row['id_info']; ?>"> Delete </a></td>
										<td><a name="info" href="editi.php?info=<?php echo $row['id_info']; //bug ?>"> Edit </a></td>
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
	  <script type="text/javascript" src="../assets/js/countup.js"></script>
	  </body>
  </html>