<?php
session_start();
require_once __DIR__ . "/inc/header/header.inc.php";


?>
<body id="welcomeBody">
    <!-- <img src="img/horizon.jpg" alt="image of a horizon"> -->
    <nav class="navbar navbar-dark navBar">
        <h1 class="text-light">New Horizon</h1>
    </nav>
    <br>
    <div class="container">
        <div id="errorBucket">
        
        </div>
        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-6">
            <br>
                <h2>Welcome to New Horizon</h2>
                <p>New Horizon is platform where anyone can create and participate in forums. This website is the perfect place to post that one question that you never found an answer to on Stack Overflow, or have some interesting discussions about last night episode of you favorite TV Show.</p>
            </div>
            <div class="col-xs-12 col-sm-10 col-md-6 col-lg-4 card p-3 rounded-lg">
                <ul class="nav nav-tabs" id="authenticationTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="loginTab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="registerTab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="authenticationTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="loginTab">
                        <form>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="emailLogin">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="passwordLogin">
                            </div>
                            <button id="registerLogin" class="btn button" >Login</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="registerTab">
                        <form>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="emailRegister">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="usernameRegister">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="passwordRegister">
                            </div>
                            <button id="registerSubmit" class="btn button">Register</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-lg-2"></div>
        </div>
    </div>
    <?php require_once __DIR__ . "/inc/footer/footer.inc.php"; ?>
</body>

</html>