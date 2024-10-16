<?php
    if(session_id() == "")
        session_start();
    if (!isset($_SESSION["email"]))
        echo "<script>window.location = 'homepage1.php';</script>";
    require_once 'dbinfo.php';
    

    $query = <<<eventSQL
    SELECT * FROM artist;
    eventSQL;
    $result = $conn->query($query);
    $rows = $result->num_rows;
    $all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
    echo "<h3 class='display-2 text-center text-light'>Artists</h3>";
    echo "<div class='row d-flex justify-content-center mt-2'>";
    for($i=0; $i<$rows; $i++){
        echo "<div class='col-12 col-sm-10 m-4'><div class='card h-100'>"
        ."<div class='card-body p-3'>"
        ."<div class='d-flex justify-content-start align-items-center mb-3'>"
        ."<img src='".$all_rows[$i]['image']."' height='100px' width='100px' class='rounded-circle m-2' alt='Artist Image'>"
        ."<div class='d-flex justify-content-start text-wrap m-2'>"
        ."Name: ".$all_rows[$i]['name']."<br>"
        ."Type: ".$all_rows[$i]['type']."<br>"
        ."Biography: ".$all_rows[$i]['bio']."<br>"
        ."facebook: ".$all_rows[$i]['fb']."<br>"
        ."twitter: ".$all_rows[$i]['twt']."<br>"
        ."instagram: ".$all_rows[$i]['ig']."<br></div></div>"
        ."<div class='d-flex justify-content-end'>"
        ."<input type='button' class='btn btn-danger m-2 deleteArtistBtn' id='".$all_rows[$i]['code']."' value='Delete'></div>"
        ."</div></div></div>";
    }
?>