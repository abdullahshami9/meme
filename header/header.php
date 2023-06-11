<?php 
  session_start();
  if ($_SESSION['log']==1) {
    $email=$_SESSION['email'];
  }
  else {
    header("location: ../login/");
  }
  try{
    include('../config/config.php');
  }catch(Exception $e){
    echo 'do nothing';
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <title>profile</title> -->
  <link rel="icon" href="images/logo3.jpeg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="css/profile.css"> -->
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<style>
	nav{
		height: 40px !important;
		font-size: 14px;
		/* word-spacing: 20px; */
	}
  ::-webkit-scrollbar{
    height: 100vh;
    width: 12px;
    background-color: #f5f5f5;
}
::-webkit-scrollbar-track{
    height: 100vh;
    width: 12px;
    background-color: #f5f5f5;
}
::-webkit-scrollbar-thumb{
    width: 12px;
    background-image: linear-gradient(transparent,teal);
    border-radius: 25px;
}
::-webkit-scrollbar-thumb:hover,::-webkit-scrollbar-thumb:active{
    width: 12px ;
    border-radius: 25px;
    background-image: linear-gradient(transparent,black);
    cursor: grabbing;
}
  @media screen and (min-width: 500px) {
    nav{
    height: auto;
    font-size: 14px;
    /* word-spacing: 20px; */
  }
  }
	li{
		margin-right: 20px;
	}
	@media screen and (max-width: 991px) {
		nav{
			height: 45px;
		}
	}
  #search-box{
    margin-left: 30vw;
    border-radius: 15px; 
    border: none;
    width: 20vw; 
    border-right: 1px magenta solid;
    border-left: 1px magenta solid; */
     height: 30px;
  }
</style>
<body>
	
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="../header/images/logo3.jpeg" width="40px" style="padding-left: 10px;height: -webkit-fill-available;" alt=""></a>
  <button class="navbar-toggler" style="color:magenta;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- <center>
      <div> -->
        <input type="search" id="search-box" class="search center" placeholder="Search...">
        <div id="suggestions" style="z-index:1;border-radius:15px;border:solid magenta 1px;"></div>
      <!-- </div>
    </center> -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../home/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../profile/">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="text-warning">D</span><span class="text-dark">i</span><span class="text-primary">s</span><span class="text-success">c</span><span class="text-secondary">o</span><span class="text-danger">v</span><span class="text-info">e</span>r
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="word-spacing:-20px;">
          <a class="dropdown-item" href="../trending/">Trending</a>
          <a class="dropdown-item" href="../trending/show_visited_profile.php">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout/logout.php">logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"><?php echo"$email"; ?></a>
      </li>
    </ul>
    
  </div>
</nav>

</body>
</html>

<script>

$('#search-box').on('change keyup', function() {
  var value = $(this).val();
  $.ajax({
    url: '../header/search_ajax.php',
    type: 'POST',
    data: { value },
    success: function(response) {
      // Parse the JSON response into an array of objects
      console.log(response);
      var results = JSON.parse(response);

      // Clear previous suggestions
      $('#suggestions').empty();

      // Iterate over the results and append suggestions to the suggestions div
      for (var i = 0; i < results.length; i++) {
        var id = results[i].id;
        var suggestion = results[i].fullname;
        $('#suggestions').append('<div style="background-color: white; z-index: +1;" class="suggestion"><a href="../profile/index.php?id=' + id + '">' + suggestion + '</a></div>');

      }
    },
    error: function(xhr, status, error) {
      // Handle any errors that occur during the Ajax request
      console.log('Error:', error);
    }
  });
});



</script>