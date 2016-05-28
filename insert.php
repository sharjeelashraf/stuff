<html>
<body>
 




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

$sql="INSERT INTO nametable (firstname, lastname)
VALUES
('$_POST[fname]','$_POST[lname]')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<form action="takeout.php" method="post">
<input type="submit" name="show" />
</form>


</body>
</html>