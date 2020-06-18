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
        <li class="nav-item">
            <a class="nav-link" href="forum.php">All Forums <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="home.php?myPosts">My posts <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <button id="postDiv" class="btn nav-link" >Create a Post<span class="sr-only">(current)</span></button>
        </li>
        <li class="nav-item active">
            <button id="forumDiv" class="btn nav-link" >Create a Forum<span class="sr-only">(current)</span></button>
        </li>
        
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
    <div class="container">
        
        <div class="row no-marginLR">
            <div class="col-10 offset-1">
                <br>
                <h2>Welcome back, <?php echo $_SESSION['username']; ?> !</h2>
                 <div id="errorBucket">
         
                 </div>
            <div id="createPost" style="display: none;">
                    <form id="postForm" method="POST" enctype="multipart/form-data">
                        <?php 
                            create_subscribe_select($_SESSION['subscribeList'],$_SESSION['forumList'] );
                            ?>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="postTitle" name="title">
                        </div>
                        <div class="form-group">
                            <label for="text">Text</label>
                            <textarea  class="form-control" id="postText" rows="3" name="text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file" class="form-control-file" id="image" accept=".jpg,.jpeg,.png" name="image">
                        </div>
                        <button type="submit" id="postSubmit" class="btn button" >Post</button>
                    </form>
                </div>
                <div class="card" id="createForum" style="display: none;">
                    <form id="createForumForm" method="POST" >
                        <div class="form-group">
                            <label for="name">New Forum Name</label>
                            <input type="text" class="form-control" id="createForumName" name="name">
                        </div>
                                                
                        <button type="submit" id="postSubmit" class="btn button" >Create</button>
                    </form>
                </div>
            <!-- <div class="card">
                <div class="card-header">
                    testforum - u/user <br><hr> asdkjas;kd askd kasd lkjasdl kaslkd aslkd aslkjd asklj
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p>text from the post Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio assumenda totam laborum delectus cum! Amet sint distinctio reprehenderit, quos quibusdam repellat est incidunt ipsa aut consequuntur numquam repellendus nulla corrupti.</p>
                    <img src="img/horizon.jpg" alt="image of post" class="postImage">        
                    </blockquote>
                </div>
            <div class="accordion" id="commentsCollapse">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Comments
                    </button>
                </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#commentsCollapse">
                <div class="card-body">
                    comments here
                </div>
                </div>
            </div>
            
            </div>
            </div> -->
                <?php 

                
                
                if(isset($_GET['myPosts'])) {
                    echo "<br>";
                    $uid = $_SESSION['uid'];
                    $sql="SELECT `id`, `post_title`, `post_text`, `post_image`,`forum_name`,`username` FROM `post` WHERE `user_id` = $uid ORDER BY `id` DESC";
                    // echo $sql;
                    $result = $db->query($sql);
                    display_forum_post($result,$db);
                } else {
                    if (count($_SESSION['subscribeList']) == 0) {
                        $errorBucket=['<p>It seems you have no subscribed forums. Please visit the <a href="forum.php">All Forums</a> page to subscribe to forums</p>'];
                        display_error_bucket($errorBucket);
                    }
                    echo "<br>";               
                    $uid = $_SESSION['uid'];
                    $sql="SELECT post.id, post.post_title, post.post_text, post.post_image, post.forum_name, post.username FROM `post` JOIN `subscribe` ON subscribe.forum_name = post.forum_name WHERE subscribe.user_id = $uid ORDER BY post.id DESC";
                    $result = $db->query($sql);
                    display_forum_post($result,$db);
                }
                
                ?>

            </div>
        </div>
    </div>
    <?php require_once __DIR__ . "/inc/footer/footer.inc.php"; ?>

</body>

<?php 

} else {
    header('Location: index.php');
}

?>