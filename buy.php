<?php
    include 'db_connect.php';
    $q1="SELECT mid,mname,descrip,man_date,exp_date,quantity,price,images FROM medicines";
    $res=mysqli_query($conn,$q1);
    $medicine=mysqli_fetch_all($res,MYSQLI_ASSOC); 
    // mysqli_free_result($res);
    // mysqli_close($conn);
    

?>
<html>
    <head>
    <link rel="stylesheet" href="buycss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
        <h1 style="text-align:center; font-size: 50px;">Our Medicines</h1>
<!-- Adding Medicines  -->

<div class="container">
    <div class="row">
        <?php foreach($res as $i): ?> 
                    <div class="card" style="width:400px;height:470px;margin-bottom:10px;margin-right: 15px;mpx;background-color:#f2f2f2;border-radius:30px;border:0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <?php echo "<img src='$i[images]' height='150px' width='350px' style='border-top-left-radius:20px;border-top-right-radius:20px;'>"; ?>
                        <div style="padding:10px;">
                        <h4 style="text-align:center;color:black; font-size:15px;"><?php echo "Medicine Name: ".htmlspecialchars($i['mname']);?></h4>
                        <div><?php echo "Description:".htmlspecialchars($i['descrip']);?></div>
                        <div><?php echo "Manufacture Date:".htmlspecialchars($i['man_date']);?></div>
                        <div><?php echo "Expiry date:".htmlspecialchars($i['exp_date']);?></div>
                        <div><?php echo "Quantity:".htmlspecialchars($i['quantity']);?></div>
                        <div><?php echo "Price:".htmlspecialchars($i['price']);?></div>
                        <hr>
                        <form action="cart.php" method="POST" enctype="multipart/form-data">
                            <div class="sub" style="text-align:center;font-size:20px;">
                                <input id="quan<?php echo $i['mid']?>" type="number" placeholder="Enter the Quantity" style="height:40px;width:250px;border-radius:3px;" name="quan">
                                <br><br>
                                <!-- <button  name="add_to_cart" style="cursor:pointer;margin-top:5px;height:30px;background-color:#0275d8;border-radius:5px;border:0;color:white;">Add to Cart</button> -->
                                <a id="link<?php echo $i['mid']?>" class="btn btn-info" href="details.php?mid=<?php echo $i['mid']?> " hidden>Add to Cart</a>
                                <a class="btn btn-info" onclick="clickLink(<?php echo $i['mid']?>);">Add to Cart</a>
                                <!-- <input type="hidden" name="mid" value="<?php echo $i['mid']?>">
                                <input type="hidden" name="quan" value="quan"> -->
                            </div>
                        </form>
                    </div>
                    </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- footer  -->
    <section class="footer">
    <h4>About US</h4>
        <p>Medinest - The one which gets you through the right </p>
        <p>Made with <i class="fa fa-heart"></i> by Medinest</p>
    </section>
</body>
</html>