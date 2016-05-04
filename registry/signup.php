<!DOCTYPE html>
<html>
    <head>
        <title>WK</title>
    </head>
    
    <body>
<?php

include("db.php");


$submit = $_POST['btnregister'];
$query =$db->prepare("INSERT INTO userwk (fullname,email,username,password) 
VALUES (?,?,?,?)");

$query->bind_param('ssss',$fullname,$email,$username,$password);

if (isset($submit)){
$fullname = $_POST['fn'];
$email = $_POST['email'];
$username = $_POST['un'];
$password = $_POST['pw'];
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
