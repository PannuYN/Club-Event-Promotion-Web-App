<?php
session_start();
if (!isset($_SESSION["email"]))
    echo "<script>window.location = 'homepage1.php';</script>";

//get connection
require_once 'dbinfo.php';

//fetch data from file
parse_str(file_get_contents('php://input'), $_POST);
$eventCate = $_POST['eventCate'];
$eventFee = $_POST['eventFee'];
$maxCap = $_POST['maxCap'];
$artistName = $_POST['artistName'];
$date=$_POST['updatedDate'];
$sHr = $_POST['sHr'];
$sMin = $_POST['sMin'];
$eHr = $_POST['eHr'];
$eMin = $_POST['eMin'];
$eventCode = $_POST['eventCode'];
$stime = "";
$etime = "";
$formattedDate = "";

//check if any field is null
if($eventCate==null || $eventFee==null || $maxCap==null || $artistName==null || $date==null || $sHr==null || $eHr==null)
    echo "Every field must be filled";
//check time format
elseif($sHr>23 || $eHr>23 || $sMin>59 || $eMin>59 || $eHr<$sHr)
    echo "Invalid time input.\n";
else{
    $word = "/";
    if(str_contains($date, $word)){
        $dateArray =  explode("/", $date);
        $formattedDate = $dateArray[2]."-".$dateArray[0]."-".$dateArray[1];
    }
    else{
        $formattedDate = $date;
    }
    $stime = $sHr.":".$sMin.":00";
    $etime = $eHr.":".$eMin.":00";
}


//fetch artist code from artist name
$artistQuery = <<<artistSQL
SELECT * FROM artist WHERE name="$artistName";
artistSQL;
$artistResult = $conn->query($artistQuery);
$r = $artistResult->fetch_array(MYSQLI_ASSOC);
$artistCode = $r['code'];

//execute query
$query = "UPDATE event SET date = '$formattedDate', start_time = '$stime.', end_time = '$etime', category = '$eventCate', fee = $eventFee, max_cap = $maxCap, artist_code = $artistCode WHERE code = $eventCode";
$result = $conn -> query($query);

//check if the query succeeded
if (!$result) {
    echo "Update fail.";
}
else
    echo "Successfully updated.";

?>
