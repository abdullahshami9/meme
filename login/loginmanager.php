<?php 
session_start();


// Define the AuthenticationStateInterface
interface AuthenticationStateInterface {
    public function authenticate(LoginManager $loginManager);
}

// Implement the LoggedInState class
class LoggedInState implements AuthenticationStateInterface {
    public function authenticate(LoginManager $loginManager) {
        if ($loginManager->isAdmin()) {
            header("location: ../admin/");
        } else {
            header("location: ../home/");
        }
    }
}

// Implement the LoggedOutState class
class LoggedOutState implements AuthenticationStateInterface {
    public function authenticate(LoginManager $loginManager) {
		header("location: ../login");
        echo "<script>alert('Username or password is incorrect');</script>";
    }
}

class LoginManager{


    private $db;
	private $state;
    function __construct($db)
    {
        $this->db=$db;
		$this->state = new LoggedOutState();
    }

    public function authenticate()
    {
        if (isset($_POST['login'])) {

            $signin_qry = "select r.email,r.agree,r.id,r.admin,p.id as profile_id,p.username,p.fullname from register r,profile p where email = '" . $_POST['new_email'] . "' and pass = '" . $_POST['new_pass'] . "'  and r.id=p.reg_id_fk; ";
            $result = $this->db->con->query($signin_qry);
            if ($row = $result->fetch_assoc())
             {
             	$_SESSION['reg_id']=$row['id'];
                $_SESSION['log'] = 1;
                $_SESSION['email'] = $row['email'];
                $_SESSION['agree'] = $row['agree'];
                $_SESSION['admin']=$row['admin'];
                $_SESSION['profile_id'] = $row['profile_id'];
                $_SESSION['name'] = $row['username'];
                if ($this->isAdmin()) {
                    $this->setState(new LoggedInState());
                } else {
                    $this->setState(new LoggedInState());
                }
       		}
       		 else {
                $this->setState(new LoggedOutState());
            }
       	}
			if (isset($_POST['submit'])) {

				$register_qry = "insert into register(id,email,pass,agree) values(null,  '".$_POST['email']."','".$_POST['pass']."', '".$_POST['check']."');";
				//insert_id will return the student id (primary key) of the last inserted data.
					if ($this->db->con->query($register_qry)) {
						$profile_qry="insert into profile(id,reg_id_fk,bio,dob,prof_make_time,gender,statuss,fullname,username) values(null,'".$this->db->con->insert_id."',null,null,null,null,null,'".$_POST['fullname']."','".$_POST['username']."');";
						if ($this->db->con->query($profile_qry)) {

							$signin_qry="select r.email,r.agree,r.id,p.id as profile_id,p.username,p.fullname from register r,profile p where email = '".$_POST['email']."' and pass = '".$_POST['pass']."'  and r.id=p.reg_id_fk; ";
							$result = $this->db->con->query($signin_qry);
							if ($row = $result->fetch_assoc()) {
								$_SESSION['log']=1;
								$_SESSION['email']=$row['email'];
								$_SESSION['agree']=$row['agree'];
								$_SESSION['name']=$row['username'];
								$_SESSION['fullname']=$row['fullname'];
								$_SESSION['profile_id']=$row['profile_id'];
								header("location: ../home/");
							}
						}
					}
					else{
						echo 'error caused';
					}
			}
			// Call the authenticate() method on the current state
			$this->state->authenticate($this);
		}

		public function isAdmin() {
			// Check if the user is an admin
			return $_SESSION['admin'] == 1;
		}
	
		public function setState(AuthenticationStateInterface $state) {
			$this->state = $state;
		}
    }

require_once "../config/config.php";
$Database = Database::getInstance();
$logMgr = new LoginManager($Database);
$logMgr->authenticate();
?>