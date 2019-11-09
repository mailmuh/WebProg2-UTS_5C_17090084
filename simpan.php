<?php
include "config.php";
// menyimpan data kedalam variabel
$id            	= $_POST['id'];
$opsi  			= $_POST['absen'];
// query SQL untuk insert data
$query="UPDATE absen SET id='$id', opsi='$opsi' WHERE id='$id'";

	$simpan = $db->prepare($query);
	$simpan->execute();
// mengalihkan ke halaman index.php
header("location:timeline.php");
?>