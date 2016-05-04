<?php
$db = new mysqli("localhost", "root", "", "wk");
if ($db->connect_errno){
	
	echo "error gan".$db->connect_error;
}
?>