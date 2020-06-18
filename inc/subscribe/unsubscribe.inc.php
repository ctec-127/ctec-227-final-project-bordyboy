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
        
        $sql = "DELETE FROM `subscribe` WHERE `forum_name` = '" . $_POST['forumName'] . "'";
        $result = $db->query($sql);
        if (($key = array_search($_POST['forumName'], $_SESSION['subscribeList'])) !== false) {
            unset($_SESSION['subscribeList'][$key]);
        }
        asort($_SESSION['subscribeList']);
        echo 'works';
//     } else {
//         echo "Please type in a comment";
//     }
}


?>