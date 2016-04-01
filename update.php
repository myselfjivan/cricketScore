<?php

// Include confi.php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
// Get data
    $run = isset($_POST['run']) ? mysql_real_escape_string($_POST['run']) : "";
    $wicket = isset($_POST['wicket']) ? mysql_real_escape_string($_POST['wicket']) : "";
    $overs = isset($_POST['overs']) ? mysql_real_escape_string($_POST['overs']) : "";
    //$status = isset($_POST['status']) ? mysql_real_escape_string($_POST['status']) : "";

// Insert data into data base
    $sql = "UPDATE `score` SET run = $run, overs = $overs, wicket = $wicket where ID = 1";
    $qur = mysql_query($sql);
    if ($qur) {
        $json = array("status" => 1, "msg" => "score added!");
    } else {
        $json = array("status" => 0, "msg" => "Error adding score");
    }
} else {
    $json = array("status" => 0, "msg" => "Request method not accepted");
}

@mysql_close($conn);

/* Output header */
header('Content-type: application/json');
echo json_encode($json);
