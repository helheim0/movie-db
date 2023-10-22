<?php require_once("./includes/header.php"); ?>

      <h1>Sick of myself</h1>
      <div class="row">
        <div class="col-3">
          <img class="card-img-top" src="https://storage.googleapis.com/eventbook-files/images/event/2023/05/bilete-tiff-2023-mi-e-sila-de-mine-sick-of-myself-loJ.jpg" alt="Sick of myself cover photo - woman sitting">
        </div>
        <div class="col-9">
          <h2 class="year">2023
          <?php 
                if(check_old_movie(2023) != "FALSE"){?>
                  <span class="badge badge-dark badge-bg" >Old movie: <?php echo check_old_movie(2023) ?> years</span>
                <?php }
          ?>
          </h2>
          <p class="description">
            Signe and Thomas are in an unhealthy, competitive relationship that takes a vicious turn when Thomas suddenly breaks through as a contemporary artist. In response, Signe makes a desperate attempt to regain her status by creating a new persona hell-bent on attracting attention and sympathy.
          </p>
          <p class="director">
            Directed By: <span class="fw-bold">Kristoffer Borgli</span>
          </p>
          <p class="duration">
            Runtime: <span class="fw-bold"><?php echo runtime_prettier(97); ?></span>
          </p>
          <h4 class="cast">Cast</h4>
          <ul>
            <li>Kristine Kujath Thorp <span class="fst-italic">(Signe)</span></li>
            <li>Eirik Sæther <span class="fst-italic">(Thomas)</span></li>
            <li>Sarah Francesca Brænne <span class="fst-italic">(Emma)</span></li>
            <li>Fredrik Stenberg Ditlev-Simonsen <span class="fst-italic">(Yngve)</span></li>
            <li>Steinar Klouman Hallert <span class="fst-italic">(Stian)</span></li>
          </ul>
        </div>
      </div>
      <?php require_once("./includes/footer.php"); ?>
