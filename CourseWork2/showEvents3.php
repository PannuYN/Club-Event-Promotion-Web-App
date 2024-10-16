<?php
    if(session_id() == "")
        session_start();
    if (!isset($_SESSION["email"]))
        echo "<script>window.location = 'homepage1.php';</script>";

    //check status for sorting
    if (!isset($_POST["status"]))
        $status = null;
    else
        $status = $_POST['status'];

    //get connection
    require_once 'dbinfo.php';

    //queries for each sorting
    $query = <<<eventSQL
    SELECT e.code, e.date, e.category, e.start_time, e.end_time, e.fee, e.max_cap, a.name, a.image FROM event e INNER JOIN artist a ON a.code=e.artist_code;
    eventSQL;
    $query1 = <<<event1SQL
    SELECT e.code, e.date, e.category, e.start_time, e.end_time, e.fee, e.max_cap, a.name, a.image FROM event e INNER JOIN artist a ON a.code=e.artist_code ORDER BY e.date;
    event1SQL;
    $query2 = <<<event2SQL
    SELECT e.code, e.date, e.category, e.start_time, e.end_time, e.fee, e.max_cap, a.name, a.image FROM event e INNER JOIN artist a ON a.code=e.artist_code ORDER BY e.category;
    event2SQL;
    $query3 = <<<event3SQL
    SELECT e.code, e.date, e.category, e.start_time, e.end_time, e.fee, e.max_cap, a.name, a.image FROM event e INNER JOIN artist a ON a.code=e.artist_code ORDER BY a.name;
    event3SQL;

    //execute the respective query due to condition
    if($status==1)
        $result = $conn->query($query1);
    elseif($status==2)
        $result = $conn->query($query2);
    elseif($status==3)
        $result = $conn->query($query3);
    else
        $result = $conn->query($query);

    //fetch data
    $rows = $result->num_rows;
    $all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    echo "<h3 class='display-2 text-center text-light'>Events</h3>";
    echo "<div class='row'><div class='col-md-11 d-flex justify-content-end mr-3'>";
    echo "<button type='button' class='btn btn-warning mx-2 refreshBtn' onClick='document.location.reload(true)'><i class='fa-solid fa-arrows-rotate' style='color: #000000;'></i></button>";
    echo "<div class='dropdown'>";
    echo "<button class='btn btn-warning dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Sorted By</button>";
    echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
    echo "<a class='dropdown-item sortDate' >Date</a><a class='dropdown-item sortCate'>Category</a><a class='dropdown-item sortArtist'>Artist</a>";
    echo "</div></div>";
    echo "</div></div>";
    echo "<div class='row d-flex justify-content-center mt-2'>";
    for($i=0; $i<$rows; $i++){
        echo "<div class='col-12 col-md-5 col-lg-4 m-4'><div class='card h-100'>"
        ."<div class='card-body p-3'>"
        ."<div class='d-flex justify-content-center align-items-center mb-3'>"
        ."<img src='".$all_rows[$i]['image']."' height='100px' width='100px' class='rounded-circle' alt='Artist Image'></div>"
        ."<div class='d-flex justify-content-start'>"
        ."Artist: ".$all_rows[$i]['name']."<br>"
        ."Category: ".$all_rows[$i]['category']."<br>"
        ."Date: ".$all_rows[$i]['date']."<br>"
        ."Time: ".$all_rows[$i]['start_time']." - "
        .$all_rows[$i]['end_time']."<br>"
        ."Fee: ".$all_rows[$i]['fee']."<br></div>"
        ."<div class='d-flex justify-content-end'>"
        ."<input type='button' class='btn btn-warning m-2 editBtn' id='".$all_rows[$i]['code']."' value='Edit'>"
        ."<input type='button' class='btn btn-danger m-2 deleteBtn' id='".$all_rows[$i]['code']."' value='Delete'></div>"
        ."</div></div></div>";
    }
    echo "</div>";
?>
