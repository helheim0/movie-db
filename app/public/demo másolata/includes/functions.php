<?php
//Prettier
function runtime_prettier($movie_length){
  if($movie_length != '' && $movie_length > 0) {
    $division = $movie_length / 60;
    $hour = (int)$division;
    $rest = $division - $hour;
    $minutes = $rest * 60;
    $movie_length = $hour . "h " . $minutes . "m";
     return $movie_length;
 }
  else {
    return "not set";
  }
}

//Check old movie
function check_old_movie($year){
  $currentYear = date("Y");
  $age = $currentYear - $year;
  if($age > 40) {
    return $age;
  }
  else {
    return "FALSE";
  }
}

//Check poster
function check_poster($url){
  
}