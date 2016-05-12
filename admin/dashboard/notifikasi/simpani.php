<?php  
	include('../../connect/conn.php');
    $tugas = $_POST['info'];  
   
    $query = $pdo->query("INSERT into info SET info='$tugas'");  
    $hasil = $query->fetch(PDO::FETCH_ASSOC);  
    if($query){  
      echo "Tugas siswa telah disimpan";
?><script language="javascript">document.location.href="../notifikasi";</script><?php
     }else{  
      echo "Error! gagal menyimpan tugas siswa:".mysql_error();  
?><script language="javascript">document.location.href="../notifikasi";</script><?php
     }  ?>  