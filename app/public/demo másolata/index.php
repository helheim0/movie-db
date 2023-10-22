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
  <?php require_once("./includes/header.php") ?>
      <div class="row mt-5 mb-4">
        <div class="col-7 align-self-center">
          <h1>Hello there, wanderer!</h1>

          <!-- Personalized greeting -->
          <?php 
            date_default_timezone_set("Europe/Bucharest");
            $hour = date("H");
            if($hour > 6 && $hour < 12){
              echo "<h2>Good morning!</h2>";
            }
            else if($hour > 12 && $hour < 19){
              echo "<h2>Good afternoon!</h2>";
            }
            else if($hour > 19 && $hour < 22){
              echo "<h2>Good evening!</h2>";
            }
            else {
              echo "<h2>Good night!</h2>";
            }
          ?>
          <p>In here, we recommend you the best movies ever that you must watch in this lifetime! Hurry up, click on the button below and start browsing our impeccable movie database! Have fun.</p>
          <a class="btn btn-primary" href="movies.php" role="button">Movies</a>
        </div>
        <div class="col-5">
          <img class="img-fluid" src="https://hips.hearstapps.com/hmg-prod/images/summer-movies-1587392939.jpg?crop=0.6666666666666666xw:1xh;center,top&resize=1200:*" alt="">
        </div>
      </div>
    </div>
    <?php require_once("./includes/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>