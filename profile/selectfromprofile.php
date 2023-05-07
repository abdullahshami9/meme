<style>
	h5{
		margin-left: 15%;
	}
	.fa{
		color: gray;
	}
</style>
<?php 
// session_start(); comment cos it already start on header.php which already include on profile/index.php
/**
	 * classs for select data from profile table and include it on profile/index.php
	 */
	// session_start();
	class selectfromProfile{
	    /**
	     * summary
	     */
	    private $db;
	    public $result;

	    public $profile_id;
	    public $capa;
	    public $location;
	    public $mob;
	    public $phone;
	    public $web;
	    public $since;
	    public $description;


	    public function __construct($db)
	    {
	        $this->db=$db;
	    }

	    public function qry(){
	    	$qry="select * from profile where id='".$_SESSION['profile_id']."';";
	    	$this->result=$this->db->con->query($qry);
	    }
	    public function selectprofile()
	    {
	    	$this->qry();
	    	if ($row = $this->result->fetch_assoc()) {
	    		$this->profile_id=	$row['id'];
	    		$this->capa=		$row['capacity'];
	    		$this->mob=			$row['mob_contact'];
	    		$this->phone=		$row['phone_contact'];
	    		$this->location=	$row['location_gmap'];
	    		$this->web=			$row['web_url'];
	    		$this->since=		$row['since'];
	    		$this->description=	$row['description'];
	    	}
	    }

	}
	// require_once"../config/configuration.php";
	// $slt_prof= new selectfromProfile(new db());
	// $slt_prof->selectprofile();	
 ?>