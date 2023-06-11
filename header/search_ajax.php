<?php
// search_ajax.php

// Access the data sent via Ajax
// print_r($_POST);die;
require_once '../config/config.php';
$Database = Database::getInstance();

$sql = "select * from profile where fullname like '%".$_POST['value']."%' ";
$result = $Database->con->query($sql);
$rows = array();
while ($row = $result->fetch_assoc()) {
    # code...
    $tempRow = array();
    $tempRow['id'] = $row['id'];
    $tempRow['fullname'] = $row['fullname'];
    
    $rows[] = $tempRow;
}

echo json_encode($rows);
?>