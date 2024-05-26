<?php
require_once('../env.php');
require_once('./db-framework.php');
require_once('./db-connection.php');

$insert_data = Array (
    "department" => $_POST["department"],
    "staff_id" => $_POST["staff-id"],
    "year" => $_POST["year"],
    "hour" => $_POST["hour"],
    "absent_list" => $_POST["absent-list"]
);

$inserted_id = $db_connection->insert('attendace_list', $insert_data);

if($inserted_id){
    redirect('../add-attendance.php?status=done');
}
else {
    redirect('../add-attendance.php?status=error');
}

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}