<!DOCKTYPE html>
<html>
<head>
<title>Input Data Hutang</title>
</head>
<body>
<img src="finallogo.png" style="width:200px;height:100px alt=Home"><br>
<a href=hutangform.php><h4 style="color:blue;">Back</h4></a><br>
<?php
session_start();
$db = new mysqli("localhost", "root", "", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}

function tambahData($nmp,$tgl,$ket){
	$usher= $_SESSION['pengguna'];
	$query = "INSERT INTO databasehutang
	(username,penghutang,date,ket)
	VALUES ('$usher','$nmp','$tgl','$ket')";
	$db = new mysqli("localhost", "root", "", "wk");
	if(mysqli_query($db,$query) or die ('gagal')){
		return true;
	}
	else{
		return false;
	}
}

if (isset($_POST['btndo'])){
	if(tambahData($_POST['nmp'],$_POST['tgl'],$_POST['ket'])){
		header('Location: hutangform.php');
	}
	else{
		echo "tambah data gagal";
	}
}

?>
<p>
<p>
<center><h2>[InputDataHutang]</h2>
<p>
<p>
<form action=""  method='POST'>
<center>
<table border=1 style=width:700px>
<tr>
<th>Penghutang</th>
<th>Tanggal</th>
<th>Keterangan</th>
</tr>
<td><input name="nmp"  type="text"></td>
<td><input  name="tgl" type="text"></td>
<td><input  name="ket" type="text" ></td>
</table></center>
<p>
<center><input type="submit" name="btndo" value="[Add]"></form>
</body>
</html>