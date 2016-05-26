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
<div class="container-fluid">
<h1 style="text-align:center">Registrasi dan verifikasi data siswa</h1>
<div class="container">
<div class=" page-content">
    <div class="row">
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Informasi">
                            <span class="round-tab">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
					<div class="step">
						<img src="../assets/images/owl_ex2.png" style="height: 120px; display: block; margin-left: auto; margin-right: auto; margin-bottom: 25px;">
						<h2 class="hero" style="text-align:center">Selamat datang di SINO Pas Connect,</h2>
						<p style="text-align:center">Kami melihat Anda baru pertama kali membuka web ini. Sebelum melanjutkan, isi terlebih dahulu data-data berikut.</p>
                    </div>
                        <ul class="list-inline text-center">
                            <li><button type="button" class="btn btn-primary next-step">Oke, Lanjutkan!</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="step2">
						<h2 class="hero" style="text-align:center; margin:none">Isi sesuai data di rapot Anda</h2>
						<p style="text-align:center;">Gunakan huruf kapital di awal kata</p>
                            <div class="step_21">
                                <div class="row">
                                <form action="" method="POST" name="datsis">
									<div class="form-group">
										<label>Nama Lengkap</label>
										<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
										<span id="helpBlock" class="help-block">Isi sesuai yang ada di kartu keluarga(KK) atau KTP</span>
									</div>
									<div class="form-group">
										<label>NISN</label>
										<input type="text" class="form-control" placeholder="NISN" name="nis" required>
									</div>
									  <div class="form-group">
										<label>Tempat Lahir</label>
										<input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required>
									  </div>
									<div class="form-group">
										<label>Tanggal Lahir</label></br>
										<div class="col-md-4 col-xs-4">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">Tanggal</option>
                                                <option value="2">1</option>
                                                <option value="1">2</option>
                                                <option value="4">3</option>
                                                <option value="5">4</option>
                                                <option value="6">5</option>
                                                <option value="3">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">Bulan</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
												<option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">Tahun</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
												<option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                            </select>
                                        </div></div>
									<div class="form-group">
									<label>Jenis Kelamin</label></br>
										<label class="radio-inline">
										  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Laki-laki
										</label>
										<label class="radio-inline">
										  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Perempuan
										</label>
									</div>
									<div class="form-group">
										<label>Anak ke</label>
										<input type="text" class="form-control" placeholder="Misal, 2" name="anak_ke" required>
									</div>
									<div class="form-group">
										<label>Alamat siswa</label>
										<textarea class="form-control" rows="3" placeholder="Tulis alamat lengkap" name="alamat_siswa" required></textarea>
									</div>
									<div class="form-group">
										<label>No telepon siswa</label>
										<input type="text" class="form-control" placeholder="No Telepon Siswa" name="no_telpon_anak" required>
									</div>
									<div class="form-group">
										<label>Asal sekolah</label>
										<input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" required>
									</div>
									<div class="form-group">
										<label>Diterima di kelas</label>
										<input type="text" class="form-control" placeholder="Diterima di kelas" name="asal_kelas" required>
									</div>
									<div class="form-group">
										<label>Diterima pada tanggal</label>
										<input type="text" class="form-control" placeholder="Diterima pada tanggal" name="tgl_terima" required>
									</div>
									<div class="form-group">
										<label>Nama Ayah</label>
										<input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" required>
									</div>
									<div class="form-group">
										<label>Nama Ibu</label>
										<input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" required>
									</div>
									<div class="form-group">
										<label>Alamat Orang Tua</label>
										<textarea class="form-control" rows="3" placeholder="Tulis alamat lengkap" name="alamat_ortu" required></textarea>
									</div>
									<div class="form-group">
										<label>Nomor Telepon Rumah</label>
										<input type="text" class="form-control" placeholder="Nomor Telepon Rumah" name="no_telpon_ortu" required>
									</div>
									<div class="form-group">
										<label>Pekerjaan Ayah</label>
										<input type="text" class="form-control" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah" required>
									</div>
									<div class="form-group">
										<label>Pekerjaan Ibu</label>
										<input type="text" class="form-control" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" required>
									</div>
									<div class="form-group">
										<label>Nama Wali</label>
										<input type="text" class="form-control" placeholder="Nama Wali" nama="nama_wali" required>
									</div>
									<div class="form-group">
										<label>Alamat Wali</label>
										<textarea class="form-control" rows="3" placeholder="Tulis alamat lengkap" name="alamat_wali" required></textarea>
									</div>
									<div class="form-group">
										<label>Nomor Telepon Wali</label>
										<input type="text" class="form-control" placeholder="Nomor Telepon Wali" nama="no_telpon_wali" required>
									</div>
									<div class="form-group">
										<label>Pekerjaan Wali</label>
										<input type="text" class="form-control" placeholder="Pekerjaan Wali" name="pekerjaan_wali" required>
									</div>
									<ul class="list-inline pull-right">
										<li><button type="button" class="btn btn-default prev-step">Sebelumnya</button></li>
										<li><button type="submit" class="btn btn-primary next-step" name="setup_datsis">Simpan dan lanjutkan</button></li>
									</ul>
								</form>
                                </div>
                            </div>
                            <div class="step-22">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <form action="" method="post" name="step2">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" placeholder="Username" name="user">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" placeholder="Password" name="pass">
							</div>
							<ul class="list-inline pull-right">
								<li><button type="button" class="btn btn-default prev-step">Sebelumnya</button></li>
								<li><button type="submit" class="btn btn-primary next-step" name="setup_user">Simpan</button></li>
							</ul>
						</form>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="step44">
							<img src="../assets/images/owl_ex2.png" style="height: 120px; display: block; margin-left: auto; margin-right: auto; margin-bottom: 25px;">
							<h2 class="hero" style="text-align:center">Selesai!</h2>
							<p style="text-align:center">Terimakasih atas waktunya, data anda berhasil di simpan.</p>
						<ul class="list-inline text-center">
							<li><button type="button" class="btn btn-default prev-step">Sebelumnya</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Buka Dashboard</button></li>
                        </ul>
						</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
   </div>
</div>
</div>
<div class="footer"><i class="fa fa-copyright"></i> 2016. SINO V.4.0 Dibuat oleh IT Club SMAN 1 Cibadak</div>
<!-- Akhir Halaman -->
</div>

	
<!-- Javascript -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/sino.js"></script>
<!-- Akhir Javascript -->
</body>
</html>
