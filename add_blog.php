<?php

    include('config/db_connect.php');

    include('config/blogdb_connect.php');

    if(isset($_POST['blog_submit'])){
        $blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
        $blog_desc = mysqli_real_escape_string($conn, $_POST['blog_desc']);
        $blog_user = mysqli_real_escape_string($conn, $_POST['blog_user']);
        $blog_image = $_FILES['image']['name'];

        $target = "img/".basename($_FILES['image']['name']);

        // assuming user submits a valid form
        $sql = "INSERT INTO blogs(title, description, user, blog_image) values ('$blog_title','$blog_desc','$blog_user', '$blog_image')";

        if(mysqli_query($conn, $sql)){
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            header("Location: homepage.php");
        }
        else{
            echo "query error " . mysqli_error($conn);
        }

    }

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

    <div class="container">
        <h2 class="text-white">Write a Blog</h2>

        <form action="add_blog.php" method="POST" enctype="multipart/form-data">
            <label for="blog_title" class="mx-3 text-white">Title</label>
            <input type="text" id="blog_title" name="blog_title" placeholder="Title for your blog">
            <br>
            <label for="blog_desc" class="mx-3 text-white">Description</label>
            <textarea name="blog_desc" id="blog_desc" cols="30" rows="10" placeholder="Describe your blog in few words"></textarea>
            <br>
            <input type="hidden" name="size" value="1000000">
            <label for="image" class="mx-3 text-white">Upload Image</label>
            <input type="file" id="image" name="image">
            <br>
            <label for="blog_user" class="mx-3 text-white">Written By</label>
            <input type="text" id="blog_user" name="blog_user" value="<?php echo htmlspecialchars($_SESSION['user_login']) ?>" readonly>
            <br>
            <button type="submit" name="blog_submit">Add Blog</button>
        </form>
        
    </div>
    

    <?php
        include('templates/footer.php');
    ?>

</body>

</html>