<?php 
require_once __DIR__ . "/../functions/functions.php";
require_once __DIR__ . "../../../db/mysqli_connect.inc.php";
session_start();

$errorBucket= [];

if($_SERVER['REQUEST_METHOD']=="POST"){
    if ($_POST['form'] == "register") {
        if($_POST['email']){
            $email = $_POST['email'];
        }else{
            array_push($errorBucket, "<p>Please enter your email</p>");
        }
        if($_POST['username']){
            $username = $_POST['username'];
        }else{
            array_push($errorBucket, "<p>Please enter your username</p>");
        }
        if($_POST['password']){
            $password = $_POST['password'];
        }else{
            array_push($errorBucket, "<p>Please enter your password</p>");
        }
        
        if (count($errorBucket) == 0) {
            $sql = "INSERT INTO `user` (email,username,password) ";
            $sql .= "VALUES ('$email','$username','" . hash('sha512', $password) . "')";
            $result = $db->query($sql);
            if (!$result) {
                echo '<div class="alert alert-danger" role="alert">
                I am sorry, but I could not save that record for you. ' .  
                $db->error . '.</div>';
            } else {
                echo "registered";
            }
        } else {
            display_error_bucket($errorBucket);
        }
    }
    if ($_POST['form'] == "login"){
        if($_POST['email']){
            $email = $_POST['email'];
        }else{
            array_push($errorBucket, "<p>Please enter your email</p>");
        }
        if($_POST['password']){
            $password = $_POST['password'];
        }else{
            array_push($errorBucket, "<p>Please enter your password</p>");
        }

        if (count($errorBucket) == 0 ) {
            $hash = hash('sha512', $password);
            $sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$hash'";
            // echo $sql;
            $result = $db->query($sql);
            
            if (!$result) {
                echo '<div class="alert alert-danger" role="alert">
                I am sorry, but I could not save that record for you. ' .  
                $db->error . '.</div>';
            } elseif ($result->num_rows > 0) {
                // print_r($result);
                while ($row = $result->fetch_assoc()) {                
                    $_SESSION['uid'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                }
                echo $_SESSION['uid'];
                $sqlSubscribe = "SELECT * FROM `subscribe` WHERE `user_id` = " . $_SESSION['uid'];
                // echo $sqlSubscribe;
                $resultSubscribe = $db->query($sqlSubscribe);
                $_SESSION['subscribeList'] = [];
                while ($rowSubscribe = $resultSubscribe->fetch_assoc()) {                
                    array_push($_SESSION['subscribeList'], $rowSubscribe['forum_name']);
                    // echo $rowSubscribe['forum_name'];
                }
                echo "loggedIn";
            }
        } else {
            display_error_bucket($errorBucket);
        }
    }
    
}


?>