<?php

    include('db_connect.php');

    if(isset($_POST['r_submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['r_username']);
        $name = mysqli_real_escape_string($conn, $_POST['r_name']);
        $password = mysqli_real_escape_string($conn, $_POST['r_password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['r_confirm_password']);

        if($confirm_password == $password){
            $sql = "INSERT INTO users(username, name, password) values ('$username','$name','$password')";

            if(mysqli_query($conn, $sql)){
                header("Location: ../index.php");
            }
            else{
                echo "query error: " . mysqli_error($conn);
            }
        }

    }

?>