<?php
$nama=$_POST[‘nama’];
$email=$_POST[’email’];
$subjek=$_POST[‘subjek’];
$pesan=$_POST[‘pesan’];$to=”email.anda@gmail.com”;
$header=”From: $email”;@mail($to, $subjek, $pesan, $header);
echo “Pesan Berhasil Dikirim”;
?>