<?php
header("Location: dashboard.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('./movie/movie.php');

$user = new movie();
$user->setmoviename($_POST["movie_name"]);
$user->setmoviedescription($_POST["movie_description"]);
$user->setmovierating($_POST["movie_rating"]);
$user->setuserid($_SESSION["user_id"]);
$user->createMovie();

?>