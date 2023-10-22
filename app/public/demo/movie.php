<?php 
//Header
require_once("./includes/header.php"); 

if(isset($_GET['movie_id']) && !empty($_GET['movie_id'])){
$filtered = array_filter($movies, function($data){
    return $data['id'] == $_GET['movie_id'];
});

if(!empty($filtered)){
    foreach($filtered as $value){ ?>
    <h1><?php echo $value['title'] ?></h1>
    
    <div class="row">
        <div class="col-md-4 col-lg-3 mb-4">
        <div class="movie-card-img card-img-top">
      <div style="background-image: url(<?php echo $value['posterUrl']?>);">
      </div>
    </div>
        </div>
        <div class="col-md-8 col-lg-9">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h2 class="year"><?php echo $value['year']?>
                    <?php 
                    if(check_old_movie($value['year']) != "FALSE"){?>
                        <span class="badge badge-dark badge-bg" >Old movie: <?php echo check_old_movie($value['year']) ?> years old</span>
                    <?php }
                    ?>
                </h2>
            </div>
            <div class="col-auto text-end">
            <?php 
                $favorites = array();
                $file_name = './assets/movie-favorites.json';
                $fav_stats = json_decode(file_get_contents($file_name), true);
                
                if(!$fav_stats){
                    $fav_stats = array();
                }

                if(isset($_COOKIE['favorites'])){
                    $favorites = json_decode($_COOKIE["favorites"], true);
                }
                
                if(isset($_POST['favorites'])){
                    if($_POST['favorites'] === '1' && !in_array($_GET['movie_id'], $favorites)){
                        $favorites[] = $_GET['movie_id'];
                        if(array_key_exists($_GET['movie_id'], $fav_stats)){
                            $fav_stats[$_GET['movie_id']]++;
                        }
                        else {
                            $fav_stats[$_GET['movie_id']] = 1;
                        }
                    }
                    elseif($_POST['favorites'] === '0' && in_array($_GET['movie_id'], $favorites)){
                        if(($key = array_search($_GET['movie_id'], $favorites)) !== false){
                            unset($favorites[$key]);

                            if($fav_stats[$_GET['movie_id']] > 0){
                                $fav_stats[$_GET['movie_id']]--;
                            }
                        }
                    }
                    setcookie("favorites", json_encode($favorites), time() + (84600 * 30 * 12));
                    file_put_contents($file_name, json_encode($fav_stats));
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                } 
                
                //Ratings
                $ratings = array();
                $rating_file = './assets/movie-rating.json';
                $rating_stats = json_decode(file_get_contents($rating_file), true);

                if(!$rating_stats){
                    $rating_stats = array();
                }

                if(isset($_COOKIE['ratings'])){
                    $ratings = json_decode($_COOKIE['ratings'], true);
                }

                if(isset($_POST['ratings'])){
                    $ratings[] = $_GET['movie_id'];
                    if(array_key_exists($_GET['movie_id'], $ratings)){
                        $ratings[$_GET['movie_id']] = $_POST['ratings'];
                    }
                    else {

                    }

                    setcookie("ratings", json_encode($ratings), time() + (84600 * 30 * 12));
                    file_put_contents($rating_file, json_encode($rating_stats));
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                }  ?>
                <form action="" method="POST" class="pb-3">
                    <input type="hidden" name="favorites" value="<?php echo (in_array($_GET['movie_id'], $favorites)) ? "0" : "1" ?>" />
                    <button type="submit" class="btn position-relative <?php echo (in_array($_GET['movie_id'], $favorites)) ? "btn-outline-primary" : "btn-primary" ?>" ><?php echo (in_array($_GET['movie_id'], $favorites)) ? "Remove from favorites" :  "Add to favorites"; ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php echo isset($fav_stats[$_GET['movie_id']]) ? $fav_stats[$_GET['movie_id']] : 0 ?>
                            <span class="visually-hidden">favorites</span>
                        </span>
                    </button>
                </form> 
            </div>
        </div>
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
    <div class="row gy-2 gx-3">
        <div class="col-8 bg-light-subtle text-emphasis-light pt-4 pb-4" >
        <h3>Leave a review</h3>
        <!-- REVIEW -->
        <?php 
        $conn = dbConnect('localhost', 'php-user', 'php-password', 'php-proiect');
       
        if(isset($_POST['review'])){ 
            $sql = "CREATE TABLE IF NOT EXISTS reviews (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                movieId INT(6) NOT NULL,
                name TEXT(30) NOT NULL,
                email TEXT(30) NOT NULL,
                review TEXT(90) NOT NULL
            )";
            
            if(mysqli_query($conn, $sql)){
                if("SELECT name, email, review FROM reviews WHERE movieId LIKE {$_GET['movie_id']} AND name NOT LIKE {$_POST['name']} AND email NOT LIKE {$_POST['email']} "){
                $sql2 = "INSERT INTO reviews (movieId, name, email, review)
                VALUES (?, ?, ?, ?)";
                $s = $conn->prepare($sql2);
                $s->bind_param("ssss", $_GET['movie_id'],  $_POST['name'], $_POST['email'], $_POST['review']);
                $s->execute();
            
            if(mysqli_query($conn, $sql)){
                ?> 
                <div class="alert alert-success" role="alert">               
                    Review successfully submitted!
                </div> <?php
            }}
            else {
                echo "Error: " . mysqli_error($conn);
            }

            }
            else {
                echo "You have already submitted a review for this movie!";
            } ?>
        <?php }
        else { ?>
            <form action="" method="POST">
                <div class="input-group">
                <div class="col me-2">
                    <label class="mt-2 mb-2">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                    <label class="mt-2 mb-2">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>
                <div class="col">
                    <label class="mt-2 mb-2">Review</label>
                    <textarea type="text" class="form-control" name="review" value="review" placeholder="Enter your review" required></textarea>
                </div>
                </div>
                <div class="col mt-2 mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="terms" required>
                    <label class="form-check-label" for="terms">
                      I agree with the processing of personal data.
                    </label>
                </div> 
                <button type="submit" class="btn btn-dark d-block  mt-2">Submit</button>
            </form>
        <?php }
            ?>
    </div>
    <div class="col-4">   
    <!-- RATING -->
        <h3>Rate this movie</h3>
        <form method="POST" action="">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="option" id="option1" required>
                    <label class="form-check-label" for="option1">
                        1
                    </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="option" id="option2">
                    <label class="form-check-label" for="option2">
                        2
                    </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="option" id="option3">
                    <label class="form-check-label" for="option3">
                        3
                    </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="option" id="option4">
                    <label class="form-check-label" for="option4">
                        4
                    </label>
            </div>
            <div class="form-check form-check-inline" >
            <input class="form-check-input" type="radio" name="option" id="option5">
                <label class="form-check-label" for="option5">
                    5
                </label>
            </div>
            <button type="submit" class="btn btn-secondary">Rate!</button>
        </form>    
    </div>
    </div>
    <!-- REVIEWS LIST -->
    <div class="row mt-4 mb-4">
            <h3 class="mb-4">Reviews</h3>
            <?php
            
                $sql3 = "SELECT name, review FROM reviews WHERE movieId LIKE {$_GET['movie_id']}";
                $result = mysqli_query($conn, $sql3);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){ ?>
                        <div class="col-auto">
                        <div class="card">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                <p><?php echo $row['review']; ?></p>
                                <footer class="blockquote-footer"><?php echo $row['name']; ?></footer>
                                </blockquote>
                            </div>
                            </div>
                        </div>
                    <?php }
                }
            else {
                echo "<h4>No reviews yet. Be the first to leave a review!</h4>";
            }  ?>
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
