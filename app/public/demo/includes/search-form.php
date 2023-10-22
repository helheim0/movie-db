<form class="d-flex" role="search" method="get" action="search-results.php">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php 
        echo !empty($_GET['search']) ?  $_GET['search'] : "";
    ?>"/>
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>