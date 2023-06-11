<?php

session_start();

/**
 * Interface for profile updating strategies
 */
interface ProfileUpdateStrategyInterface {
    public function updateProfile($db);
}

/**
 * Concrete strategy class for updating the profile
 */
class DefaultProfileUpdateStrategy implements ProfileUpdateStrategyInterface {
    public function updateProfile($db) {
        if (isset($_POST['updated'])) {
            $qry = "update profile 
                    set 
                    username='" . $_POST['lawn_name'] . "',
                    statuss='" . $_POST['status'] . "',
                    gender='" . $_POST['gender'] . "',
                    mob_contact='" . $_POST['mobile'] . "',
                    phone_contact='" . $_POST['phone'] . "',
                    web_url='" . $_POST['url'] . "',
                    updated_at='" . $_POST['date'] . "',
                    bio='" . $_POST['description-profile'] . "',
                    emotions_id='" . $_POST['emotion'] . "',
                    interest_id='" . $_POST['interest'] . "',
                    latitude='" . $_POST['latitude'] . "',
                    longitude='" . $_POST['longitude'] . "',
                    emotions_id='" . $_SESSION['emotions_id'] . "',
                    interest_id='" . $_SESSION['interest_id'] . "'
                    where id ='" . $_SESSION['profile_id'] . "';";

            try {
            //    print_r($qry);die;
                $db->con->query($qry);
                move_uploaded_file($_FILES['pic']['tmp_name'], "../profile-img/" . $_SESSION['profile_id'] . ".jpg");
                header("location: ../");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}

/**
 * Context class for profile updating
 */
class ProfileUpdater {
    private $updateStrategy;

    public function setUpdateStrategy(ProfileUpdateStrategyInterface $strategy) {
        $this->updateStrategy = $strategy;
    }

    public function updateProfile($db) {
        $this->updateStrategy->updateProfile($db);
    }
}

class editprofile
{
    private $db;
    private $profileUpdater;

    public function __construct($db)
    {
        $this->db = $db;
        $this->profileUpdater = new ProfileUpdater();
    }

    public function update_profile()
    {
        $defaultStrategy = new DefaultProfileUpdateStrategy();
        $this->profileUpdater->setUpdateStrategy($defaultStrategy);
        $this->profileUpdater->updateProfile($this->db);
    }
}


require_once "../../config/config.php";
$Database = Database::getInstance();

// $updater = new ProfileUpdater();
$editPro = new editprofile($Database);
$editPro->update_profile();
// $defaultStrategy = new DefaultProfileUpdateStrategy();
// $updater->setUpdateStrategy($defaultStrategy);
// $updater->updateProfile($Database);




//    session_start();
//    /**
//     * class for maintaining edit profile
//     */
//    class editprofile
//    {
//        /**
//         * summary
//         */
//        private $db;
//        public function __construct($db)
//        {
//            $this->db=$db;
//        }
//    public function update_profile(){
//          if (isset($_POST['updated'])) {
//             // print_r($_POST);die;
//             $qry="update profile 
//                   set 
//                   username='".$_POST['lawn_name']."',
//                   statuss='".$_POST['status']."',
//                   gender='".$_POST['gender']."',
//                   mob_contact='".$_POST['mobile']."',
//                   phone_contact='".$_POST['phone']."',
//                   web_url='".$_POST['url']."',
//                   updated_at='".$_POST['date']."',
//                   bio='".$_POST['description-profile']."',
//                   emotions_id='".$_POST['emotion']."',
//                   interest_id='".$_POST['interest']."',
//                   latitude='".$_POST['latitude']."',
//                   longitude='".$_POST['longitude']."'
//                   where id ='".$_SESSION['profile_id']."';";
//          try {
//             $this->db->con->query($qry);
//               move_uploaded_file($_FILES['pic']['tmp_name'], "../profile-img/".$_SESSION['profile_id'].".jpg");
//             header("location: ../");
//          } catch (Exception $e) {
//             echo $e->getMessage();
//          }
//       }
//    }
// }//class end


//    require_once "../../config/config.php";
//    $Database = Database::getInstance();
//    $editPro=new editprofile($Database);
//    $editPro->update_profile();
 ?>