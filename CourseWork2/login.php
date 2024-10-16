<?php
    session_start();
?>
<?php

//get connection
require_once 'dbinfo.php';

//fetch data
$email = htmlspecialchars($_POST['Email']);
$password = htmlspecialchars($_POST['Password']);

//execute query with prepared statement
$stmt=$conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
$stmt->bind_param("ss",$email,$password);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->num_rows;

//check if the query has result
if($rows > 0){
    $r = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION["email"] = $r["email"];
    $_SESSION["username"] = $r["username"];
    $_SESSION["phno"] = $r["phno"];
    $str = array("status"=>1);  
    echo json_encode($str);
}
else{
    $str = array("status"=>0);
    echo json_encode($str);
}

?>

 
