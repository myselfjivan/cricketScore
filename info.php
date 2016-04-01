<?php

// Include confi.php
include_once('config.php');

$uid = 1;
if (!empty($uid)) {
    $qur = mysql_query("select run, overs, wicket from `score` where ID='$uid'");
    $result = array();
    while ($r = mysql_fetch_array($qur)) {
        extract($r);
        $result[] = array("run" => $run, "overs" => $overs, "wicket" => $wicket);
    }
    $json = array("status" => 1, "score" => $result);
} else {
    $json = array("status" => 0, "msg" => "User ID not define");
}
@mysql_close($conn);

/* Output header */
header('Content-type: application/json');
echo json_encode($json);
