<?php 
// session_start();
	/**
	 * is able to decide what profile can does
	 */
	include"../config/config.php";
	class profileManager extends Database
	{
	    /**
	     * By the property of extends we can use $this->con directly without passing through db instance on profileManager contructor as traditional manner
	     */
	    private $name;
	    private $status;
	    private $fullname;
	    private $bio;

	    // public function __construct()
	    // {
	    //     echo $this->con;
	    // }

	    public function select_data_from_profile(){
	    	$query = "select username,statuss,fullname,bio from profile where reg_id_fk = '". $_SESSION['profile_id'] ."';";
	    	$result = $this->con->query($query);
	    	if ($row=$result->fetch_assoc()) {
	    		$this->name = $row['username'];
	    		$this->fullname=$row['fullname'];
	    		$this->status=$row['statuss'];
	    		$this->bio = $row['bio'];
	    	}//if select from row ends
	    	else {
	    		echo 'error in fetching data from db profile table';
	    	}

	    }//select_data_from_profile ends

	    // public function assign_selected_data_to_variable_from_profile(){

	    // }//func ends
	    
	    public function select_profile_post_from_post(){
	    	//select from post folder according to profile

	    }// select_profile_post_from_post ends
	    public function delete_profile_post_from_post(){

	    }//delete_profile_post_from_post ends

	}//class profileManager ends
	// $profile_Manager = new profileManager();
	// $profile_Manager->select_data_from_profile();

 ?>