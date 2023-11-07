<?php 
    $conn = dbConnect('localhost', 'php-user', 'php-password', 'php-proiect');
    
    $review_data = array(
        'show_reviews_form' => false,
    );

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

        $sql = "CREATE TABLE IF NOT EXISTS reviews (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            movieId INT(6) NOT NULL,
            name TEXT(30) NOT NULL,
            email TEXT(30) NOT NULL,
            review TEXT(90) NOT NULL
        )";
        
        if(mysqli_query($conn, $sql)){
        $review_data['show_reviews_form'] = true;
        $sql3 = "SELECT name, review FROM reviews WHERE movieId = " . $_GET['movie_id'];
        $result = mysqli_query($conn, $sql3);
        $review_data['count'] = mysqli_num_rows($result);

            if( $review_data['count'] > 0){
                $review_data['list'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $review_emails = array_column($review_data['list'], 'email');
            }

            if(isset($_POST['review'])){ 
                if(isset($review_emails) && in_array($_POST['email'], $review_emails)){
                    $review_data['alert'] = 'danger';
                    $review_data['message'] = 'Looks like you have already submitted a review.';
                } else {
                $sql2 = "INSERT INTO reviews (movieId, name, email, review)
                VALUES (?, ?, ?, ?)";
                $s = $conn->prepare($sql2);
                $s->bind_param("ssss", $_GET['movie_id'],  $_POST['name'], $_POST['email'], $_POST['review']);
                $s->execute();
            
            if(mysqli_query($conn, $sql)){
                //Successfully submitted
                $review_data['show_reviews_form'] = false;
                $review_data['alert'] = 'success';
                $review_data['message'] = ' Review successfully submitted!';
            }
            else {
                //Not submitted
                $review_data['alert'] = 'danger';
                $review_data['message'] = 'There has been a problem. Your review could not be sent.';
            }
    }} ?>
    <div class="col-8 bg-light-subtle text-emphasis-light pt-4 pb-4" >
        <h3>Leave a review</h3>
        <?php if(isset($review_data['message']) && isset($review_data['alert']) ){ ?>
        <div class="alert my-3 alert-<?php echo $review_data['alert']; ?>" role="alert">
            <?php echo $review_data['message']; ?>
        </div> <?php }

        if( $review_data['show_reviews_form'] == true){
        ?>
        
        <form action="" method="POST">
            <div class="input-group">
            <div class="col me-2">
                <label class="mt-2 mb-2">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php if(isset($_POST['name'])) echo $_POST['name']?>" required>
                <label class="mt-2 mb-2">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="<?php if(isset($_POST['email'])) echo $_POST['email']?>" required>
            </div>
            <div class="col">
                <label class="mt-2 mb-2">Review</label>
                <textarea type="text" class="form-control" name="review" value="<?php if(isset($_POST['review'])) echo $_POST['review']?>" placeholder="Enter your review" required></textarea>
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
        </div>
    <?php } } 
?>