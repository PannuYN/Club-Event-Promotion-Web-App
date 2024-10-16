<?php
    session_start();
    if (!isset($_SESSION["email"]))
        echo "<script>window.location = 'homepage1.php';</script>";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="stylistic.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18db659ebc.js" crossorigin="anonymous"></script>
    
</head>
  <body>
  
    <div class=“container”>
        <!-- nav bar -->
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="homepage1.php"><img src="Images/logo4.png" width=44 height=40></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fa-2xl" style="color: #ffffff;"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="homepage1.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" >Log out</a>   
                        </li>
                    </ul>
                </div>
            </div>
          </nav>
        </div>

        <!-- User info content block -->
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-sm-8 d-flex justify-content-center mt-5 mb-5">
                <div class="row">
                    <div class="col-sm-5 d-flex justify-content-center mb-2">
                        <img src="Images/admin.png" height="150px" width="150px" class="rounded-circle" alt="Avatar Logo">
                    </div>
                    <div class="col-sm-7 d-flex justify-content-center mb-2">
                        <div class="row d-flex justify-content-center">
                            <h4 class="col-12 text-sm-left mt-4">
                                <?php 
                                    $email = $_SESSION["email"];
                                    $username = $_SESSION["username"];
                                    $phno = $_SESSION["phno"];
                                    echo $username. "<br>". $email ."<br>" .$phno;
                                ?>
                            </h4s>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
        <!-- Events and artists content block -->
        <div class="row d-flex justify-content-center">
            <div class="col-11 d-flex justify-content-center bg-dark">
                <div class="row">
                    <div class="col-sm-3">
                        
                        <div class="row d-flex justify-content-center mt-3">
                            <div class="col-3 col-sm-12 d-flex justify-content-center list-group-item">
                                <input type="button" class="btn btn-outline-warning text-light m-2" value='Events' id="showEvents">
                            </div>
                            <div class="col-3 col-sm-12 d-flex justify-content-center list-group-item">
                                <input type="button" class="btn btn-outline-warning text-light m-2" value='Add Event' id="addEvent" data-toggle="modal" data-target="#addEventModal">
                            </div>
                            <div class="col-3 col-sm-12 d-flex justify-content-center list-group-item">
                                <input type="button" class="btn btn-outline-warning text-light m-2" value='Artists' id="showArtists">
                            </div>
                            <div class="col-3 col-sm-12 d-flex justify-content-center list-group-item">
                                <input type="button" class="btn btn-outline-warning text-light m-2" value='Add Artist' id="addArtist" data-toggle="modal" data-target="#addArtistModal">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9" id="showPanel">
                        <?php include 'showEvents3.php' ?>
                    </div>
                </div>             
            </div>
        </div>
        <!-- backtotop button -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="col-2 col-sm-1 btn btn-success fixed-bottom ms-auto m-4"><i class="fa-solid fa-up-long" style="color: #ffffff;"></i></button>
