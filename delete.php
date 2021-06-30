<?php
    include 'db_connect.php';
    if(isset($_GET['mid'])){
        $id=$_GET['mid'];
        $sql="DELETE FROM cart WHERE mid='$id'";
        if(mysqli_query($conn,$sql)){
            echo "<script><alert>Deleted Successfully</alert></script>";
            header('Location: cart.php');
        }
        else{
            echo 'Query error1  : '.mysqli_error($conn);
        }
    }
    else{
        die('ID not provided');
    }

?>
