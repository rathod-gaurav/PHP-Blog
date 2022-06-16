<?php

    include('db_connect.php');

    if(isset($_POST['r_submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['r_username']);
        $email = mysqli_real_escape_string($conn, $_POST['r_email']);
        $password = mysqli_real_escape_string($conn, $_POST['r_password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['r_confirm_password']);

        if($confirm_password == $password){
            $sql = "INSERT INTO users(username, email, password) values ('$username','$email','$password')";

            if(mysqli_query($conn, $sql)){
                header("Location: ../index.php");
            }
            else{
                echo "query error: " . mysqli_error($conn);
            }
        }

    }

?>