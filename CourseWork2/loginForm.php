<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="stylistic.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18db659ebc.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body>
  <form class="bg-transparent">
    <div class="form-group">
    <div class="row">
      <!-- div to show result -->
      <div class="col-12 fs-2 text-center text-danger mb-2" id="resultLogin">
        
      </div>
    </div>
      <div class="col">
        <label class="text-light mb-2" for="loginEmail">Email address</label>
        <input type="email" class="form-control mb-3" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="col">
        <label class="text-light mb-2" for="loginPassword">Password</label>
        <input type="password" class="form-control mb-3" id="loginPassword" placeholder="Password">
      </div>
      <input type="button" class="btn btn-warning" value='Submit' id="loginbtn">
    </div>
  </form>  
  
  <script>
    //For login
    $(document).ready(function(){
    $('#loginbtn').click(function(){
    var email=$('#loginEmail').val();
    var password=$('#loginPassword').val();
    var role=$('input[name=role]:checked').attr('id');
    $.ajax({
        method: "POST",
        url: "login.php",
        data: {Email:email,Password:password}
    })
    .done(function( msg ) {
	  var retObj = JSON.parse(msg);
    if(retObj.status == 1)
      window.location.href = "http://localhost/Coursework2/adminHomepage1.php";
    else
	    $('#resultLogin').html("Invalid Login");
	});
  });
  });
</script>
</body>
</html>
