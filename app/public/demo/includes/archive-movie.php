<div class="col-md-4 mb-4" id="movie-card-<?php echo $movie['id'] ?>">
  <div class="card">
    <div class="movie-card-img">
      <div style="background-image: url(<?php echo $movie['posterUrl']?>);">
      </div>
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $movie['title']?></h5>
      <p class="card-text movie-card"><?php echo $plot ?></p>
      <a href="movie.php?movie_id=<?php echo $movie['id']?>" class="btn btn-primary">Read more</a>
    </div>
  </div>
</div>