<?php
    include 'db_connect.php';
    if(isset($_GET['mid'])&& isset($_GET['quan'])){
        $id=mysqli_real_escape_string($conn,$_GET['mid']);
        $quan=$_GET['quan'];
        $s1="SELECT mid,mname,descrip,man_date,exp_date,quantity,price from medicines where mid=$id";
        $res=mysqli_query($conn,$s1);
        $medi=mysqli_fetch_assoc($res);
        $mname=$medi['mname'];
        $price=$medi['price'];
        $price_to_add=$quan*$price;
        $orginalquan=$medi['quantity'];
        if($orginalquan>$quan){
            $s2="INSERT INTO cart(mid,mname,quantity,price) VALUES('$id','$mname','$quan','$price_to_add')";
            if(mysqli_query($conn,$s2)){
                    //sucess
                    $newquan=$orginalquan-$quan;
                    // echo $newquan;
                    $s3="UPDATE `medicines` SET `quantity`='$newquan' WHERE mid=$id";
                    mysqli_query($conn,$s3);
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Added Successfully!');
                    window.location.href='buy.php';
                    </script>");
            }
        }
        else{
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Sorry, Out of Stock! Check the quantity present and purchase :)');
                    window.location.href='buy.php';
                    </script>");
        }   
    }
    else{
        echo 'Query error: '.mysqli_error($conn);
    }
?>