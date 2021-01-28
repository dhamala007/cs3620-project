<?php
$servername = "cs-3260.database.windows.net";
$username = "cs-3260@cs-3260";
$password = "Loveyoudad95";
$dbname = "cs-3260";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Shows (ShowID, ShowName)
VALUES (1, 'Freinds')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
