<?php 
session_start();
if(isset($_SESSION['page'])){

	if(isset($_POST['parameter'])){
		include 'connection.php';
		$parameter = mysqli_real_escape_string($dbconnect, $_POST['parameter']);
		$id = mysqli_real_escape_string($dbconnect, $_POST['uid']);
		$nama = mysqli_real_escape_string($dbconnect, $_POST['nama']);
		$chatid = mysqli_real_escape_string($dbconnect, $_POST['chatid']);
		
		$sql = mysqli_query($dbconnect, "UPDATE tb_id SET id='$id', nama='$nama', chatid='$chatid', notifikasi='0' WHERE id='$parameter'");
			if($sql){
				$error = "false";
			}
			else{
				$error = "true";
			}
	}else{
		$error = "true";
	}

}else{
	$error = "true";
}
header("location:../index.php?page=pegawai&error=".$error);
?>