<?php
require("function.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

if(count($_POST)>0) {
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$city = $_POST['city'];
$password = $_POST['fname'];
$email = $_POST['email'];
$role = $_POST['role'];
$fees = $_POST['fees'];



if(trim($fname) != '' && trim($lname) != '' && trim($role) != '' && trim($password) != '')
{
$sql = "INSERT INTO login (password,role) VALUES ('$password', '$role')";
}

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	$last_id = $conn->insert_id;
	 //echo $last_id;
	$sql="INSERT INTO member (firstname, lastname,loginid, city, email) VALUES ('$fname','$lname','$last_id', '$city', '$email')";
	
	if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
	mysqli_query($conn,"INSERT INTO fees (fees, mid) VALUES ('$fees','$last_id')")or die(mysqli_error($conn));
	
	
	
	echo "Successfully added";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

	
	echo "Successfully added";
		
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//////Select


$conn->close();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Jotorres Login Form</title>
</head>
<body>
<h1>Member Create</h1>
    <form method="post" action="createmember.php" >
	Name and role are important
        <table border="1" >
            <tr>
                <td><label for="users_email">FName</label></td>
                <td><input type="text" 
                  name="fname" id="users_email"></td>
            </tr>
            <tr>
                <td><label for="users_pass">LName</label></td>
                <td><input name="lname" 
                  type="text" id="users_pass"></input></td>
            </tr>
			<tr>
                <td><label for="users_email">email</label></td>
                <td><input type="text" 
                  name="email" id="users_email"></td>
            </tr>
            <tr>
                <td><label for="users_pass">password</label></td>
                <td><input name="password" 
                  type="password" id="password"></input></td>
            </tr>
			 <tr>
                <td><label for="users_pass">city</label></td>
                <td><input name="city" 
                  type="text" id="city"></input></td>
            </tr>
			 <tr>
                <td><label for="users_pass">role</label></td>
                <td><input name="role" 
                  type="text" id="role" value="3"></input></td>
            </tr>
			 <td><label for="users_pass">fees</label></td>
                <td><input name="fees" 
                  type="text" id="role" value=""></input></td>
            </tr>
            <td><input type="submit" value="Submit"/>
                <td><input type="reset" value="Reset"/>
			
        </table>
    </form>
<input type="button" value="back" onclick="window.location.href='admin.php'">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//////Select
$sql = "SELECT * FROM member join login on login.LoginId = member.loginid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br><h1>firstname: " . $row["firstname"]. " <br>- lastName: " . $row["lastname"]. "<br>Login Id: " . $row["loginid"]. "<br>Password: " . $row["lastname"]. "</h1>";
		
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>