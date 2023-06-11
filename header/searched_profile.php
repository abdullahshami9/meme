<?php

// print_r($_GET);die;
require_once '../config/config.php';
$Database = Database::getInstance();

$sql = "insert into user_visited_profiles(visited_profile,whom_visited) values(".$_GET['id'].",".$_SESSION['profile_id'].") ";
$result = $Database->con->query($sql);


?>