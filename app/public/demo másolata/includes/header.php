<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Budai-Bedo Helga</title>
</head>
<body>
  <?php 
    define("ID", "BBH");
    require("functions.php");  
    $currentPage= $_SERVER['SCRIPT_NAME'];
    $currentPage = substr($currentPage, 6);

    $navbar = array(
      array(
        "name" => "Home",
        "link" => "index.php"
      ),
      array(
        "name" => "Movies",
        "link" => "movies.php"
      ),
      array(
        "name" => "Contact",
        "link" => "contact.php"
      ),
      array(
        "name" => "Genres",
        "link" => "genres.php"
      ),
      array(
        "name" => "Favorites",
        "link" => "movies.php?page=favorites"
      )
      )
    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">BBH</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <?php 
                foreach($navbar as $navItem){
                  ?>
                  <li class="nav-item">
                   <a class="nav-link <?php echo $currentPage === $navItem['link'] ?  "active" : ""  ?>" aria-current="page" href="<?php echo $navItem['link'] ?>"><?php echo $navItem['name']?></a>
                  </li>
                <?php }
              ?>
            </ul>
            <?php require_once("search-form.php"); ?>
          </div>
        </div>
      </nav>
    <div class="container pt-4 pb-4">
    <?php 
      if($currentPage === "index.php" || $currentPage === "contact.php"){
        return;
      }
      else {
          $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];
        }
    ?>