<?php require_once("./includes/header.php"); ?>
<!-- Hero section -->
<div class="row mt-5">
    <div class="col-md-6 align-self-center mb-5">
        <div class="d-flex flex-column justify-content-between">
            <h1>Your <span>Good</span> Health Makes You Happy</h1>
            <p>We are here for your care. Your health is our top-most priority. We offer you quality service and care. We hear you. We care about you.</p>
            <div class="">
                <a href="#" class="btn btn-primary" tabindex="-1" role="button">Make Appointment</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <img src="./assets/hero.jpg" class="img-fluid" alt="">
    </div>
    <div class="mt-5">
        <h3 class="mb-4 mt-4"> Quick actions</h3>
        <div class="col d-flex flex-row align-items-center justify-content-evenly">
            <?php 
                $quickActions = array(
                    array(
                        "title" => "Results",
                        "path" => "./assets/research.png",
                        "alt" => "result icon"
                    ),
                    array(
                        "title" => "Appointment",
                        "path" => "./assets/appointment.png",
                        "alt" => "calendar icon"
                    ),
                    array(
                        "title" => "Look for a doctor",
                        "path" => "./assets/doctor.png",
                        "alt" => "doctor icon"
                    ),
                    array(
                        "title" => "Medical centers",
                        "path" => "./assets/hospital.png",
                        "alt" => "hospital icon"
                    ),
                );

                foreach($quickActions as $actions){
                    ?>
                        <div class="d-flex flex-row align-items-center p-2 action-hover">
                            <a href="#">
                            <img class="img-fluid action-img" src="<?php echo $actions['path']?>" alt="<?php echo $actions['alt']?>">
                            <h6><?php echo $actions['title']?></h6>
                            </a>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
    </div>

    <!-- Services -->
    <div class="row">
        <div class="text-center mb-5 mt-5">
            <h1>Our Services</h1>
            <p>We present you our top quality services that cover a great variety of fields.</p>
        </div>
        
        <?php 
         $services = array(
            array(
                "title" => "Results",
                "img" => "./assets/research.png",
                "alt" => "result icon",
                "path" => "",
                "desc" => "Știi că ești îngrijit de un medic bun atunci când viitorul e plin de încredere că ești pe mâini bune și toate problemele se vor rezolva."
            ),
            array(
                "title" => "Results",
                "img" => "./assets/research.png",
                "alt" => "result icon",
                "path" => "",
                "desc" => "Știi că ești îngrijit de un medic bun atunci când viitorul e plin de încredere că ești pe mâini bune și toate problemele se vor rezolva."
            ),
            array(
                "title" => "Results",
                "img" => "./assets/research.png",
                "alt" => "result icon",
                "path" => "",
                "desc" => "Știi că ești îngrijit de un medic bun atunci când viitorul e plin de încredere că ești pe mâini bune și toate problemele se vor rezolva."
            ),
        );
            foreach($services as $service){
                ?>
                <div class="col-4 mb-4 text-center" ?>
                <div class="card align-self-center">
                    <img src="<?php echo $service['img']?>" class=" action-img img-fluid" alt="<?php echo $service['alt']?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $service['title']?></h5>
                        <p class="card-text"><?php echo $service['desc']?></p>
                        <a href="<?php echo $service['path']?>" class="btn">Learn more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                </div>
          <?php  }
        ?>
    </div>

    <!-- Prizes -->
    <div class="row">
        <div class="text-center mb-5 mt-5">
            <h1>Awards and Prizes</h1>
        </div>

        <?php 
         $services = array(
            array(
                "title" => "Results",
                "img" => "./assets/research.png",
                "alt" => "result icon",
                "path" => "",
                "desc" => "Știi că ești îngrijit de un medic bun atunci când viitorul e plin de încredere că ești pe mâini bune și toate problemele se vor rezolva."
            ),
            array(
                "title" => "Results",
                "img" => "./assets/research.png",
                "alt" => "result icon",
                "path" => "",
                "desc" => "Știi că ești îngrijit de un medic bun atunci când viitorul e plin de încredere că ești pe mâini bune și toate problemele se vor rezolva."
            ),
            array(
                "title" => "Results",
                "img" => "./assets/research.png",
                "alt" => "result icon",
                "path" => "",
                "desc" => "Știi că ești îngrijit de un medic bun atunci când viitorul e plin de încredere că ești pe mâini bune și toate problemele se vor rezolva."
            ),
        );
            foreach($services as $service){
                ?>
                <div class="col-4 mb-4 text-center" ?>
                <div class="card border-0 align-self-center">
                    <img src="<?php echo $service['img']?>" class=" action-img img-fluid" alt="<?php echo $service['alt']?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $service['title']?></h5>
                        <p class="card-text"><?php echo $service['desc']?></p>
                    </div>
                </div>
                </div>
          <?php  }
        ?>
    </div>

    <!-- Testimonials -->
    <div class="row">
             
    </div>
<?php require_once('./includes/footer.php') ?>