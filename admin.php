 <?php 
//if($_SESSION["role"]=='1'){
	session_start();
	$id = $_SESSION["id"];
echo $id;

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login Form</title>
</head>
<body>
    <form method="post" action="login.php" >
			
			<input type="reset" value="Create Memeber"  onclick="window.location.href='createmember.php';"/>
                <input type="reset" value="Create Employee"  onclick="window.location.href='createemployee.php';"/>
			<input type="reset" value="Delete Memeber"  onclick="window.location.href='deletemember.php';"/>
                <input type="reset" value="Delete Employee"  onclick="window.location.href='deleteemployee.php';"/>            
           </form>
		   Hello there!
Click here to clean <a href = "logout.php" tite = "Logout">Session.

</body>
</html>

<?php 
//}else{
?>
<!--<script type="text/javascript">

   window.location="localhost/index.php";

</script> -->
 <?php //} 
?>

