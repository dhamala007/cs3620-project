<?php
class UserDAO {
  function getUser($user){
    require_once('./user/connection.php');
    
    $sql = "SELECT Firstname, Lastname, Username FROM `cs-3260`.user WHERE user_id =" . $user->getUserId();
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
  function checkLogin($passedinusername, $passedinpassword){
    require_once('./user/connection.php');
    $user_id = 0;
    $sql = "SELECT *FROM `cs-3260`.user WHERE Username = '" . $passedinusername . "' AND Password = '" . hash("sha256", trim($passedinpassword)) . "'";
 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"];
      }
    }
    else {
        echo "0 results";
    }
    $conn->close();
    return $user_id;
  }

  function createUser($user){
    require_once('./user/connection.php');

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO `cs-3260`.user (`Username`,
    `Password`,
    `Firstname`,
    `lastname`) VALUES (?, ?, ?, ?)");

    $un = $user->getUsername();
    $pw = $user->getPassword();
    $fn = $user->getFirstName();
    $ln = $user->getLastName();

    $stmt->bind_param("ssss", $un, $pw, $fn, $ln);
    $stmt->execute();

    $stmt->close();
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