<?php
include 'db_connect.php';
if(isset($_POST['submit'])){
    $id=mysqli_real_escape_string($conn,$_GET['mid']);
    $s1="SELECT mid,mname,descrip,man_date,exp_date,price,images from medicines where mid=$id";
    $res=mysqli_query($conn,$s1);
    $medi=mysqli_fetch_assoc($res);
    mysqli_free_result($res);
    mysqli_close($conn);
}
if(isset($_GET['quan'])){
    $str=$_GET['quan'];
    $sql="SELECT mid,mname,descrip,man_date,exp_date,price,quantity,images from medicines where mname like '%$str%'";
    $res=mysqli_query($conn,$sql);
    $medi=mysqli_fetch_assoc($res);
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buycss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Search Page</title>
    <script>
        function clickLink(i){
            var id = "link"+i;
            var id1 = "quan"+i;
            var v = document.getElementById(id1).value;
            document.getElementById(id).href += "&quan="+v;
            document.getElementById(id).click();
        }
    </script>
</head>
<body class="body">
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
            <div class="search-btn">
                <form action="search.php" method="GET">
                    <input type="text" placeholder="Search...." name="quan" style="height:30px;border-radius:3px;">
                    <button type="submit" style="height:30px;border-radius:3px;"><a href="search.php?quan=quan"></a><i class="fa fa-search"></i></button>
                    
                </form>
            </div>
            <div class="nav-links">
                <ul>
                <li><a href="cart.php" class="btn btn-danger" style="border: 30px;border-radius:30px;">MyCart</a></li>
                </ul>
            </div>
        </nav>
<div class="container" style="display:block; align-items:inline;">
        <?php foreach($res as $medi): ?>
        <br>
        <div class="card" style="width:400px;height:520px;margin-bottom:10px;margin-left:15px;margin-right: 15px;mpx;background-color:#f2f2f2;border-radius:30px;border:0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        
            <?php echo "<img src='$medi[images]' height='150px' width='350px' style='border-top-left-radius:20px;border-top-right-radius:20px;margin-right:15px;margin-left:25px;'>"; ?>
            <div style="padding:10px;">
            <h4 style="text-align:center;color:black; font-size:15px;">Medicine Name: <?php echo htmlspecialchars($medi['mname']); ?></h4>
            <p>Description: <?php echo htmlspecialchars($medi['descrip']);?></p>
            <p><?php echo "Manufacture Date: ".htmlspecialchars($medi['man_date']);?></p>
            <p><?php echo "Expiry date: ".htmlspecialchars($medi['exp_date']);?></p>
            <p><?php echo "Quantity: ".htmlspecialchars($medi['quantity']);?></p>
            <p><?php echo "Price: ".htmlspecialchars($medi['price']);?></p>
            <hr>
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_add" value="<?php echo $medi['mid']?>">
                <input type="hidden" name="mname_to_add" value="<?php echo $medi['mname']?>">
                <input type="hidden" name="price_to_add" value="<?php echo $medi['price']?>">
                <input id="quan<?php echo $medi['mid']?>" type="number" placeholder="Enter the Quantity" style="text-align:center;margin-left:50px;height:40px;width:250px;border-radius:3px;" name="quan">
                <br><br>
                <!-- <button  name="add_to_cart" style="cursor:pointer;margin-top:5px;height:30px;background-color:#0275d8;border-radius:5px;border:0;color:white;">Add to Cart</button> -->
                <a id="link<?php echo $medi['mid']?>" class="btn btn-info" href="details.php?mid=<?php echo $medi['mid']?> " hidden>Add to Cart</a>
                <a class="btn btn-info" style="margin-left:125px;" onclick="clickLink(<?php echo $medi['mid']?>);">Add to Cart</a>

                <!-- <input type="hidden" name="quantity" value="quan"> -->
                <!-- <input type="submit" name="add" value="Add to Cart" class="btn btn-info" style="color:black;text-align:center;" > -->
                <br><br>
            </form>
            
        </div>
        <?php endforeach; ?>
    </div>
    <section class="footer">
    <h4>About US</h4>
        <p>Medinest - The one which gets you through the right </p>
        <p>Made with <i class="fa fa-heart"></i> by Medinest</p>
    </section>
</body>
</html>