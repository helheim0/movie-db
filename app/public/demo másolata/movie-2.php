<?php require_once("./includes/header.php"); ?>

        <h1>Another round</h1>
        <div class="row">
          <div class="col-3">
            <img class="card-img-top" src="https://resizing.flixster.com/BX8QKHyTizay0u0E-sg31hm-nP0=/206x305/v2/https://resizing.flixster.com/3O4N8wLIZ9taMNMfPhC5WzqRlLE=/ems.cHJkLWVtcy1hc3NldHMvbW92aWVzLzQ2NGJmZDQ1LWI5MjMtNDQ2ZC1iYzliLTE3YWI1ZGZmMTM4Yy5qcGc=" alt="Another round cover photo - man drinking">
          </div>
          <div class="col-9">
            <h2 class="year">2020
            <?php 
                if(check_old_movie(2020) != "FALSE"){?>
                  <span class="badge badge-dark badge-bg" >Old movie: <?php echo check_old_movie(2020) ?> years</span>
                <?php }
            ?>
            </h2>
            <p class="description">
              There is a theory that man is born with half a per mille too little, that alcohol in the blood opens the mind to the outside world, problems seem smaller, and creativity increases. We know it well: after the first glass of wine, the conversation lifts, the possibilities open up. Martin is a high-school teacher who feels old and tired. His students and their parents want him terminated to increase their average. Encouraged by the per mille theory, Martin and his three colleagues throw themselves into an experiment to maintain a constant alcohol impact in everyday life. If Churchill won World War II in a dense fog of spirits, what could the strong drops do for them and their students? The result is positive in the beginning. Martin's class is in a different way now, and the project is being promoted to a real academic study with the collection of results. Slowly but surely, the alcohol makes the four friends and their surroundings loosen up. The results are rising, and they really begin to feel life. As the objects go inboard, the experiment progresses for some and goes off track for others. It becomes clearer and clearer that alcohol can generate great results in world history, but that all daring can also have consequences. The film is described as a fun, touching and thought-provoking drama about friendship, freedom--and alcohol.
            </p>
            <p class="director">
              Directed By: <span class="fw-bold">Thomas Vinterberg</span>
            </p>
            <p class="duration">
              Runtime: <span class="fw-bold"><?php echo runtime_prettier(115); ?></span>
            </p>
            <h4 class="cast">Cast</h4>
            <ul>
              <li>Mads Mikkelsen <span class="fst-italic">(Martin)</span></li>
              <li>Thomas Bo Larsen <span class="fst-italic">(Tommy)</span></li>
              <li>Lars Ranthe <span class="fst-italic">(Peter)</span></li>
              <li>Magnus Millang <span class="fst-italic">(Nikolaj)</span></li>
            </ul>
          </div>
        </div>
<?php require_once("./includes/footer.php"); ?>
