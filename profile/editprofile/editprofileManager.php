<?php 
   session_start();
   /**
    * class for maintaining edit profile
    */
   class editprofile
   {
       /**
        * summary
        */
       private $db;
       public function __construct($db)
       {
           $this->db=$db;
       }
   public function update_profile(){
         if (isset($_POST['updated'])) {
            $qry="update profile 
                  set 
                  username='".$_POST['lawn_name']."',
                  statuss='".$_POST['status']."',
                  gender='".$_POST['gender']."',
                  mob_contact='".$_POST['mobile']."',
                  phone_contact='".$_POST['phone']."',
                  web_url='".$_POST['url']."',
                  updated_at='".$_POST['date']."',
                  bio='".$_POST['description-profile']."',
                  latitude='".$_POST['latitude']."',
                  longitude='".$_POST['longitude']."'
                  where id ='".$_SESSION['profile_id']."';";
         try {
            $this->db->con->query($qry);
              move_uploaded_file($_FILES['pic']['tmp_name'], "../profile-img/".$_SESSION['profile_id'].".jpg");
            header("location: ../");
         } catch (Exception $e) {
            echo $e->getMessage();
         }
      }
   }
}//class end

   require_once "../../config/config.php";
   $editPro=new editprofile(new Database());
   $editPro->update_profile();
 ?>