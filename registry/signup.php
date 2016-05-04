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


$submit = $_POST['btnregister'];
if (isset($submit)){
$fullname = $_POST['fn'];
$email = $_POST['email'];
$username = $_POST['un'];
$password = $_POST['pw'];
$query ="INSERT INTO userwk (fullname,email,username,password) 
VALUES ('$fullname','$email','$username','$password')";
$query->bind_param('ssss',$fullname,$email,$username,$password);
$query->execute();
echo "<center>Register Success</center>";
echo "<p>";
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
