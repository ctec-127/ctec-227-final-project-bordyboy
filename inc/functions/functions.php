<?php 
function display_error_bucket($errorBucket){
    echo '<p>The following errors were detected:</p>';
    echo '<div class="pt-4 alert alert-warning" role="alert">';
        echo '<ul>';
        foreach ($errorBucket as $text){
            echo '<li>' . $text . '</li>';
        }
        echo '</ul>';
    echo '</div>';
    echo '<p>All of these fields are required. Please fill them in.</p>';
}

function create_forum_post($username,$title,$text='',$image=''){
    
}

function display_forum_post($username,$title,$text='',$image='',$comments){
    // $sql = "SELECT * FROM `post` WHERE"
}

?>