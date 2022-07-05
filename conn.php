<?php

    $hostname = '127.0.0.1';
    $username = 'root';
    $password = '';
    $DBname = 'formphp';
    
    $conn = mysqli_connect($hostname, $username, $password, $DBname);

    if (!$conn) {
        
        die('Connexion failed ' . mysqli_connect_error($conn));
    }
    
    
?>