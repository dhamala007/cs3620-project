<?php
  class movieDAO
 {
  function getAllMovies(){
    require_once('./user/connection.php');
    require_once('./movie/movie.php');
    
    $sql = "SELECT movie_id, movie_name, movie_description, movie_rating FROM `cs-3260`.movie";
    $result = $conn->query($sql);

    $movies;
    $index = 0;

    if ($result->num_rows > 0) 
    {
     while($row = $result->fetch_assoc())
    {
       $movie = new movie();

       $movie->setmovieId($row["movie_id"]);
       $movie->setmoviename($row["movie_name"]);
       $movie->setmoviedescription($row["movie_description"]);
       $movie->setmovierating($row["movie_rating"]);
       $movies[$index] = $movie;
       $index++;
    }
    }
   
    $conn->close();
    
    return $movies;
    }

    function createMovie($movie){
      require_once('./user/connection.php');
  
      // prepare and bind
      $stmt = $conn->prepare("INSERT INTO `cs-3260`.movie (`movie_id`,
      `movie_name`,
      `movie_description`,
      `movie_rating`, `user_id`) VALUES (?, ?, ?, ?, ?)");
  
      $mi = $movie->getmovieId();
      $mn = $movie->getmoviename();
      $md = $movie->getmoviedescription();
      $mr = $movie->getmovierating();
      $ui = $movie->getuserid();

  
      $stmt->bind_param("sssss", $mi, $mn, $md, $mr, $ui);
      $stmt->execute();
  
      $stmt->close();
      $conn->close();
    }

    function getMoviesByUserId($user_id){
      require_once('./user/connection.php');
      require_once('./movie/movie.php');
      
      $sql = "SELECT movie_id, movie_name, movie_description, movie_rating FROM `cs-3260`.movie WHERE `user_id` =" . $user_id;
      $result = $conn->query($sql);
  
      $movies;
      $index = 0;
  
      if ($result->num_rows > 0) 
      {
       while($row = $result->fetch_assoc())
      {
         $movie = new movie();
  
         $movie->setmovieId($row["movie_id"]);
         $movie->setmoviename($row["movie_name"]);
         $movie->setmoviedescription($row["movie_description"]);
         $movie->setmovierating($row["movie_rating"]);
         $movies[$index] = $movie;
         $index++;
      }
      }
     
      $conn->close();
      
      return $movies;
      }

      function deletemovie($uid, $mid)
      {
        require_once('./user/connection.php');
    
        $sql = "DELETE FROM `cs-3260`.movie WHERE `user_id` = " . $uid . " AND movie_id = " . $mid . ";";
        if($conn->query($sql) === TRUE)
        {
          echo "USER DELETED";
        }
        else{
          echo "ERROR: " .$sql . "<br>" . $conn->error;
        }
    
        $conn->close();
      }
}

?>