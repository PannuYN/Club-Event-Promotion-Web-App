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
    <link rel="stylesheet" href="stylistic.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18db659ebc.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  </head>
<body>

<!-- New event form -->
<form>
  <div class="form-group">
    <div class="row">
      <!-- div to show result -->
      <div class="col-12 fs-2 text-center text-warning mb-2" id="resultEvent">
        
      </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="eCategory" class="form-label mb-2 text-light">Category</label>
      <select id="eCategory" class="form-select" name="cate" required>
       <option value="Music">Music</option>
       <option value="Poetry">Poetry</option>
       <option value="Performance">Performance</option>
      </select>
    </div>
    <div class="col-6 col-md-3 mb-3">
      <label for="fee" class="form-label mb-2 text-light">Fee</label>
      <input type="number" class="form-control" id="fee" required>
    </div>
    <div class="col-6 col-md-3 mb-3">
      <label for="maxCap" class="form-label mb-2 text-light">Max Capacity</label>
      <input type="number" class="form-control" id="maxCap">
    </div>
  </div>
    <div class="row">
    <div class="col-sm-4 mb-3">
      <label for="eArtist" class="form-label mb-2 text-light">Artist</label>
      <select id="eArtist" class="form-select">
      <!-- show artist names to choose -->
      <?php 
        require_once 'dbinfo.php';
        $query = <<<eventSQL
                    SELECT * FROM artist;
                  eventSQL;
        $result = $conn->query($query);
        $rows = $result->num_rows;
        $all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        for($i=0; $i<$rows; $i++){
          echo "<option>".$all_rows[$i]['name']."</option>";
        }
      ?>
     </select>
    </div>
    <div class="col-sm-6 mb-3">
      <label for="eDate" class="form-label mb-2 text-light">Date</label>
      <input type="text" class="form-control" id="datepicker" required>
    </div>
  </div>
    <div class="col-md-7 mb-3">
      <label for="sTime" class="form-label mb-2 text-light">Start Time</label>
      <div class="row">
        <div class="col-5"><div class="input-group">
          <input type="number" class="form-control" id="sHr" placeholder="00" value="00" required>
          <span class="input-group-text">Hr</span>
        </div></div>
        <div class="col-1 d-flex justify-content-center"><label class="form-label mb-2 text-light">:</label></div>
        <div class="col-6"><div class="input-group">
          <input type="number" class="form-control" id="sMin" placeholder="00" value="00">
          <span class="input-group-text">Min</span>
        </div></div>
      </div>
    </div>
    <div class="col-md-7 mb-3">
      <label for="eTime" class="form-label mb-2 text-light">End Time</label>
      <div class="row">
        <div class="col-5"><div class="input-group">
          <input type="number" class="form-control" id="eHr" placeholder="00" value="00" required>
          <span class="input-group-text">Hr</span>
        </div></div>
        <div class="col-1 d-flex justify-content-center"><label class="form-label mb-2 text-light">:</label></div>
        <div class="col-6"><div class="input-group">
          <input type="number" class="form-control" id="eMin" placeholder="00" value="00">
          <span class="input-group-text">Min</span>
        </div></div>
      </div>
    </div>
  <input type="button" class="btn btn-warning" value='Add' id="addEventBtn">
</form>

<script>

  //datepicker
  $( function() {
    $( "#datepicker" ).datepicker({ minDate: "-1M", maxDate: "+8M" });
  } );

  //To add event
  $(document).ready(function(){
  $('#addEventBtn').click(function(){
    var category=$('#eCategory').val();
    var fee=$('#fee').val();
    var maxCap=$('#maxCap').val();
    var artist=$('#eArtist').val();
    var date=$('#datepicker').val();
    var shr=$('#sHr').val();
    var smin=$('#sMin').val();
    var ehr=$('#eHr').val();
    var emin=$('#eMin').val();
    $.ajax({
        method: "POST",
        url: "addEventApi.php",
        data: {Category:category, Fee:fee, MaxCap:maxCap, Artist:artist, Date:date, sHr:shr, sMin:smin, eHr:ehr, eMin:emin}
    })
    .done(function( msg ) {
	  //var retObj = JSON.parse(msg);
	  $('#resultEvent').html(msg);
	  });
  });
  });
</script>
</body>
</html>