</div> 

    <script>      
        //sorting
        $(document).on('click','.sortDate', function(){
            var status = 1;
            $.ajax({
                url: 'showEvents3.php',
                method: 'POST',
                data: {status: status}
            })
            .done(function(data){
                $('#showPanel').html(data);
            });
        });
        $(document).on('click','.sortCate', function(){
            var status = 2;
            $.ajax({
                url: 'showEvents3.php',
                method: 'POST',
                data: {status: status}
            })
            .done(function(data){
                $('#showPanel').html(data);
            });
        });
        $(document).on('click','.sortArtist', function(){
            var status = 3;
            $.ajax({
                url: 'showEvents3.php',
                method: 'POST',
                data: {status: status}
            })
            .done(function(data){
                $('#showPanel').html(data);
            });
        });

        //To show events
        $(document).ready(function(){
            $('#showEvents').click(function(){
                $.ajax({
                url: 'showEvents3.php',
                method: 'POST'
            })
            .done(function(data){
                $('#showPanel').html(data);
            });
            });
        });

        //To show artists
        $(document).ready(function(){
            $('#showArtists').click(function(){
                $.ajax({
                url: 'showArtists.php',
                method: 'POST'
            })
            .done(function(data){
                $('#showPanel').html(data);
            });
            });
        });

        //To delete artist
        $(document).on('click','.deleteArtistBtn', function(){
            var delete_id= $(this). attr('id');
            $.ajax({
                    url: 'deleteArtistApi.php',
                    method: 'POST',
                    data: {delete_id: delete_id}
            })
            .done(function(data){
                window.alert(data);
            });
        });

        //To delete event
        $(document).on('click','.deleteBtn', function(){
            var delete_id= $(this). attr('id');
            $.ajax({
                    url: 'deleteEventApi.php',
                    method: 'POST',
                    data: {delete_id: delete_id}
            })
            .done(function(data){
                window.alert(data);
            });
        });

        //Fetching event's info to edit event
        $(document).on('click','.editBtn', function(){
            var edit_id= $(this). attr('id');
            $.ajax({
                      url: 'editEvent.php',
                      method: 'POST',
                      data: {edit_id: edit_id}
                })
                .done(function(data){
                  var retObj = JSON.parse(data);
                  console.log(retObj);
                  
                  var stime = (retObj[0].start_time).split(":");
                  var shr = stime[0];
                  var smin = stime[1];
                  var etime = (retObj[0].end_time).split(":");
                  var ehr = etime[0];
                  var emin = etime[1];
                  <?php
                  require_once 'dbinfo.php';
                    $query = <<<eventSQL
                        SELECT * FROM artist;
                    eventSQL;
                    $result = $conn->query($query);
                    $rows = $result->num_rows;
                    $all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    ?>

                $( function() {
                    $( "#datepicker1" ).datepicker({ minDate: "-1M", maxDate: "+8M" });
                } );   
    
                  var formData='<form class="p-5 bg-dark row g-3 m-2" id="updateForm">';
                  formData+='<div class="row"><div class="col-12 fs-2 text-center text-warning mb-2" id="resultUpdatedEvent"></div></div>';
                  formData+='<h3 class="text-light d-flex justify-content-start">Update Event</h3>';    
                  
                  formData+='<div><label for="eventid" class="form-label text-light">Event ID</label><input type="text" class="form-control" name="eventCode" value="'+retObj[0].code+'" readonly></div>';   

                  formData+='<div class="col-md-6 mb-3"><label for="eCategory" class="form-label mb-2 text-light">Category</label><select id="eCategory" class="form-select" name="eventCate">';
                  formData+='<option value="'+retObj[0].category+'">Choose the category ('+retObj[0].category+')</option><option value="Music">Music</option><option value="Poetry">Poetry</option><option value="Performance">Performance</option></select></div>';   
                  
                  formData+='<div class="col-6 col-md-3 mb-3"><label for="fee" class="form-label mb-2 text-light">Fee</label><input type="number" class="form-control" name="eventFee" value="'+retObj[0].fee+'"></div>';   
                  formData+='<div class="col-6 col-md-3 mb-3"><label for="maxCap" class="form-label mb-2 text-light">Max Capacity</label><input type="number" class="form-control" name="maxCap" value="'+retObj[0].max_cap+'"></div>';
                  
                  formData+='<div class="col-sm-7 mb-3"><label for="eArtist" class="form-label mb-2 text-light">Artist</label><select id="eArtist" class="form-select" name="artistName">';
                  formData+='<option value="'+retObj[0].name+'">Choose the artist ('+retObj[0].name+')</option>';
                  formData+='<?php for($i=0; $i<$rows; $i++){
                    echo "<option>".$all_rows[$i]['name']."</option>";
                    }?>';
                  formData+='</select></div>';

                  formData+='<div class="col-sm-5 mb-3"><label for="eDate" class="form-label mb-2 text-light">Event Date</label><input type="text" class="form-control" id="datepicker1" name="updatedDate" value="'+retObj[0].date+'"></div>';
                  
                  formData+='<div class="col-md-7 mb-3"><label for="sTime" class="form-label mb-2 text-light">Start Time</label><div class="row"><div class="col-5"><div class="input-group">';
                  formData+='<input type="number" class="form-control" name="sHr" value="'+shr+'"><span class="input-group-text">Hr</span></div></div>';
                  formData+='<div class="col-1 d-flex justify-content-center"><label class="form-label mb-2 text-light">:</label></div><div class="col-5"><div class="input-group">';
                  formData+='<input type="number" class="form-control" name="sMin" value="'+smin+'"><span class="input-group-text">Min</span></div></div></div></div> ';
                   
                  formData+='<div class="col-md-7 mb-3"><label for="eTime" class="form-label mb-2 text-light">End Time</label><div class="row"><div class="col-5"><div class="input-group">';
                  formData+='<input type="number" class="form-control" name="eHr" value="'+ehr+'"><span class="input-group-text">Hr</span></div></div>';
                  formData+='<div class="col-1 d-flex justify-content-center"><label class="form-label mb-2 text-light">:</label></div><div class="col-5"><div class="input-group">';
                  formData+='<input type="number" class="form-control" name="eMin" value="'+emin+'"><span class="input-group-text">Min</span></div></div></div></div> ';
                  
                  formData+='<input type="button" class="btn btn-warning" value="Update" id="updateEventBtn">';
                  $("#showPanel").html(formData);

                  //To edit event
                  $('#updateEventBtn').click(function(){
                    var form=$("#updateForm");
                    $.ajax({
                    method: "POST",
                    url: "editEventApi.php",
                    data: form.serialize(),          
                    success : function(data){
                        var msg=data.trim();
                        //if(msg == 'success')
                            $("#resultUpdatedEvent").html(msg);
                        //else
                            //$("#resultUpdatedEvent").html("Error Updating Event.");
                            //window.alert("Error Updating Event");
                            
                    }
                    });
                    });
                })        
        });

        //backtotop button
        let mybutton = document.getElementById("myBtn");
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }
        function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

</script>     

<!-- add artist modal -->
<div class="modal fade" id="addArtistModal" tabindex="-1" role="dialog" aria-labelledby="addArtistModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title text-light">Artist Form</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php include "addArtist.php" ?>
            </div>
        </div>  
    </div>
</div>

<!-- add event modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title text-light">Event Form</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php include "addEvent.php" ?>
            </div>
        </div>                   
    </div>
</div>

</body>
</html>

