<?php 
session_start();
if (!isset($_SESSION["email"]))
    echo "<script>window.location = 'homepage1.php';</script>";

//fetch values
$name=htmlspecialchars($_POST['Name']);
$bio=htmlspecialchars($_POST['Bio']);
$type=htmlspecialchars($_POST['Type']);
$fb=htmlspecialchars($_POST['Fb']);
$twt=htmlspecialchars($_POST['Twt']);
$ig=htmlspecialchars($_POST['Ig']);


//check if name has input value
if($name!=null){
    //get connection
    require_once 'dbinfo.php';

    //check if name already exists
    $stmt=$conn->prepare("SELECT * FROM artist WHERE name = ?");
    $stmt->bind_param("s",$name);
    $stmt->execute();
    $r = $stmt->get_result();
    $rows = $r->num_rows;
    if($rows == 0){
        if(isset($_FILES['Image']['name'])){
            $image = htmlspecialchars($_FILES['Image']['name']);
            $dir = "ArtistImages/";
            $filename = $dir.$image;
            $saved = 1;
            $imageType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if(file_exists($filename)){
                echo "Image already exists.";
                $saved = 0;
            }
            else{
                if(move_uploaded_file($_FILES['Image']['tmp_name'], $filename))
                    echo "The file has been uploaded successfully.";
                else
                    echo "There was an error uploading the file.";
            }
        }
        else
            $filename = null;
        

        //execute query
        $stmt=$conn->prepare("INSERT INTO artist (name, type, bio, image, fb, twt, ig) VALUES (?,?,?,?,?,?,?);");
        $stmt->bind_param("sssssss",$name,$type,$bio,$filename,$fb,$twt,$ig);
        $stmt->execute();
        $rows = $stmt->affected_rows;
        
        //check if the query succeeded
        if($rows>0){
            echo "\nSuccessfully added";
        }   
        else{
            echo "\nFailed";
        }
        $conn->close();
    }
    else
        echo "Artist name already exists.";
    
}
else
    echo "Artist name must be filled.\n";

?>