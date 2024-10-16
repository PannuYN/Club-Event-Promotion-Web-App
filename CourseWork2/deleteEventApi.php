<?php
    require_once 'dbinfo.php';
    $id = $_POST['delete_id'];
    $query = "DELETE FROM event WHERE code=$id";

$result = $conn->query($query);

if($result)
    echo "Successfully deleted.";
else
    echo "Error deleting the event.";

$conn->close();
