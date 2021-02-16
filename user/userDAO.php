<?php
class UserDAO {
  function getUserfromusername($user){
    require_once('./user/connection.php');
    
    $sql = "SELECT Firstname, Lastname, Username FROM `cs-3260`.user WHERE Username = '".$user->getUsername()."';";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) 
    {
    // output data of each row
        while($row = $result->fetch_assoc())
        {
            $user->setFirstName($row["Firstname"]);
            $user->setLastName($row["Lastname"]);
            $user->setUsername($row["Username"]);
          
        }
    } else {
        echo "0 results";
    }
    $conn->close();
   
  }

  function getUserfromfirstname($user){
    require_once('./user/connection.php');
    
    $sql = "SELECT Firstname, Lastname, Username FROM `cs-3260`.user WHERE Firstname = '".$user->getFirstName()."';";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) 
    {
    // output data of each row
        while($row = $result->fetch_assoc())
        {
            $user->setFirstName($row["Firstname"]);
            $user->setLastName($row["Lastname"]);
            $user->setUsername($row["Username"]);
          
        }
    } else {
        echo "0 results";
    }
    $conn->close();
   
  }

  function getUserfromlastname($user){
    require_once('./user/connection.php');
    
    $sql = "SELECT Firstname, Lastname, Username FROM `cs-3260`.user WHERE Lastname = '".$user->getLastName()."';";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) 
    {
    // output data of each row
        while($row = $result->fetch_assoc())
        {
            $user->setFirstName($row["Firstname"]);
            $user->setLastName($row["Lastname"]);
            $user->setUsername($row["Username"]);
          
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
    echo "User was inserted";
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