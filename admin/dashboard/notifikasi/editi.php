<?php
	session_start();
	include_once '../../connect/conn.php';

	if(!isset($_SESSION['user']))
	{
		header("Location: ../../");
	}
	$res=$pdo->query("SELECT * FROM user_admin WHERE id_admin=".$_SESSION['user']);
	$bow=$res->fetch(PDO::FETCH_ASSOC);
	$login_session = $bow['nama_admin'];
	if(!isset($login_session)){
		header('Location: ../../'); // Mengarahkan ke Home Page
	}
	$id_info = $_GET['info'];
	$query = $pdo->query("select * from info where id_info='$id_info'");
    $row = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Info - <?php echo $bow['nama_admin']; ?> </title>
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
					<span><b><?php echo $bow['nama_admin']; ?></b></span></br><?php echo $bow['jabatan']; ?>
				</p>
				<li><a href="../">Dashboard</a></li>
				<li><a href="../DataSiswa">Data Siswa</a></a></li>
				<?php if($bow['jabatan'] == 'Administrator') {
				?>
					<li><a href="../DataAdmin/">Data Admin</a></li>
				<?php }
				?>
				<li><a href="../SetupPelajaran/">Setup Pelajaran</a></li>
				<li><a href="../SetupKelas/">Setup Kelas</a></li>
				<li class="active"><a href="../notifikasi/">Tambah Notifikasi &rarr; Edit</a></li>
				<li><a href="../UploadNilai/">Upload Nilai</a></li>
				<li><a href="../Settings/">Pengaturan</a></li>
		</div>
		<main>
			<div class="container">
				<div class="col s12">
					<h2>Edit Info</h2>
					<div class="row">
						<form class="col s12" action="prosesi.php" method="post" name="form1">
							<input type="hidden" name="id_info" value="<?php echo $row['id_info']; ?>">
							<div class="input-field col s12">
								<textarea id="textarea1" class="materialize-textarea" name="info"><?php //echo $row['info'];?></textarea>
								<label for="textarea1">Notifikasi</label>
							</div>
							<button class="btn waves-effect waves-light" href="../notifikasi/">Back
							</button>
							<button class="btn waves-effect waves-light" type="submit" name="submit">Submit
							</button>
						</form>
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
	  <script>
		var data = <?php echo json_encode($row['info']); ?>;
		$('#textarea1').val(data);
		$('#textarea1').trigger('autoresize');
	  </script>
	  <script type="text/javascript" src="../assets/js/countup.js"></script>
	  </body>
  </html>	
	
