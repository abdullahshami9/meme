<?php 
   session_start();
   require_once "../selectfromprofile.php";
   require_once "../../config/config.php";
   class assignExtract{
      public $m_cont;
      public $p_cont;
      public $latitude;
      public $longitude;
      public $descp;
      public $url;
      public $since;
      public $slt_prof;

      public function __construct(){
         $Database = Database::getInstance();
         $this->slt_prof=new selectfromProfile($Database);
         $this->slt_prof->qry();
   }
   public function assign(){

      try {
         $row=$this->slt_prof->result->fetch_assoc();
         $this->m_cont=$row['mob_contact'];
         $this->p_cont=$row['phone_contact'];
         $this->latitude=$row['latitude'];
         $this->longitude=$row['longitude'];
         $this->descp=$row['bio'];
         $this->url=$row['web_url'];
         $this->since=$row['updated_at'];


      } catch (Exception $e) {
         echo $e->getMessage();
      }
   }//fun assign end

   }//class assignExtract Ends

//Raw Code
   $assg = new assignExtract();
   $assg->assign();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/geolocator/2.1.5/geolocator.js.map">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/geolocator/2.1.5/geolocator.min.js.map">

  <link rel="stylesheet" href="css/profile.css">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
   input{
      border: none;
      border-bottom: 1px solid lightgray;
      user-select: none;
   }
</style>
<body onload="getLocation();">

