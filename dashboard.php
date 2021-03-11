<?php require_once('header.php'); ?>

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5">Ankit's Favorite movies</h1>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

      <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once('./movie/movie.php');

        $movie = new movie();
        $movies = $movie->getMyMovies();  

        $arrlength = count($movies);

        for($x = 0; $x < $arrlength; $x++) {            
            echo '<div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">' . $movies[$x]->getmoviename() . '</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rating: ' . $movies[$x]->getmovierating() . '</h6>
                        <p class="card-text">' . $movies[$x]->getmoviedescription() . '</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
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