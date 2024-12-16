<?php

function baseurl() {

    return "http://localhost:70/AdvocacyHelper/";
}
$con = mysql_connect('127.0.0.1', 'root', 'student');
if (!$con) {
    echo '<font color=red>' . mysql_error() . '</font>';
}
$db = mysql_select_db('advocacyhelper');
if (!$db) {
    echo '<font color=red>' . mysql_error() . '</font>';
}
session_start();
//$_SESSION['usertype']="Admin";    
ob_start();

@date_default_timezone_set(@date_default_timezone_get());
?>
