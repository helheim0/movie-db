<?php require_once("./includes/header.php"); ?>

<h1>Genres</h1>

<?php 
    $genres = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['genres'];
    ?>
     <div class="d-flex flex-row">
        <div class="d-flex flex-row flex-wrap">
    <?php
    foreach($genres as $genre){ ?>
    <div class="p-2">
        <a class="btn btn-primary" href="movies.php?genre=<?php echo $genre ?>"><?php echo $genre ?></a>
    </div>
    <?php } ?>  
        </div>
    </div>

<?php require_once("./includes/footer.php");