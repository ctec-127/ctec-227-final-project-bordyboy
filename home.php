<?php 
session_start();
require_once __DIR__ . "/inc/header/header.inc.php";
require_once __DIR__ . "/inc/functions/functions.php";

?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark text-light navBar">
    <a class="navbar-brand" href="index.php">New Horizon</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="">Subscription List <span class="sr-only">(current)</span></a>
        </li>
        </ul>
    </div>
    </nav>
    <div class="row-flow">
        <div class="col-3 p-2">
            <!-- <h2>Hello <?php echo $_SESSION['username']; ?></h2> -->
            <button class="btn button">Create a Post Here</button>
            <div id="createPost">
                <form>
                    
                    <div class="form-group">
                        <label for="email">Title</label>
                        <input type="text" class="form-control" id="emailLogin">
                    </div>
                    <div class="form-group">
                        <label for="password">Text</label>
                        <textarea  class="form-control" id="passwordLogin" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Select Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button id="postSubmit" class="btn button" >Post</button>
                </form>
            </div>
        </div>
        <div class="col-8">
        
        </div>
    </div>

</body>