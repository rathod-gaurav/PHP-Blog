<?php
    
    include('config/db_connect.php');

    if(isset($_POST['comment_submit'])){
        $blog_id = mysqli_real_escape_string($conn, $_POST['blog_id']);
        $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);
        $comment_user = mysqli_real_escape_string($conn, $_POST['comment_user']);

        $sql = "INSERT INTO comments(blog_id, comment_text, by_user) values ('$blog_id','$comment_text','$comment_user')";

        if(mysqli_query($conn, $sql)){
            header("Location: read_blog.php?id=$blog_id");
        }
        else{
            echo "query error: " . mysqli_error($conn);
        }
    }

?>