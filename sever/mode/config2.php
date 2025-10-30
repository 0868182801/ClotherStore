<?php
$conn = mysqli_connect("localhost" , "root" , "" , "webquanao");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>