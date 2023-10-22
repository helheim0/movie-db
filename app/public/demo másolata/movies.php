<?php require_once("./includes/header.php"); ?>
  <h1>Movies</h1>
  <div class="row">
  <?php
    if(isset($_GET['genre']) && !empty($_GET['genre'])){
    
    //Returns only the first value, if the searched genre is the second or third value, it does no show it.
    $filtered = array_filter($movies, function($data){
      /*for($i = 0; $i<count($data['genres']); $i++){
        return str_contains($data['genres'][$i], $_GET['genre']);
      }*/

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