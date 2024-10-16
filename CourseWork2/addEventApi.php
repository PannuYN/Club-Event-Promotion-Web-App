<?php
session_start();
if (!isset($_SESSION["email"]))
    echo "<script>window.location = 'homepage1.php';</script>";

//fetch values
$category=htmlspecialchars($_POST['Category']);
$fee=htmlspecialchars($_POST['Fee']);
$maxCap=htmlspecialchars($_POST['MaxCap']);
$artist=htmlspecialchars($_POST['Artist']);
$date=htmlspecialchars($_POST['Date']);
$shr=htmlspecialchars($_POST['sHr']);
$smin=htmlspecialchars($_POST['sMin']);
$ehr=htmlspecialchars($_POST['eHr']);
$emin=htmlspecialchars($_POST['eMin']);

//check if no field is null
if($category==null || $fee==null || $maxCap==null || $artist==null || $date==null || $shr==null || $ehr==null)
    echo "Every field must be filled.\n";
//check time format
elseif($shr>23 || $ehr>23 || $smin>59 || $emin>59 || $ehr<$shr)
    echo "Invalid time input.\n";
else{
    //format date
    $dateArray =  explode("/", $date);
    $formattedDate = $dateArray[2]."-".$dateArray[0]."-".$dateArray[1];
    $stime = $shr.":".$smin.":00";
    $etime = $ehr.":".$emin.":00";
}

//get connection
require_once 'dbinfo.php';

//fetch artist code from name
$query = <<<artistSQL
SELECT * FROM artist WHERE name="$artist";
artistSQL;
$result = $conn->query($query);
$r = $result->fetch_array(MYSQLI_ASSOC);
$artistCode = $r['code'];

//execute query
$stmt=$conn->prepare("INSERT INTO event (date, start_time, end_time, category, fee, max_cap, artist_code) values (?,?,?,?,?,?,?);");
$stmt->bind_param("sssssss",$formattedDate,$stime,$etime,$category,$fee,$maxCap,$artistCode);
$stmt->execute();
$rows = $stmt->affected_rows;

//check if query succeeded
if($rows>0)
    echo "\nSuccessfully Registered.";
else
    echo "\nRegister Failed.";
$stmt->close();
$conn->close();

?>

 
