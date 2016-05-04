<?php
 $uname = $_POST ['uname'];
 $pass = $_POST ['pass'];

$db = new mysqli("localhost", "root", "", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}

$sql= "SELECT count(*) FROM userwk WHERE(username ='".$uname."' and password ='".$pass."')" ;
$qury = mysqli_query($db,$sql);
$result  = mysqli_fetch_array($qury);
if ($result[0]>0){
session_start();
                $_SESSION["pengguna"] = $uname;
                header("location:homes.html");
}

else if (empty($uname) || empty($pass) ){
        
       header("location:index.html");
		
}
else{
	
	echo "<center>Please Check Again Your Account";
	echo "<center><h2><a href='index.html'>Kembali</a>";
}
?>