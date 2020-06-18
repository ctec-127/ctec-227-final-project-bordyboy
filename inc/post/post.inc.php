<?php 
require_once __DIR__ . "/../functions/functions.php";
require_once __DIR__ . "../../../db/mysqli_connect.inc.php";
session_start();

$errorBucket= [];

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(is_array($_FILES)) {
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
            $sourcepath = $_FILES['image']['tmp_name'];
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $imageName = $_SESSION['uid'] . "temp." . $ext;
            echo $imageName;
            $imageImported = true;
        } else {
            $imageName = NULL;
            $imageImported = false;
        } 
    }
    if($_POST['forum'] !== 'noForumSubscribed' && $_POST['forum'] !== 'noForumSelected') {
        $forum = $_POST['forum'];
    } else {
        array_push($errorBucket, "<p>Please select a valid forum.</p>");
    }
    if($_POST['title']) {
        $title = $_POST['title'];
    } else {
        array_push($errorBucket, "<p>Please type in the Title</p>");
    }
    if($_POST['text']) {
        $text = $_POST['text'];
    } else {
        $text = NULL;
    }

    if(count($errorBucket) == 0 && $forum !== 'noForumSubscribed' && $forum !== 'noForumSelected') {
        $uid = $_SESSION['uid'];
        $username = $_SESSION['username'];
        $sql = "INSERT INTO `post` (post_title,post_text,post_image,forum_name,user_id,username) VALUES ('$title','$text','$imageName','$forum',$uid,'$username')";
        $result = $db->query($sql);
        if($imageImported == true) {
            
            // $targetPath = "../../uploads/" . $_SESSION['uid'] . "." . $ext;
            $sql2 = "SELECT id FROM `post` WHERE post_image = '" . $uid . "temp." . $ext . "'";
            // echo $sql2;
            $result2 = $db->query($sql2);
            while($row = $result2->fetch_assoc()){
                $postID = $row['id'];
            }
            $sql3 = "UPDATE `post` SET post_image = '" . $postID . "." . $ext . "' WHERE post_image = '" . $imageName . "'";
            $result3 = $db->query($sql3);
            echo $sql3;
            $targetPath = "../../uploads/" . $postID . "." . $ext;
            move_uploaded_file($sourcepath,$targetPath);
            echo "works";            
        }        
        unset($_POST['title']);
        unset($_POST['forum']);
        echo "works";
    } else {
        display_error_bucket($errorBucket);
    }


}









?>