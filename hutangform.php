<!DOCKTYPE html>
<html>
<head>
<title>List Hutang</title>
</head>

<body>
<img src="finallogo.png" style="width:200px;height:100px alt=Home"><br>
<a href=homes.html><h4 style="color:blue;">Home</h4></a><br>
<center><h2>[Daftar Penghutang]</h2>
<?php
$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}
session_start();
$upengguna = $_SESSION['pengguna'];

$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
$query = "SELECT * FROM databasehutang WHERE (username='".$upengguna."')";
echo "<br>";
echo "<center><table border=1 style=width:800px>
<tr>
<th>Penghutang</th>
<th>Tanggal</th>
<th>Keterangan</th>
</tr>";
if ($is_query_run=mysqli_query($db,$query)){
	while($query_execute=mysqli_fetch_assoc($is_query_run)){
		echo "<tr>";
		echo "<td>".$query_execute['penghutang']."</td>";
		echo "<td>".$query_execute['date']."</td>";
		echo "<td>".$query_execute['ket']."</td>";
	    echo "<td>"."<a href='deletehutang.php?id=".$query_execute['no']."'>Delete</a>"."</td>";
		echo "<td>"."<a href='edithutang.php?id=". $query_execute['no']. "'>Edit</a>"."</td>";
		echo "</tr>";
	}
}
echo "</table>";
?>
<p>
<form action="acthutang.php"  method="POST">
<input type="submit" name="add" value="[TambahData]">
</body>
</html>
