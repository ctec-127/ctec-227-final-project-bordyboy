<?php 
require_once __DIR__ . "/../functions/functions.php";
require_once __DIR__ . "../../../db/mysqli_connect.inc.php";
session_start();
$errorBucket= [];
if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['commentText'] !== '') {
        $commentText = $_POST['commentText'];
    } else {
        array_push($errorBucket, "<p>Please type in a comment</p>");
    }

    if(count($errorBucket) == 0){
        
        $sql = "INSERT INTO `comment` (`comment_text`,`username`,`user_id`,`post_id`) VALUES ('" . $commentText . "','" . $_SESSION['username'] . "'," . $_SESSION['uid'] . "," . $_POST['postID'] . ")";
        $result = $db->query($sql);
        echo 'works';
    } else {
        echo "Please type in a comment";
    }
}


?>