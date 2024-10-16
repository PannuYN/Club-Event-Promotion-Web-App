<?php
    require_once 'dbinfo.php';
    $id = $_POST['delete_id'];
    $query = "DELETE FROM artist WHERE code=$id";

$result = $conn->query($query);

if($result)
    echo "Successfully deleted.";
else
    echo "Error deleting the artist.";

$conn->close();
