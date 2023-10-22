<?php 
    $favorite = $_GET['movie_id'];
    $favorites = !empty($_COOKIE['favorites']) ? json_decode($_COOKIE['favorites']) : [];
   /* if(in_array($favorite,$favorites)){
        array_push($favorite, $favorites);
    }
    else {    
        array_push($favorite, 1);
    }*/

    if(isset($_COOKIE['favorites'])){
        $favorite = $_COOKIE['favorites'];
    }
    setcookie('favorites', json_encode($favorites), time()+60*60*24*365);
    echo $favorites;


//File
$file = fopen("./assets/movie-favorites.json", 'a');
$json = file_get_contents("./assets/movie-favorites.json");
$json_data = json_decode($json, true);

/*
print_r($json_data);
$id = $_GET['movie_id'];
if(in_array($json_data, $id)){
    echo "id present";
    return true;
}*/

fwrite($file, json_encode($json_data));
file_put_contents("./assets/movie-favorites.json", json_encode($json_data));
fclose($file);

//Header
require_once("./includes/header.php"); 

if(isset($_GET['movie_id']) && !empty($_GET['movie_id'])){
$filtered = array_filter($movies, function($data){
    return $data['id'] == $_GET['movie_id'];
});

if(!empty($filtered)){
    foreach($filtered as $value){ ?>
    <h1><?php echo $value['title'] ?></h1>
    <form action="" method="post" class="pb-3">
        <?php if(strpos($_COOKIE['favorites'], $_GET['movie_id'])){ ?>
            <input type="hidden" name="favorite" value="1" />
            <button class="btn btn-outline-primary" type="submit">Remove from favorites</button>
        <!--  <button class="btn <?php echo str_contains($_COOKIE['favorites'], $_GET['movie_id']) ? "btn-primary" : "btn-outline-primary" ?>" type="submit"><?php echo str_contains($_COOKIE['favorites'], $_GET['movie_id']) ? "Add to favorites" : "Remove from favorites" ?></button> -->
       <?php } else { ?>
            <input type="hidden" name="favorite" value="0" />
            <button class="btn btn-primary" type="submit">Add to favorites</button>
        <!--  <button class="btn <?php echo str_contains($_COOKIE['favorites'], $_GET['movie_id']) ? "btn-primary" : "btn-outline-primary" ?>" type="submit"><?php echo str_contains($_COOKIE['favorites'], $_GET['movie_id']) ? "Add to favorites" : "Remove from favorites" ?></button> -->
       <?php } ?> 
    </form> 
    <div class="row">
        <div class="col-3">
        <img class="card-img-top" src="<?php echo $value['posterUrl']?>" alt="<?php echo $value['title'] . " poster"?>"> 
        </div>
        <div class="col-9">
        <h2 class="year"><?php echo $value['year']?>
            <?php 
            if(check_old_movie($value['year']) != "FALSE"){?>
                <span class="badge badge-dark badge-bg" >Old movie: <?php echo check_old_movie($value['year']) ?> years old</span>
            <?php }
            ?>
        </h2>
        <p class="description">
            <?php echo $value['plot'];?>
        </p>
        <p class="director">
            Directed By: <span class="fw-bold"><?php echo $value['director']?></span>
        </p>
        <p class="duration">
            Runtime: <span class="fw-bold"><?php echo runtime_prettier($value['runtime']); ?></span>
        </p>
        <h4 class="cast">Cast</h4>
        <ul> 
            <?php $actors = explode(",", $value['actors']); 
                foreach($actors as $actor){
                    ?> <li><?php echo $actor?></li> <?php
                }
            ?>
        </ul>
        <h4 class="genres">Genres: </h4>
        <div class="d-flex flex-row"> <?php
        for($i = 0;  $i<count($value['genres']); $i++){ ?>
            <p class="pe-2"><span class="badge bg-secondary"><?php 
            echo $i==count($value['genres'])-1 ? $value['genres'][$i]  : $value['genres'][$i] . ",&nbsp;" ?></span></p>
        <?php } ?>
        </div>
    </div>
    <?php  }
}
else {
    ?> <h2>Invalid ID! Please try again!</h2>
    <a href="movies.php" class="btn btn-primary" role="button" >Back to movies</a>
    <?php
}
}
elseif(empty($_GET['movie_id'])){
    ?> <h2>Parameter can't be empty!</h2>
        <a href="movies.php" class="btn btn-primary" role="button" >Back to movies</a>
    <?php
}
else {
    echo "<h2>Something went wrong! Please try again.</h2>";
}
?>
</div>
   
<?php require_once("./includes/footer.php"); ?>
