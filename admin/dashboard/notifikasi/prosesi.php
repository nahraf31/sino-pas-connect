<?php
	include('../../connect/conn.php');//cek apakah sudah login 
	$id=$_POST['id_info'];
	$info=$_POST['info'];
	//Disini query untuk mengupdate
	$query= $pdo->query("update info set info='$info' where id_info='$id'");
	$exe=$query->fetch(PDO::FETCH_ASSOC);
	
	//menampilkan laporan hasil update
	//jika berhasil maka akan menamplikan update berhasil bos
	//jika gagal maka akan menampilkan update gagal bos
	if ($query){
		echo "<script>alert('Update data berhasil')
		location.replace('../notifikasi')</script>";
	} else{
		echo "<script>alert('Update data gagal')
		location.replace('../notifikasi')</script>";
	}
?>