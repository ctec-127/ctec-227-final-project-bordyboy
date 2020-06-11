$('#registerSubmit').on('click',function(e){
    // console.log('hello');
    e.preventDefault();
    var email = $('#emailRegister').val();
    var username = $('#usernameRegister').val();
    var password = $('#passwordRegister').val();
    console.log(email + username + password);
    $.ajax({
        type: "POST",
        url: "inc/authentication/authentication.php",
        data:{
            email: email,
            username: username,
            password: password,
            form: "register"
        } 
            
        ,
        success: function (response) {
            console.log(response);
            $('#errorBucket').html(response);
            if (response == 'registered') {
                $('#emailRegister').val('');
                $('#usernameRegister').val('');
                $('#passwordRegister').val('');
                $('#errorBucket').html("<h1>Thank you for registering</h1>");
                $('#registerTab').attr("aria-selected", "false");
                $('#registerTab').removeClass("active");
                $('#loginTab').attr("aria-selected", "true");
                $('#loginTab').addClass("active");
                $('#register').removeClass("active");
                $('#register').removeClass("show");
                $('#login').addClass("active");
                $('#login').addClass("show");
                $('#emailLogin').val(email);
                $('#passwordLogin').focus();
                
            }
        },error: function (response) {
            console.log(response);
        }
    });

})
$('#registerLogin').on('click',function(e){
    // console.log('hello');
    e.preventDefault();
    var email = $('#emailLogin').val();
    var password = $('#passwordLogin').val();
    console.log(email + password);
    $.ajax({
        type: "POST",
        url: "inc/authentication/authentication.php",
        data:{
            email: email,
            password: password,
            form: "login"
        } 
            
        ,
        success: function (response) {
            console.log(response);
            $('#errorBucket').html(response);
            if (response == 'loggedIn') {
                console.log(response);
                window.location.replace('home.php');
            }
        },error: function (response) {
            console.log(response);
        }
    });

})
