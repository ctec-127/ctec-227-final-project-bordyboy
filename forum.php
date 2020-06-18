<?php 
session_start();
require_once __DIR__ . "/inc/header/header.inc.php";
require_once __DIR__ . "/inc/functions/functions.php";
require_once __DIR__ . "/db/mysqli_connect.inc.php";

if(isset($_SESSION['username'])){
    
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark text-light navBar">
    <a class="navbar-brand" href="home.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="forum.php?all">All Forums <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="home.php?myPosts">My posts <span class="sr-only">(current)</span></a>
        </li>
        <!-- <li class="nav-item">
            <button id="postDiv" class="btn nav-link" >Create a Post<span class="sr-only">(current)</span></button>
        </li> -->
        
        <li class="nav-item">
            <form action="inc/authentication/sign-out.inc.php" method="post">
                <button class="btn nav-link text-warning" id="signOut">Sign Out</button>
            </form>
        </li>
        </ul>
    </div>
        <!-- <ul class="nav navbar-nav"> -->
        <!-- </ul> -->
    </nav>
    
        
    <?php 
    
    if(isset($_GET['forum'])) {
        echo "
        <div class='col-10 offset-1'>
        <br>
        <h2>" . $_GET['forum'];
        if(in_array($_GET['forum'], $_SESSION['subscribeList'])) {
            echo "<form id='formUnsubscribe'><input hidden id='hiddenUnsubscribe' value='{$_GET['forum']}'><button type='submit' id='unsubscribe' class='btn button'>Unsubscribe</button></h2></form>";
        } else {
            echo "<form id='formSubscribe'><input hidden id='hiddenSubscribe' value='{$_GET['forum']}'><button type='submit' id='subscribe' class='btn button'>Subscribe</button></h2></form>";
        }
        echo "<br>";
        $sql = "SELECT * FROM `post` WHERE `forum_name` = '" . $_GET['forum'] . "'";
        $result = $db->query($sql);
        // echo $sql;
        display_forum_post($result,$db);
    } else {
        echo "
        <div class='col-4 offset-4'>
        <br>
        <h2>All Forums</h2><br>";
        create_all_forums_list($db);
        
    }
    
    
    ?>

    </div>
    <?php require_once __DIR__ . "/inc/footer/footer.inc.php"; ?>

</body>

<?php 

} else {
    header('Location: index.php');
}

?>