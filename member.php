<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>

<?php
session_start();
$last_id = $_SESSION["id"];
echo $last_id;

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

 
$sql = "SELECT * FROM member 
join login on login.LoginId = member.loginid
where login.LoginId = '$last_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0 && $result->num_rows != 0) {
     echo "<table><tr><th>MID</th><th>Name</th><th>lastname</th><th>city</th><th>email</th><th>role</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 $mid = $row["mid"];
         echo "<tr><td>" . $row["mid"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>". $row["city"]. "</td><td>" . $row["email"]. "</td><td>" . $row["role"]. "</td></tr>";
     }
     echo "</table>";
}










 else {
     echo "0 results";
}
$_POST['varname'] = $last_id;
$conn->close();
?>  

    <?php
if( isset( $_REQUEST['update'] ))
{
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
$sql="UPDATE member
SET firstname='$_POST[fname]', lastname='$_POST[lname]', email='$_POST[email]', city='$_POST[city]'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

 <form method="post" action="member.php" >
<table border="1" >
            <tr>
                <td><label for="users_email">FName</label></td>
                <td><input type="text" 
                  name="fname" value= ""id="users_email"></td>
            </tr>
            <tr>
                <td><label for="users_pass">LName</label></td>
                <td><input name="lname" 
                  type="text" id="users_pass" ></input></td>
            </tr>
			<tr>
                <td><label for="users_email">email</label></td>
                <td><input type="text" 
                  name="email" id="users_email"></td>
            </tr>
        	 <tr>
                <td><label for="users_pass">city</label></td>
                <td><input name="city" 
                  type="text" id="city"></input></td>
            </tr>
		
            <td><input type="submit" name="update" value="update" onclick="Test()" />
                <td><input type="reset" value="Reset"/>
			
        </table>
		</form>
		
		
Record Attendance:


 
 
	<?php
if( isset( $_REQUEST['record'] ))
{
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

$sql="INSERT INTO attendance (mid)
VALUES
('$last_id')";
if ($conn->query($sql) === TRUE) {
    echo "Attendance recorded<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

<script type="text/javascript">

document.getElementById("idOfButton").onclick = function() {
    //disable
    this.disabled = true;

    //do some validation stuff
}
 

</script>












 <form>

<input type="submit" name="record" value="record" onClick="function()" />
</form>







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

$sql="select count(mid) as total, (select fees
    from fees
    where fees.mid = '$mid') as fees from attendance 
where attendance.mid = '$last_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0 && $result->num_rows != 0) {
     echo "<table><tr><th>Present</th><th>Fees</th><th>Total</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 $fees = $row["fees"];
		 $total = $row["total"];
		 $totalfees = $fees*$total;
         echo "<tr><td>" . $row["total"]."</td><td>" . $row["fees"]."</td><td>" . $totalfees."</td></tr>";
		 
     }
     echo "</table>";
}$conn->close();

?>








Click here to clean <a href = "logout.php" tite = "Logout">Session.

</body>
</html>