<?php 


function display_error_bucket($errorBucket){
    echo '<div class="pt-4 alert alert-warning" role="alert">';
        echo '<ul>';
        foreach ($errorBucket as $text){
            echo '<li>' . $text . '</li>';
        }
        echo '</ul>';
    echo '</div>';
}


function display_forum_post($result,$db){
    while($row = $result->fetch_assoc()){
        echo "
        
        <div class='card'>
                <div class='card-header'>
                {$row['forum_name']}
                <i class='text-muted'> - {$row['username']}</i> <br><hr> {$row['post_title']}
                </div>
                <div class='card-body'>
                    <blockquote class='blockquote mb-0'>
                    <p>{$row['post_text']}</p>

                    ";
                    if(strlen($row['post_image']) > 0) {
                        echo "<div class='postImageDiv'><img src='uploads/{$row['post_image']}' alt='' class='postImage'></div> ";
                    } else {
                        // echo "";
                    }


                    echo "        
                    </blockquote>
                </div>
            <div class='accordion' id='commentsCollapse{$row['id']}'>
            <div class='card'>
                <div class='card-header' id='postParent{$row['id']}'>
                <h2 class='mb-0'>
                    <button class='btn btn-link btn-block text-left' type='button' data-toggle='collapse' data-target='#collapse{$row['id']}' aria-expanded='true' aria-controls='collapse{$row['id']}'>
                    Comments
                    </button>
                </h2>
                </div>

                <div id='collapse{$row['id']}' class='collapse' aria-labelledby='postParent{$row['id']}' data-parent='#commentsCollapse{$row['id']}'>
                <div class='card-body'>
                    <ul>
                        ";
                    
                        $sql2 = "SELECT `comment_text`, `username` FROM `comment` WHERE `post_id` = " . $row['id'];
                        // echo $sql2;
                        $result2 = $db->query($sql2);
                        while ($row2 = $result2->fetch_assoc()){
                            echo "<h6>{$row2['username']}</h6><h6'> {$row2['comment_text']}</h6><hr id='comment{$row['id']}'>";
                        }
                        echo "
                        
                        <form class='form-inline col-12 p-0 submitNewComment' id='form{$row['id']}'>
                            <div class='form-group'>
                                <input type='text' class='form-control newCommentContent' id='commentPost{$row['id']}' placeholder='Comment...'>
                                <input hidden value='{$row['id']}' class='hiddenPostID'>
                                <input hidden value='{$_SESSION['username']}' class='hiddenSessionUsername'>
                            </div>                    
                            <button type='submit' class='btn btn-primary ml-3'>Post</button>
                        </form>
                    </ul>
                </div>
                </div>
            </div>
            
            </div>
            </div>
            <br>
        ";
        // echo $row['post_title'];
        // echo $row['post_text'];
        // echo $row['post_image'];
        // echo $row['forum_name'];
        // echo $row['username'];
        // echo "<br>";
    }
}

function create_subscribe_select($subscribeList,$forumList){
    echo "<div class=\"form-group\">";
    echo "<label for=\"forumSelect\">Forum</label>";
    echo "<select class=\"form-control\" id=\"forumSelect\" name=\"forum\">";
    echo "<optgroup label=\"Subscribed\">";
    if(count($subscribeList) == 0){
        echo "<option value=\"noForumSubscribed\">You have no subscribed forums</option>";
    } else {
        echo "<option value=\"noForumSelected\" hidden>Select a forum</option>";
        foreach ($subscribeList as $value) {
            echo "<option value=\"" . $value . "\">" . $value . "</option>";
        }
    }
    echo "</optgroup>";
    echo "<optgroup label=\"All Forums\">";
    foreach ($forumList as $value) {
        echo "<option value=\"" . $value . "\">" . $value . "</option>";
    }
    echo "</optgroup>";
    echo "</select> </div> <br>";
}

function create_all_forums_list($db) {
    // $sqlForumList = "SELECT `forum_name`  FROM `forum`";
    // $resultForumList = $db->query($sqlForumList);
    // // echo "<ul>";
    foreach ($_SESSION['forumList'] as $rowForumList){
        echo "<div class='bg-white forumCell'><a class='text-dark' href='forum.php?forum=" . $rowForumList . "'>" . $rowForumList . "</a></div><br>";
    }
}


?>