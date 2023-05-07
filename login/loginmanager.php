<?php 
session_start();

class LoginManager{


    private $db;
    function __construct($db)
    {
        $this->db=$db;
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
                if ($_SESSION['admin']==0) {
               		 header("location: ../home/");                	
                }
                elseif ($_SESSION['admin']==1) {
                	header("location: ../admin/");
            			}
       		 }
       		 else {
       		 	echo "<script>
					alert('user name or password is incorrect');
       		 	</script>";
       		 	header("location: ../login");
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
			}
    }

require_once "../config/config.php";
$logMgr = new LoginManager(new Database());
$logMgr->authenticate();
?>