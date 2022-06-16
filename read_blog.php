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


    <?php
            include('templates/footer.php');
        ?>

</body>

</html>