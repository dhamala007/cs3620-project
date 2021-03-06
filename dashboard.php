<?php require_once('header.php'); 
require_once('./sessioncheck.php');
?>

<a href="logout.php"> LogOut</a>

<form method="POST" action="create_movie.php" >
    <input type="submit" value="Create Movie" />
</form>

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5">Ankit's Favorite movies</h1>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

      <?php

        if(isset($_GET["del"]) AND $_GET["del"] == "true")
        {
            echo"<script>alert('Movie was deleted!');</script>";
        }

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once('./movie/movie.php');

        $movie = new movie();
        $movies = $movie->getMyMovies($_SESSION["user_id"]);  
        

        $arrlength = count($movies);

        for($x = 0; $x < $arrlength; $x++) {            
            echo '<div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">' . $movies[$x]->getmoviename() . '</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rating: ' . $movies[$x]->getmovierating() . '</h6>
                        <p class="card-text">' . $movies[$x]->getmoviedescription() . '</p>
                        <a href="delete_movie.php?movie_id='. $movies[$x]->getmovieId() .'" class="card-link">Delete Movie</a>
                    </div>
                  </div>
                  <br />';
        }
      ?>


      <!--
     <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
     </div>
    -->

    </main>

<?php require_once('footer.php'); ?>