<div class="container">
    <div class="row">
        <div class="col-md-12">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="row">
      <div class="col-md-12 col-sm-6">
         <div id="content" class="content content-full-width">
            <!-- begin profile -->
            <div class="profile">
               <div class="profile-header">
                  <!-- BEGIN profile-header-cover -->
                  <div class="profile-header-cover"></div>
                  <!-- END profile-header-cover -->
                  <!-- BEGIN profile-header-content -->
                  <div class="profile-header-content">
                     <!-- BEGIN profile-header-img -->
                     <div class="profile-header-img">
                        <?php echo "<img src='../profile-img/".$_SESSION['profile_id'].".jpg' alt='' style='width:100px;'>";?>
                     </div>
                     <!-- END profile-header-img -->
                     <!-- BEGIN profile-header-info -->
                     <div class="profile-header-info">
                        <h4 class="m-t-10 m-b-5"><?php echo $_SESSION['name']; ?></h4>
                        <p class="m-b-10">Change profile picture</p>

                     </div>
                     <!-- END profile-header-info -->
                  </div>
                
                  <!-- END profile-header-tab -->
               </div>
            </div>
            <!-- end profile -->
            <!-- begin profile-content -->
            <div class="profile-content">
               <!-- begin tab-content -->
               <div class="tab-content p-0">
               <form class="myForm" action="editprofileManager.php" method="POST" enctype="multipart/form-data">
                  <!-- begin #profile-about tab -->
                  <div class="tab-pane fade in active show" id="profile-about">
                     <!-- begin table -->
                     <div class="table-responsive">
                        <input type="file" name="pic">
                        <table class="table table-profile">
                           <thead>
                              <tr>
                                 <th></th>
                                 <th>
                                    <h4>Micheal    Meyer <small>Lorraine Stokes</small></h4>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                           <input type="hidden" name="status">
                           <input type="hidden" name="gender">
                              
                              <tr>
                                 <td class="field disable">Lawn Name: </td>
                                 <td><i class="fa fa-home fa-lg m-r-5"></i><input type="contact" placeholder="" name="lawn_name" value="<?php echo $_SESSION['name']; ?>"></td>

                              </tr>
                              <tr class="divider">
                                 <td colspan="2"></td>
                              </tr>
                              <tr>
                                 <td class="field">Mobile</td>
                                 <td><i class="fa fa-mobile fa-lg m-r-5"></i><input type="contact" placeholder="+92-(xxx)- xxx-xxxx" name="mobile" value="<?php echo $assg->m_cont; ?>"></td>
                              </tr>
                              <tr>
                                 <td class="field">Office</td>
                                 <td><i class="fa fa-phone fa-lg m-r-5" style="color:green;"></i><input type="contact" placeholder="+92-(xxx)- xxx-xxxx" name="phone" value="<?php echo $assg->p_cont; ?>"></td>
                              </tr>
                              <tr class="divider">
                                 <td colspan="2"></td>
                              </tr>
                              <tr class="highlight">
                                 <td class="field">About Me<i class="fa fa-profile fa-lg m-r-5"></i></td>
                                 <td><textarea name="description-profile" id="" cols="120" rows="3" style="border:1px lightgrey solid;border-radius:5px;" placeholder="Enter Description about Marriage lawn" id="textarea"> <?php echo $assg->descp; ?></textarea></td>
                              </tr>
                              <tr class="divider">
                                 <td colspan="2"></td>
                              </tr>
                              <!-- <tr>
                                 <td class="field">Country/Region</td>
                                 <td>
                                   <i class="fa fa-map-marker fa-lg m-r-5" style="color:red;"></i><input type="text" name="g_location" value="<?php echo $assg->address; ?>">
                                 </td>
                              </tr> -->
                              
                              <tr>
                                 <td class="field">State</td>
                                 <td><select name="state" id="">
                                    <option value="sindh" selected="">SINDH</option>
                                    <option value="balochistan">Balochistan</option>
                                    <option value="kpk">Khyber Pakhtoon Khaw</option>
                                    <option value="punjab">Punjab</option>
                                    <option value="baltistan">Gilgit Baltistan</option>
                                 </select></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td class="field">Interest</td>
                                 <td><select name="interest" id="">
                                    <option value="" >-select-</option>
                                    <option value="1" >cricket</option>
                                    <option value="2">stydy</option>
                                    <option value="3">programming</option>
                                    <option value="4">logical</option>
                                    <option value="5">social</option>
                                 </select></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td class="field">Emotions</td>
                                 <td><select name="emotion" id="">
                                    <option value="1">-select<option>
                                    <option value="2">joy<option>
                                    <option value="3">anger<option>
                                    <option value="4">sadness<option>
                                    <option value="5">surprise<option>
                                    
                                 </select></td>
                              </tr>
                              <tr>
                                 <tr>
                                 <td class="field">City</td>
                                 <td><select name="city" id="">
                                    <option value="kar" selected="">Karachi</option>
                                    <option value="isl" selected="">Islamabad</option>
                                    <option value="lahore" selected="">lahore</option>
                                    <option value="faisalabad" selected="">faisalabad</option>
                                    <option value="sialkot" selected="">sialkot</option>
                                 </select></td>
                              </tr>
                                 <td class="field">Website</td>
                                 <td><input type="link" name="url" value="<?php echo $assg->url; ?>"></td>
                              </tr>
                             </tr>
                                 <td class="field">Capacity</td>
                                 <td><input type="number" name="capacity" value="<?php echo $assg->capa; ?>"></td>
                              </tr>
                              <tr>
                                 <td class="field">Since</td>
                                 <td>
                                  <input type="date" name="date" value="<?php echo $assg->since; ?>">
                                 </td>
                              </tr>
                              <tr>
                                 <tr class="field">latitude</tr>
                                 <input type="text" name="latitude" value="">
                              </tr>
                              <tr>
                                 <tr class="field">longitude</tr>
                                 <input type="text" name="longitude" value="">
                              </tr>
                              <tr class="divider">
                                 <td colspan="2"></td>
                              </tr>
                              <tr class="highlight">
                                 <td class="field">&nbsp;</td>
                                 <td class="p-t-10 p-b-10">
                                    <button type="submit" name="updated" class="btn btn-primary"class="btn btn-primary width-150">UPDATED</button>
                                    <button type="submit" class="btn btn-white btn-white-without-border width-100 m-l-5">CANCEL</button>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <!-- end table -->

                  </div>
                  <!-- end #profile-about tab -->
                  </form>
               </div>
               <!-- end tab-content -->
            </div>
            <!-- end profile-content -->
         </div>
      </div>
   </div>
</div>
      </div>
   </div>
</div>
</body>
</html>

<script>
   function getLocation(){
      if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition,showError);
      }
   }
   function showPosition(position){
      document.querySelector('.myForm input[name= "latitude"]').value = position.coords.latitude;
      document.querySelector('.myForm input[name= "longitude"]').value = position.coords.longitude;
   }
   function showError(error){
      switch(error.code){
      case error.PERMISSION_DENIED:
         alert("you must allow the geolocation to fill this form");
         // location.reload();
         break;
      }
   }
</script>

