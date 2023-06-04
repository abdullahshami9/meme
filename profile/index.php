<?php 
   // error_reporting(0);
	include('../header/header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>profile</title>
</head>
<body>


<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div id="content" class="content content-full-width">
            <!-- begin profile -->
            <div class="profile">
               <div class="profile-header">
                  <!-- BEGIN profile-header-cover -->
                  <div class="profile-header-cover"></div>
                  <!-- END profile-header-cover -->
                  <!-- BEGIN profile-header-content -->
                  <div ticlass="profile-header-content">
                     <!-- BEGIN profile-header-img -->
                     <div class="profile-header-img">
                        <?php echo "<img src='profile-img/".$_SESSION['profile_id'].".jpg' alt=''>"; ?>
                     </div>
                     <!-- END profile-header-img -->
                     <!-- BEGIN profile-header-info -->
                     <div class="profile-header-info">
                        <h4 class="m-t-10 m-b-5">
                           <?php 
                           echo $_SESSION['name'];//modified 1/01/2023  
                            ?>
                        </h4>
                        <p class="m-b-10">UXUI + Frontend Developer</p>
                        <a href="editprofile/" class="btn btn-sm btn-info mb-2">Edit Profile</a>
                     </div>
                     <!-- END profile-header-info -->
                  </div>
                  <!-- END profile-header-content -->
                  <!-- BEGIN profile-header-tab -->
                  <ul class="profile-header-tab nav nav-tabs">
                     <li class="nav-item"><a href="https://www.bootdey.com/snippets/view/bs4-profile-with-timeline-posts" target="__blank" class="nav-link_">POSTS</a></li>
                     <li class="nav-item"><a href="https://www.bootdey.com/snippets/view/bs4-profile-about" target="__blank" class="nav-link_">ABOUT</a></li>
                     <li class="nav-item"><a href="https://www.bootdey.com/snippets/view/profile-photos" target="__blank" class="nav-link_">PHOTOS</a></li>
                     <li class="nav-item"><a href="https://www.bootdey.com/snippets/view/profile-videos" target="__blank" class="nav-link_">VIDEOS</a></li>
                     <li class="nav-item"><a href="https://www.bootdey.com/snippets/view/bs4-profile-friend-list" target="__blank" class="nav-link_ active show">FRIENDS</a></li>
                  </ul>
                  <!-- END profile-header-tab -->
               </div>
            </div>
            <!-- end profile -->
            <!-- begin profile-content -->
            <div class="profile-content">
               <?php 
   include"profileManager.php";
   ?>
            </div>
            <!-- end profile-content -->
         </div>
      </div>
   </div>
</div>
	
</body>
</html>