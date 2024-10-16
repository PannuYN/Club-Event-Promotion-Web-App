<?php
    require_once 'dbinfo.php';
    

    $query = <<<eventSQL
    SELECT * FROM artist;
    eventSQL;
    $result = $conn->query($query);
    $rows = $result->num_rows;
    $all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
    echo "<div class='row d-flex justify-content-center mt-2'>";
    for($i=0; $i<$rows; $i++){
        echo "<div class='col-10 col-sm-8 col-md-7 col-lg-5 m-4'><div class='card h-100'>"
        ."<div class='card-body'>"
        ."<div class='d-flex justify-content-center align-items-center mb-3'>"
        ."<img src='".$all_rows[$i]['image']."' height='100px' width='100px' class='rounded-circle m-2' alt='Avatar Logo'>"
        ."<div class='d-flex justify-content-center text-wrap m-2'>"
        ."Name: ".$all_rows[$i]['name']."<br>"
        ."Type: ".$all_rows[$i]['type']."<br>"
        ."Biography: ".$all_rows[$i]['bio']."<br>"
        ."facebook: ".$all_rows[$i]['fb']."<br>"
        ."twitter: ".$all_rows[$i]['twt']."<br>"
        ."instagram: ".$all_rows[$i]['ig']."<br></div>"
        ."</div></div></div></div>";
    }
?>