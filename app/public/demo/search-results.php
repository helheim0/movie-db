<?php require_once("./includes/header.php"); ?>
<div class="row">
<?php
if(!empty($_GET) && isset($_GET['search']) && strlen($_GET['search'] >= 3)){
    if(!preg_match('/[^A-Za-z0-9]/', $_GET['search'])){
        $input =  $_GET['search'];

        echo "<h1>Search results for: " . $_GET['search'] . "</h1>";

        $res = array_filter($movies, function($data) {
            return str_contains(strtolower($data['title']), strtolower($_GET['search']));
        });
        
        if(!empty($res)){
        foreach($res as $movie){ ?>
            <div class="col-lg-4 mb-4" id="movie-card-<?php echo $movie['id'] ?>">
                <div class="card">
                    <div class="movie-card-img">
                    <div style="background-image: url(<?php echo $movie['posterUrl']?>);">
                    </div>
                    </div>
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $movie['title']?></h5>
                    <p class="card-text movie-card"><?php echo $movie['plot'] ?></p>
                    <a href="movie.php?movie_id=<?php echo $movie['id']?>" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        <?php  }
        }
        else {
            echo "<h3>0 movies were found with the given expression. Please try again with a different command.</h3>";
        }
    }
    else if(!empty($_GET) && isset($_GET['search']) && strlen($_GET['search'] > 0) && strlen($_GET['search'] < 3)){
        echo "<h4>The searched term must have at least 3 characters.</h4>";
    }
    else {
        echo "<h3>The search term can only contain letters or numbers.</h3>";
    }
}

else {
    echo "<h3>Invalid request. You have reached the site without looking for something.</h3>";
}
require_once("./includes/search-form.php");
?>
</div>
