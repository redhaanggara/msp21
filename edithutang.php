<!DOCKTYPE html>
<html>
<head>
<title>Edit Data Hutang</title>
</head>
<body>
<img src="finallogo.png" style="width:200px;height:100px alt=Home"><br>
<a href=hutangform.php><h4 style="color:blue;">Back</h4></a><br>
<?php
session_start();

include("db.php");

if (isset($_POST['btndo'])){
	
	if(editData($_POST['nmp'],$_POST['tgl'],$_POST['ket'],$_GET['id'])){
		header('Location: hutangform.php');
	}
	else{
		echo "Edit data gagal";
	}
}

function editData($nm,$tgl,$ket,$id){
	$query = "UPDATE databasehutang SET penghutang='$nm',
	         date='$tgl', ket='$ket'
			 WHERE no=$id";
			 
	$db = new mysqli("localhost", "root", "", "wk");
	if(mysqli_query($db,$query) or die ('gagal')){
		return true;
	}
	else{
		return false;
	}
}

function tampilperid ($id){
	$upengguna = $_SESSION['pengguna'];
	$db = new mysqli("localhost", "root", "", "wk");
	$query = "SELECT * FROM databasehutang WHERE (no ='".$id.
	"' AND username='".$upengguna."')";
	$result = mysqli_query($db,$query) or die ("gagal");
	return $result;
}
$temp=tampilperid($_GET['id']);
while ($row=mysqli_fetch_assoc($temp)){
?>
</body>
<center><h2>[Edit Data Pengutang]</h2></center>
<form action=""  method='POST'>
<center>
<table border=1 style=width:700px>
<tr>
<th>Penghutang</th>
<th>Tanggal</th>
<th>Keterangan</th>
</tr>
<td><input placeholder="Penghutang" name="nmp" value="<?php echo $row['penghutang']; ?>" type="text"></td>
<td><input placeholder="Tanggal" name="tgl" value="<?php echo $row['date']; ?>"type="text"></td>
<td><input placeholder="Keterangan" name="ket" value="<?php echo $row['ket']; ?>"type="text"></td>
</table></center>
<p>
<center><input type="submit" name="btndo" value="Add"></form>
</html>
<?php } //endwhile ?>
