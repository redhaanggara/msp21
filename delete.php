<?php
session_start();

$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}

function hapusData($id){
	$usher= $_SESSION['pengguna'];
	$query = "DELETE FROM databasegudang WHERE no='$id' AND username='$usher'";
	echo $query;
	$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
	if(mysqli_query($db,$query) or die ('gagal')){
		return true;
	}
	else{
		return false;
	}
}

if (isset($_GET['id'])){
	if(hapusData($_GET['id'])){
		header('Location: gudang.php');
		
	}
	else{
		echo "hapus data gagal";
	}
}

?>
