<?php

    include('db_connect.php');

    $sql = 'SELECT * from blogs';

    $result = mysqli_query($conn, $sql);

    $blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>