<?php
class UserDAO {
  function getUser($user){
    require_once('./user/connection.php');
    
    $sql = "SELECT first_name, last_name, username, user_id FROM user WHERE user_id =" . $user->getUserId();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["first_name"]);
        $user->setLastName($row["last_name"]);
        $user->setUsername($row["username"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function createUser($user)
  {
    require_once('./user/connection.php');
    
    $sql = "INSERT INTO `cs-3260`.user
    (
    `Username`,
    `Password`,
    `Firstname`,
    `lastname`)
    VALUES
    ('" . $user->getUsername() . "',
    '" . $user->getPassword() . "',
    '" . $user->getFirstName() . "',
    '" . $user->getLastName() . "'
    );";
    $result = $conn->query($sql);

    $conn->close();
  }

  function deleteUser($un)
  {
    require_once('./user/connection.php');
    
    $sql = "DELETE FROM `cs-3260`.user WHERE Username = '".$un."';";
    $result = $conn->query($sql);

    $conn->close();
    echo "User was deleted";
  }
}
?>