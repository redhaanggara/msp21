<!DOCTYPE html>
<html>
    <head>
        <title>WK</title>
    </head>
    
    <body>
<?php

$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}

function tambahData($f,$mail,$un,$pass){
	$db = new mysqli("ap-cdbr-azure-southeast-b.cloudapp.net", "b5a0b7e6a5eda4", "d36febb7", "wk");
	$query = "INSERT INTO userwk
	(fullname,email,username,password)
	VALUES ('$f','$mail','$un','$pass')";
	
	if(mysqli_query($db,$query) or die ('gagal')){
		return true;
	}
	else{
		return false;
	}
}

if (isset($_POST['btnregister'])){
	if(tambahData($_POST["fn"],$_POST["email"],$_POST["un"],$_POST["pw"])){
		echo "<center>Register Success</center>";
	}
	else{
		echo "tambah data gagal";
	}
}


echo "<center>Anda Terdaftar Sebagai";
echo "<br>";
echo "Nama: $fullname";
echo "<br>";
echo "Username: $username";
echo "<br>";
echo "Email: $email";
echo "<br>";
echo "Password: $password</center>"
?>
   </body>
</html>
