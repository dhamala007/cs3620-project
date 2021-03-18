<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./sessioncheck.php');
require_once('./movie/movie.php');

$movie = new movie();
$movies = $movie->deleteMovie($_SESSION["user_id"], $_GET["movie_id"]);  

header("Location: dashboard.php?del=true")
?>