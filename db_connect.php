<?php

$conn=mysqli_connect('localhost','root','','medinest');
//check
if(!$conn){
    echo 'Connection Error: '.mysqli_connect_error();
}

?>
