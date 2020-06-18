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
                
            } else {
                $('#errorBucket').html(response);
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
            
            if (response == 'loggedIn') {
                console.log(response);
                window.location.replace('home.php');
            } else if (response == 'wrongLogIn') {
                console.log(response);
            } else {
                $('#errorBucket').html(response);
            }
        },error: function (response) {
            console.log(response);
        }
    });

})
$('#postForm').on('submit',function(e){
    console.log('hi');
    // $('#form').submit(false);
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "inc/post/post.inc.php",
        processData: false,
        contentType: false,
        data: new FormData(this),
        success: function (response) {
            if (response == 'works'){
                // $('#createPost').toggle();
                window.location.replace('home.php?myPosts');
                // location.reload(true);
            } else {
                $('#errorBucket').html(response);
            }

        },error: function (response) {
            
        }
    });

})
$('#createForumForm').on('submit',function(e){
    console.log('hi');
    // $('#form').submit(false);
    var name = $('#createForumName').val();
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "inc/post/create-forum.inc.php",
        data: {
            name: name,
        },
        success: function (response) {
            if (response == 'works'){
                // console.log(response);
                // $('#createPost').toggle();
                window.location.replace('forum.php?forum='+name);
                // location.reload(true);
            } else {
            //     console.log(response);
                $('#errorBucket').html(response);
            }

        },error: function (response) {
            
        }
    });

})
$('.submitNewComment').on('submit',function(e){
    console.log('hi');
    // $('#form').submit(false);
    e.preventDefault();
    var postID = $('.hiddenPostID').val();
    var commentText = $('#commentPost'+postID).val();
    var username = $('.hiddenSessionUsername').val();
    $.ajax({
        type: "POST",
        url: "inc/post/post-comment.inc.php",
        data: {
            commentText: commentText,
            postID: postID,
        },
        success: function (response) {
            if (response == 'works'){
                console.log(response);
                $('#form'+ postID).before('<h6>'+username+'</h6><h6 id=\'comment'+postID+'\'>'+commentText+'</h6><hr>');
                $('#commentPost'+postID).val('');
            } else {
                alert(response);
            }

        },error: function (response) {
            
        }
    });

})
$('#formUnsubscribe').on('submit',function(e){
    console.log('hi');
    // $('#form').submit(false);
    e.preventDefault();
    var forumName = $('#hiddenUnsubscribe').val();
    $.ajax({
        type: "POST",
        url: "inc/subscribe/unsubscribe.inc.php",
        data: {
            forumName: forumName,
        },
        success: function (response) {
            if (response == 'works'){
                console.log(response);
                window.location.replace('forum.php?forum='+forumName);
            } else {
                alert(response);
            }

        },error: function (response) {
            
        }
    });

})
$('#formSubscribe').on('submit',function(e){
    console.log('hi');
    // $('#form').submit(false);
    e.preventDefault();
    var forumName = $('#hiddenSubscribe').val();
    $.ajax({
        type: "POST",
        url: "inc/subscribe/subscribe.inc.php",
        data: {
            forumName: forumName,
        },
        success: function (response) {
            if (response == 'works'){
                console.log(response);
                window.location.replace('forum.php?forum='+forumName);
            } else {
                alert(response);
            }

        },error: function (response) {
            
        }
    });

})

$('#postDiv').on('click', function(e){
    $('#createPost').toggle();
})
$('#forumDiv').on('click', function(e){
    $('#createForum').toggle();
})

