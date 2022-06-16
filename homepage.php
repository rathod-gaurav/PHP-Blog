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
        <a href="add_blog.php" class="ml-2"><button>Add Blog</button></a>
        <a href="user_blogs.php?user=<?php echo $_SESSION['user_login'] ?>" class="ml-2"><button>Your Blogs</button></a>
    </div>


<!DOCTYPE html>
<html lang="en">

<body>
    
    <?php
        include('templates/header.php');
    ?>

    <div class="container">
        <h2 class="text-white">All Blogs</h2>
        <div class="row">
        <?php foreach($blogs as $blog){ ?>
            
                <div class="col-sm-4">
                    <div class="card my-3" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo "img/" . $blog['blog_image'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($blog['title']) ?></h5>
                            <p class="card-text">Written By : <?php echo htmlspecialchars($blog['user']) ?></p>
                            <a href="read_blog.php?id=<?php echo $blog['id'] ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                
            
        <?php } ?>
        </div>
    </div>
    

    <?php
        include('templates/footer.php');
    ?>

</body>

</html>

