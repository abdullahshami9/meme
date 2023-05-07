<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	class postmanager{
      private $meme_id;
		private $db;
		function __construct($db){
			$this->db=$db;
		}
		public function create_post(){
			 if (isset($_POST['post'])) {
      $id=$_SESSION['profile_id'];
      $qry= "INSERT INTO `post` (`id`, `prof_id_fk`, `description`, `times`, `dates`, `file_size`, `allow`) VALUES (NULL, '".$id."', '".$_POST['post_description']."', current_time, current_date, null, NULL);";
      
      if ($this->db->con->query($qry)) {
        $memeId = $this->db->con->insert_id;
        move_uploaded_file($_FILES['memejpg']['tmp_name'], "../postimg/".$memeId.".jpg");
        // echo 'posted';
      }
      else {
        echo "<script>alert('post is not done try again');</script>";
      }
  }//if isset post butto ends

		}//create post subroutine ends
		public function fetch_post(){

			$qry="select p.id, p.description, p.times, p.dates, pro.username, pro.id as profile_id from post p, profile pro where pro.id = p.prof_id_fk order by p.id desc;";


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


	}//fetch post

}//class ends
	require_once "../config/config.php";//add db
	$ptMgr = new postmanager(new Database());//db instance/obj and pass db obj thorough constructor
   if (isset($_POST['post'])) {
      $ptMgr->create_post();

      header("location: ../home/");//modified on 18/12/22
   }//if post btn is clicked then just run create post function
	
	// do write this on home page 
   
 ?>
 