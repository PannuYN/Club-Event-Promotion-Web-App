<?php
    //current date
    $currentDate = date('Y-m-d');

    //for sorting
    if (!isset($_POST["status"]))
        $status = null;
    else
        $status = $_POST['status'];

    //get connection
    require_once 'dbinfo.php';

    //query for each sorting
    $query = <<<eventSQL
    SELECT e.date, e.category, e.start_time, e.end_time, e.fee, e.max_cap, a.name, a.image FROM event e INNER JOIN artist a ON a.code=e.artist_code WHERE e.date BETWEEN '$currentDate' AND DATE_ADD('$currentDate', INTERVAL 6 MONTH);
    eventSQL;
    $query1 = <<<event1SQL
    SELECT e.date, e.category, e.start_time, e.end_time, e.fee, e.max_cap, a.name, a.image FROM event e INNER JOIN artist a ON a.code=e.artist_code WHERE e.date BETWEEN '$currentDate' AND DATE_ADD('$currentDate', INTERVAL 6 MONTH) ORDER BY e.date;
    event1SQL;
    $query2 = <<<event2SQL
    SELECT e.date, e.category, e.start_time, e.end_time, e.fee, e.max_cap, a.name, a.image FROM event e INNER JOIN artist a ON a.code=e.artist_code WHERE e.date BETWEEN '$currentDate' AND DATE_ADD('$currentDate', INTERVAL 6 MONTH) ORDER BY e.category;
    event2SQL;
    $query3 = <<<event3SQL
    SELECT e.date, e.category, e.start_time, e.end_time, e.fee, e.max_cap, a.name, a.image FROM event e INNER JOIN artist a ON a.code=e.artist_code WHERE e.date BETWEEN '$currentDate' AND DATE_ADD('$currentDate', INTERVAL 6 MONTH) ORDER BY a.name;
    event3SQL;

    //execute query
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
    
    echo "<h3 class='display-3 text-center text-light'>Upcoming Events</h3>";
    echo "<div class='row'><div class='col-md-11 d-flex justify-content-end mr-3'>";
    echo "<div class='dropdown ms-auto'>";
    echo "<button class='btn btn-warning dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Sorted By</button>";
    echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
    echo "<a class='dropdown-item sortDateUser' >Date</a><a class='dropdown-item sortCateUser'>Category</a><a class='dropdown-item sortArtistUser'>Artist</a>";
    echo "</div></div></div></div>";
    echo "<div class='row d-flex justify-content-center mt-2'>";
    for($i=0; $i<$rows; $i++){
        echo "<div class='col-12 col-md-5 col-lg-3 m-4'><div class='card h-100'>"
        ."<div class='card-body p-3'>"
        ."<div class='d-flex justify-content-center align-items-center mb-3'>"
        ."<img src='".$all_rows[$i]['image']."' height='100px' width='100px' class='rounded-circle' alt='Artist Image'></div>"
        ."<div class='d-flex justify-content-center'>"
        ."Artist: ".$all_rows[$i]['name']."<br>"
        ."Category: ".$all_rows[$i]['category']."<br>"
        ."Date: ".$all_rows[$i]['date']."<br>"
        ."Time: ".$all_rows[$i]['start_time']." - "
        .$all_rows[$i]['end_time']."<br>"
        ."Fee: ".$all_rows[$i]['fee']."<br></div>"
        ."</div></div></div>";
    }
    echo "</div>";
?>