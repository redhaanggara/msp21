<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Pure CSS Profile Card Hover Effect</title>
    
    
    <link rel="stylesheet" href="css/reset.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>
    <a href=../homes.html><h3 style="color:blue;">Home</h3></a><br>
    <div class="container">
	<?php session_start();?>
  <div class="avatar-flip">
    <img src="finallogo.png"height="150" width="150">
	<img src="finallogo.png"height="150" width="150">
  </div>
  <h2><?php echo $_SESSION['pengguna'];?></h2>
  <h4><?php $db = new mysqli("localhost", "root", "", "wk");
	$query = "SELECT * FROM userwk WHERE (username ='".$_SESSION['pengguna']."')"; 
	if ($is_query_run=mysqli_query($db,$query)){
	while($query_execute=mysqli_fetch_assoc($is_query_run)){
	echo "Name: ".$query_execute['fullname'];
	echo "<br>";
	echo "Email: ".$query_execute['email'];
	echo "<br>";
	echo "Since: ".$query_execute['date using'];
	}
	}?></h4>
  <p>.</p>
</div>
    
    
    
    
    
  </body>
</html>
