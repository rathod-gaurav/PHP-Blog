<?php 

    include('config/db_connect.php');

?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

    <div class="container">
        <div class="my-5">
            <h4 class="text-white">Sign In</h4>
            <form action="config/user_login.php" method="POST">
                <label for="l_username" class="mx-3 text-white">Username</label>
                <input type="text" id="l_username" name="l_username" placeholder="enter your username">
                <br>
                <label for="l_password" class="mx-3 text-white">Password</label>
                <input type="password" id="l_password" name="l_password" placeholder="enter your password">
                <br>
                <button type="submit" name='l_submit'>Sign In</button>
            </form>
        </div>

        <div class="my-5">
            <h4 class="text-white">Register</h4>
            <form action="config/user_register.php" method="POST">
                <label for="r_username" class="mx-3 text-white">Username</label>
                <input type="text" id="r_username" name="r_username" placeholder="enter your username">
                <br>
                <label for="r_name" class="mx-3 text-white">Name</label>
                <input type="text" id="r_name" name="r_name" placeholder="enter your name">
                <br>
                <label for="r_password" class="mx-3 text-white">Password</label>
                <input type="password" id="r_password" name="r_password" placeholder="enter your password">
                <br>
                <label for="r_confirm_password" class="mx-3 text-white">Password</label>
                <input type="password" id="r_confirm_password" name="r_confirm_password" placeholder="re-enter your password">
                <br>
                <button type="submit" name='r_submit'>Register</button>
            </form>
        </div>
            
    </div>


    <?php include('templates/footer.php'); ?>

</html>
