<?php
session_start();
require_once __DIR__ . "/inc/header/header.inc.php";


?>
<body>
    <nav class="navbar navbar-dark navBar">
        <h1 class="text-light">New Horizon</h1>
    </nav>
    <br>
    <div class="container-flex">
        <div id="errorBucket">
        
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <ul class="nav nav-tabs" id="authenticationTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="loginTab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="registerTab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
            </li>
            </ul>
            <div class="tab-content" id="authenticationTabContent">
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
    </div>
    <footer>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
    </footer>
</body>

</html>