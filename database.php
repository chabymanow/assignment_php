<?php
$url='127.0.0.1:3306';
$username='root';
$password='Chabyka123$';
$conn=mysqli_connect($url,$username,$password,"college_data");
if(!$conn){
 die('Could not Connect My Sql:');
}
?>
