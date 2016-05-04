<!DOCKTYPE html>
<html>
<head>
<title>Edit Data Barang</title>
</head>
<body>
<img src="finallogo.png" style="width:200px;height:100px alt=Home"><br>
<a href=gudang.php><h4 style="color:blue;">Back</h4></a><br>
<?php
session_start();

$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}

if (isset($_POST['btndo'])){
	
	if(editData($_POST['brg'],$_POST['hb'],$_POST['hj'],$_POST['stc'],$_GET['id'])){
		header('Location: gudang.php');
	}
	else{
		echo "Edit data gagal";
	}
}

function editData($br,$hb,$hj,$st,$id){
	$query = "UPDATE databasegudang SET namabarang='$br',
	         hargabeli=$hb, hargajual=$hj, stock=$st 
			 WHERE no=$id";
			 
	$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
	if(mysqli_query($db,$query) or die ('gagal')){
		return true;
	}
	else{
		return false;
	}
}

function tampilperid ($id){
	$upengguna = $_SESSION['pengguna'];
	$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
	$query = "SELECT * FROM databasegudang WHERE (no ='".$id.
	"' AND username='".$upengguna."')";
	$result = mysqli_query($db,$query) or die ("gagal");
	return $result;
}
$temp=tampilperid($_GET['id']);
while ($row=mysqli_fetch_assoc($temp)){
?>
</body>
<center><h2>[EditDataBarang]</h2></center>
<form action=""  method='POST'>
<center>
<table border=1 style=width:700px>
<tr>
<th>Barang</th>
<th>Harga Beli</th>
<th>Harga Jual</th>
<th>Stock</th>
</tr>
<td><input placeholder="Barang" name="brg" value="<?php echo $row['namabarang']; ?>" type="text"></td>
<td><input placeholder="Harga Beli" name="hj" value="<?php echo $row['hargabeli']; ?>"type="text"></td>
<td><input placeholder="Harga Jual" name="hb" value="<?php echo $row['hargajual']; ?>"type="text"></td>
<td><input placeholder="Stock" name="stc" value="<?php echo $row['stock']; ?>" type="text"></td>
</table></center>
<p>
<center><input type="submit" name="btndo" value="[Add]"></form>
</html>
<?php } //endwhile ?>
