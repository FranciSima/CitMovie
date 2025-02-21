<?php
    // $host = "127.0.0.1";
    $host = "db";
    $user = "root";                     
    $pass = "1234";                                  
    $db = "movietheatredb";
    $port = 3306;
     $con = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
?>