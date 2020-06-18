<?php 
require_once __DIR__ . "/../functions/functions.php";
require_once __DIR__ . "../../../db/mysqli_connect.inc.php";
session_start();

$errorBucket= [];

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    if($_POST['name']) {
        $name = $_POST['name'];
    } else {
        array_push($errorBucket, "<p>Please type in the New Forum Name</p>");
    }
    

    if(count($errorBucket) == 0 ) {
        $sql = "INSERT INTO `forum` (`forum_name`,`owner_id`) VALUES ('" . $name . "'," . $_SESSION['uid'] . ")";
        $result = $db->query($sql);
        array_push($_SESSION['forumList'], $_POST['name']);
        echo "works";        
        // echo $sql;
    } else {
        display_error_bucket($errorBucket);
    }


}



?>