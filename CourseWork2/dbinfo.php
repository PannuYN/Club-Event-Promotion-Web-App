<?php 
    $host = 'localhost';
    $database = 'coursework2';
    $user = 'root';
    $pass = 'pan12345!';


    $conn = new mysqli($host,$user,$pass,$database);
    if($conn->connect_error){
        die($conn->connect_error);
}
?>