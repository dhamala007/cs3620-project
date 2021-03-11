<?php
    require_once('./header.php');
?>  


<form method="POST" action="movie_insert.php" >
    Movie Name:<input type="text" name="movie_name" /><br />
    Movie Description:<input type="text" name="movie_description" /><br />
    Movie Rating:<input type="text" name="movie_rating" /><br />
    <input type="submit" value="Create Movie" />
</form>


<?php
    require_once('./footer.php');
?>  