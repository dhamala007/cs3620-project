<?php
require_once('./movie/movieDAO.php');

class movie implements \jsonSerializable {
  // Properties
  private $movie_id;
  private $movie_name;
  private $movie_description;
  private $movie_rating;

  // Methods
  function __construct() {
  }
  function getmovieId(){
    return $this->movie_id;
  }
  function setmovieId($movie_id){
    $this->movie_id = $movie_id;
  }
  function getmoviename() {
    return $this->movie_name;
  }
  function setmoviename($movie_name){
    $this->movie_name = $movie_name;
  }
  function getmoviedescription() {
    return $this->movie_description;
  }
  function setmoviedescription($movie_description){
    $this->movie_description = $movie_description;
  }
  

  function getmovierating() {
  return $this->movie_rating;
  }
  function setmovierating($movie_rating){
  $this->movie_rating = $movie_rating;
  }

  function getuserid() {
    return $this->user_id;
    }
    function setuserid($user_id){
    $this->user_id = $user_id;
    }
  

public function getMyMovies($user_id)
{
    $movieDAO = new movieDAO();
    return $movieDAO->getMoviesByUserId($user_id);
}

public function deleteMovie($user_id, $movie_id)
{
    $movieDAO = new movieDAO();
    return $movieDAO->deletemovie($user_id, $movie_id);
}

function createMovie(){
  $movieDAO = new movieDAO();
  $movieDAO->createMovie($this);
}
 
public function jsonSerialize()
{
    $vars = get_object_vars($this);
    return $vars;
}
}
?>