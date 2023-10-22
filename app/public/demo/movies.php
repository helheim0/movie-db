<?php require_once("./includes/header.php"); ?>
<h1>Movies</h1>
<div class="row">
<?php
  if(isset($_GET['genre']) && !empty($_GET['genre'])){
  
  $filtered = array_filter($movies, function($data){
    if(in_array($_GET['genre'], $data['genres'])){
      return true;
    }
    else {
      return false;
    }
  });

  $i=0;
  foreach($filtered as $movie_key => $movie){
    if(array_key_exists('plot', $movie))
    {
      $plot = substr($movie['plot'], 0, 110) . '...';
    }
    else {
      $plot = "";
    }
    ?>
    <?php require("./includes/archive-movie.php") ?>
    <?php   $i++; unset($description);} 
}
elseif($currentPage === "movies.php?page=favorites"){
  $favorited = array_filter($favorites, function($fav){
    if(!empty($_COOKIE['favorites']) ){
      return true;
    }
    else {
      return false;
    }
  });

  foreach($favorited as $movie_key => $movie){
    require("./includes/archive-movie.php");
  }
}
elseif(!isset($_GET['genres']) && empty($_GET['genres'])) {
  $i = 0;
  foreach($movies as $movie_key => $movie){
    if(array_key_exists('plot', $movie))
    {
      $plot = substr($movie['plot'], 0, 110) . '...';
    }
    else {
      $plot = "";
    }
    ?>
    <?php require("./includes/archive-movie.php") ?>
    <?php   $i++; unset($description);} }
else {
  echo "<h3>Something went wrong</h3>";
}?>
</div>
<?php require_once("./includes/footer.php");