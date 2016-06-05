<?php
	session_start();
	include_once '../../connect/conn.php';

	if(!isset($_SESSION['user']))
	{
		header("Location: ../../");
	} else {
		$res=$pdo->query("SELECT * FROM user_admin WHERE id_admin=".$_SESSION['user']);
		$row=$res->fetch(PDO::FETCH_ASSOC);
		$pdo->query("DELETE FROM user_admin WHERE id_admin='$_GET[id]'");
	}
	
?>
<script>document.location='../DataAdmin/datmin.php?status=5'</script>