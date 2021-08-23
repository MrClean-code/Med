<?php
$servername = "localhost";
$username = "lol1221231";
$password = "David34562163";
$dbname = "der_rec3123";

$nameD = $_POST['user_name'];
$surnameD = $_POST['user_surname'];
$informationD = $_POST['user_information'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO storage1 (name, surname, exist)
VALUES ('$nameD', '$surnameD', '$informationD')";

if ($conn->query($sql) === TRUE) {
  echo "данные отправлены";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>