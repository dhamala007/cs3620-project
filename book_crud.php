
<?php

session_start();
$servername = "aazuresql.mysql.database.azure.com";
$username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);
$dbname = "cs-3260";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Books (BookId, BookName, BookAuthor)
VALUES (1, 'Harry Potter and the Philosophers Stone', 'J.K.Rowling')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully\r\n";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo"---------------------------------\r\n";

$sql1 = "SELECT BookId, BookName, BookAuthor FROM `cs-3260`.Books";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "This is the select statement!!!!!!!!!!\r\n";
    echo "id: " . $row["BookId"]. " - Name: " . $row["BookName"]. " " . $row["BookAuthor"]. "<br>";
  }
} else {
  echo "0 results";
}

// sql to delete a record
$sql2 = "DELETE FROM MyGuests WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
