<img src="finallogo.png" style="width:200px;height:100px alt=Home"><br>
<a href=gudang.php><h4 style="color:blue;">Back</h4></a><br>
<?php
session_start();
$db = new mysqli("localhost", "root", "", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}

function tambahData($br,$hb,$hj,$st){
	$usher= $_SESSION['pengguna'];
	$query = "INSERT INTO databasegudang
	(username,namabarang,hargabeli,hargajual,stock)
	VALUES ('$usher','$br',$hb,$hj,$st)";
	$db = new mysqli("localhost", "root", "", "wk");
	if(mysqli_query($db,$query) or die ('gagal')){
		return true;
	}
	else{
		return false;
	}
}

if (isset($_POST['btndo'])){
	if(tambahData($_POST['brg'],$_POST['hb'],$_POST['hj'],$_POST['stc'])){
		header('Location: gudang.php');
	}
	else{
		echo "tambah data gagal";
	}
}

?>
<p>
<p>
<center><h2>[InputDataBarang]</h2>
<p>
<p>
<form action=""  method='POST'>
<center>
<table border=1 style=width:700px>
<tr>
<th>Barang</th>
<th>Harga Beli</th>
<th>Harga Jual</th>
<th>Stock</th>
</tr>
<td><input placeholder="Barang'" name="brg" type="text"> </td>
<td><input placeholder="Harga Beli" name="hj" type="text"> </td>
<td><input placeholder="Harga Jual" name="hb" type="text"></td>
<td><input placeholder="Stock" name="stc" type="text"></td>
</table></center>
<p>
<input type="submit" name="btndo" value="[Add]"></center></form>