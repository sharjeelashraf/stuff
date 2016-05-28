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

$sql = "SELECT * FROM employee join login on login.LoginId = employee.loginid ";
$result = $conn->query($sql);

if ($result->num_rows > 0 && $result->num_rows != 0) {
     echo "<table><tr><th>ID</th><th>Name</th><th>lastname</th><th>city</th><th>email</th><th>role</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["empid"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>". $row["city"]. "</td><td>" . $row["email"]. "</td><td>" . $row["role"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>  

 <form method="post" action="deleteemployee.php" > ID: 
<input name="id" type="text" /> 
<input name="submit" type="submit" value="delete record" onClick="window.location.reload()"/> </form>

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
$id = isset($POST['id']); 
// sql to delete a record
$sql = "DELETE FROM `employee` WHERE `employee`.`empid` = '$_POST[id]'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>

Hello there!
Click here to clean <a href = "logout.php" tite = "Logout">Session.
<input type="button" value="back" onclick="window.location.href='admin.php'">


</body>
</html>