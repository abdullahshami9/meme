<?php 
	include('../header/header.php');
  // echo $_SESSION['admin'];comment on 17/12/22
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Home</title>
 	<link rel="stylesheet" href="css/home.css">
 </head>
 <body>
 	
<div>
   <center>
	<button type="button" class="btn btn-info" id="btn-post" style="width:70%;" data-toggle="modal" data-target="#myModal">
  <b>POST</b>
</button>
</center>

<!-- The Modal -->
<div class="modal modal-dialog modal-fullscreen-sm-center" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">POST MEME</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="../post/postmanager.php"> 
          <label style="color:teal;">meme description<input type="text" name="post_description" placeholder="" style="color:teal;width:auto;border:none;border-bottom:1px solid gray;"></label>
        	<label for=""><input name="memejpg" type="file" value="choose a meme" required></label>
        	<br>
         <center>
        	<span><input type="submit" name="post" value="post"></span>
         </center>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
</div>
</div>





<?php 
   require_once("../post/postmanager.php");
  //  print_r($_SESSION['interest_id']);die;
  // $ptMgr->setSortingStrategy(new LatestPostSortingStrategy());
   if ((isset($_SESSION['interest_id']) && !empty($_SESSION['interest_id'])) || (isset($_SESSION['emotions_id']) && !empty($_SESSION['emotions_id']))) {
    # code...
    // Recommendation collaborative filtering, content-based filtering, or hybrid approaches
    $ptMgr->fetch_post($_SESSION['interest_id'],$_SESSION['emotions_id']);
   }
   else {
    $ptMgr->fetch_post();
   }
   // include("../comment/commentManager.php");
 ?>


 </body>
 </html>