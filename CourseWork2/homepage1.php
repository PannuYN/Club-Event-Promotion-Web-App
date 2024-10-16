<?php 
    session_start();
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
        <div class="row">
          <!-- nav bar -->
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <!-- logo -->
                <a class="navbar-brand" href="homepage1.php"><img src="Images/logo4.png" width=44 height=40></a>
                <!-- dropdown menu for responsiveness -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fa-2xl" style="color: #ffffff;"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="homepage1.php">Upcoming Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pastEventsPage.php">Past Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="artistPage.php">Artists</a>
                        </li>
                        <li class="nav-item">
                            <!-- session check -->
                            <?php
                                if(isset($_SESSION['email'])){
                                    echo <<<sess
                                    <a class="nav-link" href="adminHomepage1.php">Admin Dashboard</a>
                                    sess;
                                }
                                else{
                                    echo <<<nosess
                                    <a class="nav-link" href="#loginModal" data-toggle="modal" data-target="#loginModal">Login</a>
                                    nosess;
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
          </nav>
        </div>

        <!-- Text block -->
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-sm-8 mt-5" id="wordSession">
                <h1 class="display-1 text-center text-dark opacity-20">Welcome to</h1>
                <h1 class="display-1 text-center text-dark">Sam's Club</h1>
                <br><br>
                <p class="text-center text-dark">
                    At this club, we have so many entertaining events at night.<br>
                    <span>Solo artists</span>, <span>bands</span>, and even talk shows with famous <span>comedians</span>.<br>
                    Feel free to check the upcoming and past events held at our place.
                </p>
            </div>
        </div>

        <!-- Event contents -->
        <div class="row d-flex justify-content-center">
            <div class="col-11 d-flex justify-content-center bg-dark mt-4">
                <div class="row mt-3">                  
                    <div id="showPanel"><?php include 'showUpcomingEvents.php'; ?></div>
                </div>
            </div>
        </div>
        <!-- back to top button -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="col-2 col-sm-1 btn btn-success fixed-bottom ms-auto m-4 p-2"><i class="fa-solid fa-up-long" style="color: #ffffff;"></i></button>
    </div>

    <!-- login modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-light">Login Form</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <?php include "loginForm.php" ?>
                </div>
            </div>  
        </div>
    </div>

    <script>
        //sorting
        $(document).on('click','.sortDateUser', function(){
            var status = 1;
            $.ajax({
                url: 'showUpcomingEvents.php',
                method: 'POST',
                data: {status: status}
            })
            .done(function(data){
                $('#showPanel').html(data);
            });
        });
        $(document).on('click','.sortCateUser', function(){
            var status = 2;
            $.ajax({
                url: 'showUpcomingEvents.php',
                method: 'POST',
                data: {status: status}
            })
            .done(function(data){
                $('#showPanel').html(data);
            });
        });
        $(document).on('click','.sortArtistUser', function(){
            var status = 3;
            $.ajax({
                url: 'showUpcomingEvents.php',
                method: 'POST',
                data: {status: status}
            })
            .done(function(data){
                $('#showPanel').html(data);
            });
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
  </body>
</html>