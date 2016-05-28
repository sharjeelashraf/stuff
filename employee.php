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
$id = $_SESSION["id"];
echo $id;
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

$sql = "SELECT mid, firstname, lastname, city, email, role FROM member join login on login.LoginId = member.loginid ";
$result = $conn->query($sql);

if ($result->num_rows > 0 && $result->num_rows != 0) {
     echo "<table><tr><th>ID</th><th>Name</th><th>lastname</th><th>city</th><th>email</th><th>role</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["mid"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>". $row["city"]. "</td><td>" . $row["email"]. "</td><td>" . $row["role"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>  
<form action="employee.php" method="post"> ID: 
<input name="myid" type="text" /> 
<input name="Submit" type="submit" value="delete record" /> </form>
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
if(isset($_POST['myid'])){
$id = isset($_POST['myid']); 
$sql = "Delete from member where mid = '$_POST[myid]'"; 
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
}

?>


Hello there!
Click here to clean <a href = "logout.php" tite = "Logout">Session.


</body>
</html>