<?php  session_start();
if(isset($_SESSION['username']))
{
	session_destroy();
	header('Location:../../index.php?status=2');
}else{
	session_destroy();
	header('Location:../../index.php?status=Silahkan Login!');
}
?>