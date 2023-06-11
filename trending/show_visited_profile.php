<?php
require_once '../config/config.php';
$Database = Database::getInstance();

$sql = "select *,p.fullname from user_visited_profiles,profile p where whom_visited = '".$_SESSION['profile_id']."'";
$result = $Database->con->query($sql);

$rows = array();
while ($row = $result->fetch_assoc()) {
    # code...
    $tempRow = array();
    $tempRow['id'] = $row['id'];
    $tempRow['fullname'] = $row['fullname'];
    
    $rows[] = $tempRow;
}
print_r($rows);die;
?>