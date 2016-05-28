<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$message="";
if(count($_POST)>0) {

$sql = "SELECT * FROM login WHERE LoginId='" . $_POST["loginid"] . "' and password = '". $_POST["password"]."'";
$result = mysqli_query($conn,$sql);    

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
/* 		$title = $row['LoginId'];
$link = $row['role']; */
$_SESSION["id"] = $row['LoginId'];
$_SESSION["role"] = $row['role'];
		//echo "<h1>$title</h1><a href='$link'>$link</a>";
		
    }
if(isset($_SESSION["id"])|| $_SESSION["role"] == '1') {
			header("Location:admin.php");
}
} else {
    echo "0 results";
}
$_SESSION["id"] = $row['LoginId'];
$_SESSION["role"] = $row['role'];
} else {
$message = "Invalid Username or Password!";
}


mysqli_close($conn);
?>  
 

<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login to Web App</h1>
      <form method="post" action="login.php">
        <p><input type="text" name="loginid" value="" placeholder="username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
		 <p><input type="text" name="role" value="" placeholder="role"></p>
        <!-- <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p> -->
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>

  </section>

</body>
</html>