<?php require_once("./includes/header.php"); ?>

<?php
if(!empty($_GET) && isset($_GET['search']) && strlen($_GET['search'] >= 3)){
    if(!preg_match('/[^A-Za-z0-9]/', $_GET['search'])){
        $input =  $_GET['search'];

        echo "<h1>Search results for: " . $_GET['search'] . "</h1>";

        $res = array_filter($movies, function($data) {
            return str_contains(strtolower($data['title']), strtolower($_GET['search']));
        });
        
        if(!empty($res)){
        foreach($res as $r){ ?>
            <p><?php echo $r['title'] ?></p>
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

