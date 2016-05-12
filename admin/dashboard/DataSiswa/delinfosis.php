<?php
	session_start();
	include_once '../../connect/conn.php';

	if(!isset($_SESSION['user']))
	{
		header("Location: ../../");
	}
	$res=$pdo->query("SELECT * FROM user_admin WHERE id_admin=".$_SESSION['user']);
	$row=$res->fetch(PDO::FETCH_ASSOC);
	$pdo->query("DELETE FROM data_siswa WHERE nis='$_GET[id]'");
	$pdo->query("DELETE FROM tbl_ruangan WHERE nis='$_GET[id]'");
?>
<script>document.location='infosis.php?status=5'</script>