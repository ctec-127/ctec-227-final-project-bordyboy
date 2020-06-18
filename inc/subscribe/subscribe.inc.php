<?php 
require_once __DIR__ . "/../functions/functions.php";
require_once __DIR__ . "../../../db/mysqli_connect.inc.php";
session_start();
// $errorBucket= [];
if($_SERVER['REQUEST_METHOD']=="POST"){
    // if($_POST['forumName'] !== '') {
    //     $forumName = $_POST['forumName'];
    // } else {
    //     array_push($errorBucket, "<p>Please type in a comment</p>");
    // }

    // if(count($errorBucket) == 0){
        
        $sql = "INSERT INTO `subscribe` (`user_id`,`username`,`forum_name`) VALUES ('" . $_SESSION['uid'] . "','" . $_SESSION['username'] . "','" . $_POST['forumName'] . "')";
        $result = $db->query($sql);
        array_push($_SESSION['subscribeList'], $_POST['forumName']);
        asort($_SESSION['subscribeList']);
        echo 'works';
//     } else {
//         echo "Please type in a comment";
//     }
}


?>