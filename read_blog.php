<?php

    include('config/db_connect.php');

    include('config/blogdb_connect.php');

?>

<?php

    session_start();

    if(!isset($_SESSION['user_login'])){
        header("Location: index.php");
    } else{
?>
    <div class="text-white ml-5">
        <?php
            echo "Welcome, " . $_SESSION['user_login'];
            
        }
        ?>
        <a href="config/logout.php" class="ml-2"><button>Logout</button></a>
        <a href="homepage.php" class="ml-2"><button>Home</button></a>
        <a href="user_blogs.php?user=<?php echo $_SESSION['user_login'] ?>" class="ml-2"><button>Your Blogs</button></a>
    </div>


<!DOCTYPE html>
<html lang="en">

<body>
    
    <?php
        include('templates/header.php');
    ?>


    <?php
        $blog_id = mysqli_real_escape_string($conn, $_GET['id']);

        $query = "SELECT * FROM blogs where id='".$blog_id."'";
        $query_run = mysqli_query($conn, $query);
        
        while($blog = mysqli_fetch_array($query_run)){
            ?>
                <div class="container">
                    <h2 class="text-white my-5"><?php echo htmlspecialchars($blog['title']) ?></h2>

                    <div class="row">

                        <div class="col-sm-12 text-center">
                            <img class="img-fluid" src="<?php echo "img/" . $blog['blog_image'] ?>" alt="Card image cap">
                            <p class="text-white my-2">Written By : <?php echo htmlspecialchars($blog['user']) ?></p>
                            
                            <h4 class="text-white my-3"><?php echo htmlspecialchars($blog['description']) ?></h4>
                        </div>
                    </div>

                </div>
                
        
        <?php
        }
        
    ?>

        <div class="container my-5">

            <?php
            
                $blog_id = mysqli_real_escape_string($conn, $_GET['id']);

                $query = "SELECT * FROM blogs where id='".$blog_id."'";
                $query_run = mysqli_query($conn, $query);
                $blog = mysqli_fetch_array($query_run)
            
            ?>

            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Comments</h5>
                            <hr>
                            <?php
                                $blog_id = mysqli_real_escape_string($conn, $_GET['id']);

                                $query2 = "SELECT * FROM comments where blog_id='".$blog_id."'";
                                $result = mysqli_query($conn, $query2);

                                $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                foreach($comments as $comment){
                            ?>
                                    <div class="mx-5">
                                        <h6 class="card-subtitle mb-2 text-muted"> By - <?php echo htmlspecialchars($comment['by_user']) ?></h6>
                                        <p class="card-text"><?php echo htmlspecialchars($comment['comment_text']) ?></p>
                                        <hr>
                                    </div>
                                    
                            <?php } ?>

                            <h5 class="card-title">Add a Comment</h5>
                            <form action="add_comment.php" method="POST" class="my-3">
                                <input type="hidden" name="blog_id" value="<?php echo htmlspecialchars($blog['id']) ?>">
                                <label for="comment_text" class="mx-3">Comment</label>
                                <textarea name="comment_text" id="comment_text" rows="4" placeholder="Write your comment"></textarea>
                                <br>
                                <label for="comment_user" class="mx-3">Written By</label>
                                <input type="text" id="comment_user" name="comment_user" value="<?php echo htmlspecialchars($_SESSION['user_login']) ?>" readonly>
                                <br>
                                <button type="submit" name="comment_submit">Post</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
            include('templates/footer.php');
        ?>

</body>

</html>