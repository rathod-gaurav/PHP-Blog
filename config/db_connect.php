<?php 
    //connect to database
    $conn = mysqli_connect('localhost', 'Gaurav', 'Test58o2#', 'php_blog');

    //check the connection
    if(!$conn){
        echo "database connection error" . mysqli_connect_error();
    }
?>