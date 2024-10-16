<?php
    session_start();
    if (!isset($_SESSION["email"]))
        echo "<script>window.location = 'homepage1.php';</script>";
    require_once 'dbinfo.php';
    parse_str(file_get_contents('php://input'), $_PUT); // Convoluted, but allows us to access "PUT array"
    $id = $_POST['edit_id'];
    $query = "SELECT e.code, e.date, e.category, e.start_time, e.end_time, e.fee, e.max_cap, a.name, a.code FROM event e INNER JOIN artist a ON a.code=e.artist_code WHERE e.code=$id";

$result = $conn->query($query);
$all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$json_string = json_encode($all_rows, JSON_UNESCAPED_UNICODE);
//echo "<br>";
echo $json_string;

$conn->close();
