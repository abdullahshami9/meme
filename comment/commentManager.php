<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
class commentManager{

	// private $post_id;
	private $db;
	function __construct($db){
		$this->db=$db;
	}//constructor ends
		public function create_comment(){
			// $this->post_id = $meme_id;
			if (isset($_GET['comment'])) {
				$qry_com="INSERT INTO `comments` (`id`, `post_id_fk`, `description`, `times`, `dates`, `allow`, `profile_id_fk`) VALUES (NULL, ".$_GET['id'].", '".$_GET['comment_description']."', NULL, NULL, 1, ".$_SESSION['profile_id'].");";
	    			$this->db->con->query($qry_com);
			
				// try {
					

				// } catch (Exception $e) {
				// 	$e->getMessage();					
				// }
	  		
		}//if ends
	}//create_comment ends
		public function fetch_comment()
		{
			
		}
}//class ends
require_once "../config/config.php";
$commMrg = new commentManager(new Database());
$commMrg->create_comment();
if (isset($_GET['comment'])) {
	unset($_GET['comment']);
	header("location: ../home/");
}

?>