<?php 
// session_start();
	/**
	 * is able to decide what profile can does
	 */
	class ProfileManagerProxy extends profileManager {
		private $realProfileManager;
		private $loaded;//boolean
	
		public function __construct($db) {
			parent::__construct($db);
			$this->loaded = false;
		}
	
		private function lazyLoad() {
			if (!$this->loaded) {
				$Database = Database::getInstance();
				$this->realProfileManager = new profileManager($Database);
				$this->loaded = true;
			}
		}
	
		public function fetch_post_2() {
			$this->lazyLoad();
			$this->realProfileManager->fetch_post_2();
		}
	
		public function delete_profile_post_from_post() {
			$this->lazyLoad();
			$this->realProfileManager->delete_profile_post_from_post();
		}
	
		// Override other methods from the profileManager class if necessary
	}
	


	class profileManager
	{
	    /**
	     * By the property of extends we can use $this->con directly without passing through db instance on profileManager contructor as traditional manner
	     */
	    private $name;
	    private $status;
	    private $fullname;
	    private $bio;
		 private $db;

	    public function __construct($db)
	    {
	        $this->db = $db;
	    }

	    // public function select_data_from_profile(){
	    // 	$query = "select username,statuss,fullname,bio from profile where reg_id_fk = '". $_SESSION['profile_id'] ."';";
	    // 	$result = $this->db->con->query($query);
	    // 	if ($row=$result->fetch_assoc()) {
	    // 		$this->name = $row['username'];
	    // 		$this->fullname=$row['fullname'];
	    // 		$this->status=$row['statuss'];
	    // 		$this->bio = $row['bio'];
	    // 	}//if select from row ends
	    // 	else {
	    // 		echo 'error in fetching data from db profile table';
	    // 	}

	    // }//select_data_from_profile ends

	    // public function assign_selected_data_to_variable_from_profile(){

	    // }//func ends
	    
	    public function fetch_post_2(){

			$qry="select p.id, p.description, p.times, p.dates, pro.username, pro.id as profile_id from post p, profile pro where pro.id = p.prof_id_fk and pro.id = '". $_SESSION['profile_id'] ."' order by p.id desc;";


         $result = $this->db->con->query($qry);
         //code comment
         include"../comment/commentManager.php";
         // include"../comment/showcomment.php";
         
         while($row = $result->fetch_assoc())
         {
            $post_date=$row['dates'];
            $post_time=$row['times'];
            $description=$row['description'];
            $meme_fetch_id=$row['id'];
            $this->meme_id=$meme_fetch_id;
            //post id for passing it as a parameter for comment
            $username=$row['username'];
            $pf_id=$row['profile_id'];
            echo ' <!-- begin profile-content -->';
                  echo  '<div class="profile-content">';
                        echo '<!-- begin tab-content -->';
                        
                        echo '<div class="tab-content p-0">';
                        
                        echo '<!-- begin #profile-post tab -->';
                           echo '<div class="tab-pane fade active show" id="profile-post">';
                              echo '<!-- begin timeline -->';
                              echo '<ul class="timeline">';
                                 
                              echo '<li>
                                    <!-- begin timeline-time -->
                                    <div class="timeline-time">';

                                    echo   "<span class='date'>$post_date</span>";
                                       echo "<span class='time'>$post_time</span>
                                    </div>
                                 ";

                                    echo '<div class="timeline-icon">
                                       <a href="javascript:;">&nbsp;</a>
                                    </div>
                                    <!-- end timeline-icon -->
                                    <!-- begin timeline-body -->
                                    <div class="timeline-body">';

                                    echo '<div class="timeline-header">';
                                    echo '<span class="userimage"><img src="../profile/profile-img/'.$row['profile_id'].'.jpg"></span>';
                                          // echo '<span class='userimage'><img src="profileimg/'.$row['profile_id'].'.jpg"></span>';
                                          echo "<span class='username'><a href='javascript:;'>$username</a> <small></small></span>";
                                          // echo '<span class="pull-right text-muted">18 Views</span>';
                                       echo '</div>';
                                       
                                       echo "<div class='timeline-content'>
                                          <p>
                                             $description
                                          </p>
                                       </div>";

                                       echo '<div class="timeline-img">
                                          <img src="../postimg/'.$meme_fetch_id.'.jpg" alt="">
                                       </div>';

                                       echo '<div class="timeline-likes">
                                          <div class="stats-right">
                                             <span class="stats-text">259 Shares</span>';

                                          echo   '<span class="stats-text">21 Comments</span>
                                          </div>';

                                          echo '<div class="stats">
                                             <span class="fa-stack fa-fw stats-icon">
                                             <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                             <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                             </span>
                                             <span class="fa-stack fa-fw stats-icon">
                                             <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                             <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                             </span>';

                                             echo '<span class="stats-total">4.3k</span>';
                                          echo '</div>';
                                       echo '</div>';
                                       echo '<div class="timeline-footer">';
                                          echo '<a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>';
                                          echo '<a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>';
                                          echo '<a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-share fa-fw fa-lg m-r-3"></i> Share</a>';
                                       echo '</div>';
                                       
                                       echo '<div class="timeline-comment-box">
                                          <div class="user">';
                                          echo "<img src=../profile/profile-img/".$_SESSION['profile_id'].'.jpg>';

                                          echo '</div>';
                                          // include("../comment/commentManager.php");
                                          echo '<div class="input">';
                                             echo "<form action='../comment/commentManager.php?id=".$meme_fetch_id."' method='GET'>";
                                             echo '<input type="hidden" name="id" value="'.$meme_fetch_id.'">';
                                                echo '<div class="input-group">
                                                   <input type="text" class="form-control rounded-corner"  name="comment_description" placeholder="Write a comment...">';
                                                   // echo $_SESSION['profile_id'];
                                                   // echo $meme_fetch_id;
                                          // echo "<a href='../comment/commentManager.php?id=".$meme_fetch_id."' name='comment'>email me</a>";
                                                                                 // <!-- Modal -->
                  
                  
               

                                             echo '<span class="input-group-btn p-l-10">
                                                   <button class="btn btn-secondary f-s-12 rounded-corner" type="submit" name="comment">comment</button>   ';
                                             echo '</span>
                                             </form>';
                                             echo  "<form method='GET'><button class='btn btn-info f-s-12 rounded-corner'  type='reset' name='show' data-toggle='modal' data-target='#exampleModalLong'  >show</button></form>
                                             </div>";
         

                                             echo "
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end timeline-body -->
                                 </li>
                              
                                 
                              </ul>
                              <!-- end timeline -->
                           </div>
                           <!-- end #profile-post tab -->
                        </div>
                        <!-- end tab-content -->
                     </div>";

         }//while ends
         echo '
         <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Comments...</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">';

               // echo $this->meme;
               $query='select profile.fullname,comments.description from profile, comments where comments.profile_id_fk=profile.id and comments.post_id_fk=54';
               $result = $this->db->con->query($query);
               while ($row = $result->fetch_assoc()) {
               echo $row["fullname"];
               echo "<br>";
               echo $row["description"];
               echo "<br>";
               }
            
               
         echo'
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
         </div>';

	   }//fetch post// select_profile_post_from_post ends
	    public function delete_profile_post_from_post(){

	    }//delete_profile_post_from_post ends

   //     function generateDropdownOptions($dropdownId, $valueArray, $idField, $valueField, $isRequired = true, $multiple = false, $default = true, $selected = null) {
   //       $required = ($isRequired) ? "required" : "";
     
   //       $select = "<select id='$dropdownId' name='$dropdownId";
   //       $select .= ($multiple) ? "[]" : "";
   //       $select .= "' class='form-control $required'";
   //       $select .= ($multiple) ? " multiple" : "";
   //       $select .= ">";
     
   //       if (!$multiple && $default) {
   //           $select .= "<option value=''>- Select -</option>";
   //       }
     
   //       foreach ($valueArray as $value) {
   //           $optionValue = $value->$idField;
   //           $optionText = ucfirst($value->$valueField);
   //           $isSelected = (!empty($selected) && $optionValue == $selected) ? "selected" : "";
     
   //           $select .= "<option value='$optionValue' $isSelected>$optionText</option>";
   //       }
     
   //       $select .= "</select>";
     
   //       return $select;
   //   }

   //   function dropdown_emotion(){
   //    $sql = "select * from emotions";
   //    $result = $this->db->con->query($sql);
   //    $rows;
   //    $option;
   //    while ($row = $result->fetch_assoc()) {
   //       # code...
   //       $id = $row['id'];
   //       $name = $row['name'];
   //       $option .= "<option id='$id'>$name</option>";
   //    }
   //    return $option;
   //    // print_r($option);die;
   //   }

   //   function dropdown_interest(){
   //    $interestsDropdown = generateDropdownOptions("interests", $interests, "id", "interest_name");
   //    return $interestsDropdown;
   //   }
     

	}//class profileManager ends


   
   require_once"../config/config.php";
   // error_reporting(0);
	$Database = Database::getInstance();
	$fake_profile_Manager = new ProfileManagerProxy($Database);
	$fake_profile_Manager->fetch_post_2();

 ?>