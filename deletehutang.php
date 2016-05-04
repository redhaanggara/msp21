<?php
session_start();
$db = new mysqli("localhost", "root", "", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}



function hapusData($id){
	$usher= $_SESSION['pengguna'];
	$query = "DELETE FROM databasehutang WHERE no='$id' AND username='$usher'";
	echo $query;
	$db = new mysqli("localhost", "root", "", "wk");
	if(mysqli_query($db,$query) or die ('gagal')){
		return true;
	}
	else{
		return false;
	}
}

if (isset($_GET['id'])){
	if(hapusData($_GET['id'])){
		header('Location: hutangform.php');
		
	}
	else{
		echo "hapus data gagal";
	}
}

?>