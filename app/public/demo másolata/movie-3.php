<?php require_once("./includes/header.php"); ?>

        <h1>The age of Adaline</h1>
        <div class="row">
          <div class="col-3">
            <img class="card-img-top" src="https://resizing.flixster.com/_PV-4xq5nd_zfwXpBCM35c4HrBU=/206x305/v2/https://flxt.tmsimg.com/assets/p11002256_p_v8_aj.jpg" alt="Cover picture of a woman"> 
          </div>
          <div class="col-9">
            <h2 class="year">2015
              <?php 
                if(check_old_movie(2015) != "FALSE"){?>
                  <span class="badge badge-dark badge-bg" >Old movie: <?php echo check_old_movie(2015) ?> years</span>
                <?php }
              ?>
            </h2>
            <p class="description">
              Signe and Thomas are in an unhealthy, competitive relationship that takes a vicious turn when Thomas suddenly breaks through as a contemporary artist. In response, Signe makes a desperate attempt to regain her status by creating a new persona hell-bent on attracting attention and sympathy.
            </p>
            <p class="director">
              Directed By: <span class="fw-bold">Lee Toland Krieger</span>
            </p>
            <p class="duration">
              Runtime: <span class="fw-bold"><?php echo runtime_prettier(113); ?></span>
            </p>
            <h4 class="cast">Cast</h4>
            <ul>
              <li>Blake Lively <span class="fst-italic">(Adaline)</span></li>
              <li>Michael Huisman <span class="fst-italic">(Ellis)</span></li>
              <li>Harrison Ford <span class="fst-italic">(William)</span></li>
              <li>Ellen Burstyn <span class="fst-italic">(Flemming)</span></li>
              <li>Kathy Baker <span class="fst-italic">(Kathy)</span></li>
            </ul>
          </div>
        </div>
        <?php require_once("./includes/footer.php"); ?>
