<!DOCKTYPE html>
<html>
<head>
<title>Gudang</title>
</head>
<body>

<img src="finallogo.png" style="width:200px;height:100px alt=Home"><br>
<a href=homes.html><h4 style="color:blue;">Home</h4></a><br>
<?php
$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}

session_start();
$upengguna = $_SESSION['pengguna'];

$db = new mysqli("localhost", "root", "", "wk");
$query = "SELECT * FROM databasegudang WHERE (username='".$upengguna."')";
echo "<br>";
echo "<center><h2>[Gudang]</h2>";
echo "<center><table border=1 style=width:800px>
<tr>
<th>Barang</th>
<th>Harga Beli</th>
<th>Harga Jual</th>
<th>Stock</th>
</tr>";

if ($is_query_run=mysqli_query($db,$query)){
	while($query_execute=mysqli_fetch_assoc($is_query_run)){
		echo "<tr>";
		echo "<td>".$query_execute['namabarang']."</td>";
		echo "<td>".$query_execute['hargabeli']."</td>";
		echo "<td>".$query_execute['hargajual']."</td>";
		echo "<td>".$query_execute['stock']."</td>";
		echo "<td>"."<a href='delete.php?id=".$query_execute['no']."'>Delete</a>"."</td>";
		echo "<td>"."<a href='edit.php?id=". $query_execute['no']. "'>Edit</a>"."</td>";
 		echo "</tr>";
		
	}
}
else{
	echo "query not executed";
}
echo "</table>";
?>
<p>
<form action="actgudang.php"  method="POST">
<input type="submit" name="add" value="[TambahData]">
</body>
</html>
