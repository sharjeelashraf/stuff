		<?php
		session_start()
$var_value = $_SESSION['varname'];
echo $var_value;
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
('$var_value')";
if ($conn->query($sql) === TRUE) {
    echo "Attendance recorded";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
