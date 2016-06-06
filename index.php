<?php  
	session_start();
	include "connect/conn.php";

	if (isset($_POST['login'])){
		//koneksi terpusat
		$username=$_POST['username'];
		$password=$_POST['password'];
		$statement = $pdo->query("SELECT * FROM data_siswa WHERE username='$username' AND password='$password'");
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$nis=$row['nis'];
		if($nis!=''){
			$_SESSION['username']=$username;
			$_SESSION['nis']=$nis;
			$_SESSION['waktu']=date("Y-m-d H:i:s");
?>
			<script language="javascript">document.location.href="dashboard/";</script>
<?php
		} else {
?>
			<script language="javascript">document.location.href="index.php?status=1";</script>
<?php
		}
	} else {
		unset($_POST['login']);
	}
	
	if(isset($_SESSION['username'])){
?>
		<script language="javascript">document.location.href="dashboard/";</script>
<?php
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="SINO merupakan aplikasi web yang memungkinkan para pelajar mengetahui nilainya secara online, mudah, cepat dan rahasia. Sehingga user tidak perlu khawatir privasi data miliknya diketahui oleh orang lain. SINO sendiri merupakan singkatan dari "Sistem Informasi Nilai Online", pengembangan web ini terinspirasi dari aplikasi Pas Connect. Sehingga dalam versi ini kami menggunakan nama "SINO Pas Connect".">
    <meta name="author" content="Rizqi Farhan, Alvira Mohamad, Rizky Ilhamsyah, Alfian Isnan, Adhiyatma Nugraha, M.Irsyad">
	
    <title>Sistem Informasi Nilai Online</title>

    <!-- Memanggil CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
	<!-- Memanggil Font dan Ikon-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:200,300,400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="assets/images/favicon.png"/>
</head>
<body>
<!-- Menu Atas -->
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#home">SINO PAS CONNECT</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="#about">About</a></li>
			<li><a href="#features">Features</a></li>
			<li><a href="#team">Team</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
<!-- Akhir Menu Atas -->
<!--Header -->
	<section class="bg-1" id="home">
	<div class="container header">
			<div class="row" style="text-align:center">
				<div class="sidebar-brand"><img src="assets/images/logo-sino-dark.png"></div>
			</div>
			<div class="row" style="margin-top:30px;margin-bottom:30px;text-align:center">
				<div class="login-box">
					<h4>Ketahui nilai Anda segera!</h4>
					<div class="alert-login">
					<?php 
					if (isset($_GET['status'])) {
						if ($_GET['status']==1) {
					?>
								<div class="alert alert-danger">
								  Username atau password salah
								</div>
								<div class="alert alert-info">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  Hubungi Admin bila masalah terus berlanjut.
								</div>

					<?php	
						} else if ($_GET['status']==2) {
					?>
								<div class="alert alert-success">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  Anda telah berhasil keluar.
								</div>
					<?php			
						}
					}	
					?>
				</div>
					<form action="index.php" method="post" name="postform">
						<div class="form-group">
							<div class="inner-addon left-addon space-top">
							  <i class="fa fa-user"></i>
							  <input type="text" class="form-control" placeholder="Username" name="username" required title="Masukan username Anda"/>
							</div>
							<div class="inner-addon left-addon space-top">
							  <i class="fa fa-lock"></i>
							  <input type="password" class="form-control" placeholder="Password" name="password" required title="Masukan password Anda"/>
							</div>
						</div>
						<button type="submit" class="btn btn-primary" style="margin:0; width:100%" name="login" data-loading-text="Loading...">Login</button>
					</form>
				
			</div>

				
			</div>
	</div>	
	</section>
	<section class="bg-2" id="about">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<img src="assets/images/about_sino.png" class="featured-img">
				</div>
				<div class="col-sm-6 col-xs-12">
					<h2>About <span>SINO</span></h2>
					<p>SINO merupakan aplikasi web yang memungkinkan para pelajar mengetahui nilainya secara online, mudah, cepat dan rahasia. Sehingga user tidak perlu khawatir privasi data miliknya diketahui oleh orang lain. SINO sendiri merupakan singkatan dari "Sistem Informasi Nilai Online", pengembangan web ini terinspirasi dari aplikasi Pas Connect. Sehingga dalam versi ini kami menggunakan nama "SINO Pas Connect".
				</div>
			</div>
		</div>
	</section>
	<section class="bg-3" id="features">
	<div class="container">
		<div class="col-sm-12 text-center space-top">
			<h2>Why Use <span>SINO ?</span></h2>
		</div>
		<div class="row"> 
			<!--step 1-->
			<div class="col-md-4" style="text-align:center">
				<div class="feature">
					<img class="feature-img" src="assets/images/responsiv.svg" alt="Easy to use"> 
					<h4 class="space-top">Mudah digunakan</h4>
					<p>Dengan UI yang sederhana, teknologi web yang mutahir, dan desain yang responsive. Membuat SINO dapat digunakan dengan mudah dan dapat diakses melalui perangkat apapun</p>
				</div>
			</div>
			<div class="col-md-4" style="text-align:center">
				<div class="feature">
					<img class="feature-img" src="assets/images/privasi.svg" alt="Data Safe"> 
					<h4 class="space-top">100% Privasi</h4>
					<p>Kami sangat menghargai privasi Anda. Kami menjamin user lain tidak dapat mengetahui data nilai Anda</p>
				</div>
			</div>
			<div class="col-md-4" style="text-align:center">
				<div class="feature">
					<img class="feature-img" src="assets/images/akurat.svg" alt="Data Real"> 
					<h4 class="space-top">Data yang akurat</h4>
					<p>Data yang diimpor ke database kami merupakan hasil scanning lembar jawaban komputer. Selama Anda mengisi LJK dengan baik, maka data yang ada 100% akurat.</p>
				</div>
			</div>
		</div>
	</div>
	</section>
	<section class="bg-4" id="team">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
				<div class="call-to-action">
					<h3>Made with <i class="fa fa-heart"></i> for SMAN 1 Cibadak</h3>
					<p>Meet our team</p>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-12 space-top">
				<div class="author">
					<img src="assets/images/1.jpg" class="avatar">
					<div class="name">M Rizqi Farhan</div>
					<div class="title">Backend Engineer</div>
				</div>
				<div class="author">
					<img src="assets/images/2.jpg" class="avatar">
					<div class="name">Alfian Isnan</div>
					<div class="title">Backend Developer</div>
				</div>
				<div class="author">
					<img src="assets/images/3.jpg" class="avatar">
					<div class="name">Alvira Mohamad</div>
					<div class="title">Frontend Engineer</div>
				</div>
				<div class="author">
					<img src="assets/images/4.jpg" class="avatar">
					<div class="name">M. Irysad</div>
					<div class="title">Frontend Developer</div>
				</div>
				<div class="author">
					<img src="assets/images/5.jpg" class="avatar">
					<div class="name">Rizky Ilhamsyah</div>
					<div class="title">Database Analytics</div>
				</div>
				<div class="author">
					<img src="assets/images/6.jpg" class="avatar">
					<div class="name">Adhiyatma N</div>
					<div class="title">Database Analytics</div>
				</div>
				<div class="author">
					<img src="assets/images/7.jpg" class="avatar">
					<div class="name">Karberos</div>
					<div class="title">Analytics System</div>
				</div>
			</div>
		</div>
	</div>
	</section>
	<section class="bg-2" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xs-12 text-center">
					<h2>Any <span>questions ?</span></h2>
					<a href="javascript:jivo_api.open();" class="btn btn-default btn-lg"><i class="fa fa-send"></i>  Start Chat</a>
				</div>
			</div>
		</div>
	</section>
	<footer class="dark"><i class="fa fa-copyright"></i> 2016. SINO V 4.0 Dibuat oleh <a href="https://itcsmandak.com/">IT Club SMAN 1 Cibadak</a></footer>
<!-- Javascript -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/parallax.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<script>
function "javascript:jivo_api.open();"
</script>

<!-- Akhir Javascript -->
</body>
</html>