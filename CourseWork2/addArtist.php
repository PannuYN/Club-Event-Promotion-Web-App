<?php
    if(session_id() == "")
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18db659ebc.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
<body>

<!-- New artist form -->
<form enctype="multipart/form-data">
  <div class="form-group">
    <div class="row">
      <!-- div to show result -->
      <div class="col-12 fs-2 text-center text-warning mb-2" id="resultAddArtist">
        
      </div>
    </div>
    <div class="row">
    <div class="col-12 mb-3">
      <label for="artistName" class="form-label mb-2 text-light">Artist's name</label>
      <input type="text" class="form-control" id="artistName">
    </div>
    </div>
    <div class="row">
    <div class="col-12 mb-3">
      <label for="artistBio" class="form-label mb-2 text-light">Artist's biography</label>
      <textarea class="form-control" id="artistBio" placeholder="Only a few sentences"></textarea>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-8 mb-3">
      <label for="artistType" class="form-label mb-2 text-light">Type</label>
      <select id="artistType" class="form-select">
       <option value="Solo Artist" selected>Solo Artist</option>
       <option value="Band">Band</option>
       <option value="Solo Comedian">Solo Comedian</option>
     </select>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-8 mb-3">
        <label for="fb" class="form-label mb-2 text-light">Facebook</label>
        <input type="text" class="form-control" id="fb">
        <label for="twt" class="form-label mb-2 text-light">Twitter</label>
        <input type="text" class="form-control" id="twt">
        <label for="ig" class="form-label mb-2 text-light">Instagram</label>
        <input type="text" class="form-control" id="ig">
      </div>
    </div>
    <div class="row">
    <div class="col-12 mb-3">
      <label for="artistImage" class="form-label mb-2 text-light">Artist's image</label>
      <input type="file" class="form-control" id="artistImage" name="image">
    </div>
    </div>
  </div>
  <input type="button" class="btn btn-warning" value='Add' id="addArtistBtn">
</form>


<script>
  //To add new artist
  $(document).ready(function(){
    $('#addArtistBtn').click(function(){
      var name=$('#artistName').val();
      var bio=$('#artistBio').val();
      var type=$('#artistType').val();
      var fb=$('#fb').val();
      var twt=$('#twt').val();
      var ig=$('#ig').val();
      //var image=$('#artistImage').val();
      const file = $('#artistImage')[0].files[0];
      const formData = new FormData();

      formData.append('Name', name);
      formData.append('Bio', bio);
      formData.append('Type', type);
      formData.append('Fb', fb);
      formData.append('Twt', twt);
      formData.append('Ig', ig);
      formData.append('Image', file);
      $.ajax({
        method: "POST",
        url: "addArtistApi.php",
        data: formData,
        processData: false,
        contentType: false
      })
      .done(function( msg ) {  
        $('#resultAddArtist').html(msg);
        //var retObj = JSON.parse(msg);
        
      });
    });
  });
</script>
</body>
</html>