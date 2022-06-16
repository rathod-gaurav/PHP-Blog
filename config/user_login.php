<?php

    include('db_connect.php');

    session_start();

    if(isset($_SESSION["user_login"])){
        // check if any user is already logged in. If yes then redirect him to homepage
        // echo "User already logged in!";
        header("Location: ../homepage.php");
    }

    if(isset($_POST['l_submit'])){
        $username = $_POST['l_username'];
        $password = $_POST['l_password'];
        
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' limit 1");

        if(mysqli_num_rows($sql)==1){
            $_SESSION["user_login"] = $username;
            // echo "Welcome, " . $_SESSION["user_login"];
            header("Location: ../homepage.php");
            exit();
        }
        else{
            echo "Incorrect username or password";
            exit();
        }

    }

?>