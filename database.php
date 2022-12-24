<?php
    $url='127.0.0.1:3306';
    $username='root';
    $password='Chabyka123$';
    $conn=mysqli_connect($url,$username,$password,"assignment");
    if(!$conn){
    die('Could not Connect My Sql:');
    }
?>
