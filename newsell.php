<?php
    if(isset($_POST['submit'])){
        $conn=mysqli_connect('localhost','root','','medinest');

        $mname=mysqli_real_escape_string($conn,$_POST['mname']);
        $des=mysqli_real_escape_string($conn,$_POST['des']);
        $mfg=mysqli_real_escape_string($conn,$_POST['mdate']);
        $exp=mysqli_real_escape_string($conn,$_POST['edate']);
        $price=mysqli_real_escape_string($conn,$_POST['price']);
        $quantity=mysqli_real_escape_string($conn,$_POST['quantity']);
        $image=$_POST['image'];
        
        $sql="INSERT INTO medicines (mname,descrip,man_date,exp_date,price,quantity,images)
                VALUES ('$mname','$des','$mfg','$exp','$price','$quantity','$image');";
     
        // Update the table after user buy a medicine
        
        if(mysqli_query($conn,$sql)){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Thank you! Inserted Successfully!');
            window.location.href='buy.php';
            </script>");
        }
        else{
            echo 'Query error: '.mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="d1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sell Medicine</title>
    <style>
    body{
    background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url(images/bg2.jpg);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    input{
            width: 50%;
            border: 0;
            padding: 10px 10px 10px 25px;
            background: #eee;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande';
            font-size:15px;
            color:blue;
    }
    .main{
    color: white;
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    hr{
            width: 60%;
            color:grey;
            height:2px;
    }
    </style>
</head>
<body>
    <nav>
        <a href="Home.html"><img src="images/logo.png"></a>
        <div class="nav-links">
            <ul>
            <li><a href="Home.html">HOME</a></li>
            <li><a href="buy.php">BUY MEDICINES</a></li>
            <li><a href="newsell.php">SELL MEDICINE</a></li>
            <li><a href="contact.html">CONTACT</a></li>
            <li><a href="index.php">LOG OUT</a></li>
            </ul>
        </div>
    </nav>
    <div class="main" align='center'>
        <h1>Add Medicine</h1>
<form action="newsell.php" method="POST" enctype="multipart/form-data">
    <hr>
    <div>
        <h3>Name of the Medicine</h3>
        <input type="text" name="mname" placeholder="Medicine Name" required>
    </div>
    <div>
        <h3>Description of the Medicine</h3>
        <input type="text" name="des" placeholder="Description" required>
    </div>
    <div>
        <h3>Manufacture Date of the Medicine</h3>
        <input type="date" name="mdate" placeholder="Manufacture Date" required>
    </div>
    <div>
        <h3>Expiry Date of the Medicine</h3>
        <input type="date" name="edate" placeholder="Expiry Date" required>
    </div>
    <div>
        <h3>Price of the Medicine</h3>
        <input type="number" name="price" placeholder="Price" required>
    </div>
    <div>
        <h3>Quantity of the Medicine</h3>
        <input type="number" name="quantity" placeholder="Quantity" required>
    </div>

    <div>
        <h3>Image link</h3>
        <input type="text" name="image" placeholder="Enter the link of the image" required>
    </div>
    <br>
    <div><input type="submit" name="submit" value="Submit"></div> 
    <br>
    <hr>
</form>
    </div>
<!-- footer -->
<section class="footer">
    <h4>About US</h4>
    <p>Medinest - The one which gets you through the right </p>
    <p>Made with <i class="fa fa-heart"></i> by Medinest</p>
</section>
</body>
</html>