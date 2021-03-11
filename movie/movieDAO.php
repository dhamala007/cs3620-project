<?php
  class movieDAO {
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
}

?>