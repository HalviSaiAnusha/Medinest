<?php
    include 'db_connect.php';
    $sq="SELECT sum(price) as TOTAL_PRICE from cart";
    $r=mysqli_query($conn,$sq);
    $sql="SELECT mid,mname,quantity,price from cart";
    $res=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="buycss.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body{
            background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url("https://image.freepik.com/free-photo/medicines-pills-shopping-cart-blue-background-drug-delivery-copy-space_91769-341.jpg");
            background-position: center;
            background-size: cover;
            position: relative;
            color:white;
            text-align:center;
        }
        .contain{
            text-align:center;
            border-radius:20px;
            color:black;
            width: 500px;
            height:auto;
            font-size: 25px;
            margin: 15px;
            background-color:#fff;
        }
        table{
            border-collapse:collapse;
            width:75%;
            color:#588c7e;
            font-family:monospace;
            font-size:25px;
            text-align:center;
            margin-left:200px;
            border:5px solid white;
        }
        th{
            background-color:#588c7e;
            color:white;
            border:3px solid white;
            /* text-align:center; */
        }
        tr{
            background-color:#f2f2f2;
            border:3px solid white;
            /* text-align:right; */
        }
        td{
            border:3px solid white;
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
                <!-- <li><a href="newsell.php">SELL MEDICINE</a></li> -->
                <li><a href="contact.html">CONTACT</a></li>
                <li><a href="index.php">LOG OUT</a></li>
                </ul>
            </div>
        </nav>
        <br>
        <h1 align="center">Items in the Cart</h1>
        <form action="cart.php" method="POST">
        <table>
        <tr>
            <th>Medicine Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php
            if($res->num_rows>0){   
                while($row=mysqli_fetch_assoc($res)){
                    echo "<tr>";
                    echo "<td>".$row['mname']."</td>";
                    echo "<td>".$row['quantity']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>";
                    echo "<div class='btn-grp'>";
                    echo "<a href='delete.php?mid=".$row['mid']."' class='btn btn-danger'>Delete</a>";
                    echo "</div>";
                    echo "</td>";
                    echo "<tr>";
                }
                while($roww=mysqli_fetch_assoc($r)){
                    echo "<tr>";

                    echo "<td colspan=2 text-align:right;>"."Total Price: "."</td>";
                    echo "<td>".$roww['TOTAL_PRICE']."</td>";
                    echo "<td> <a href='submit.php' class='btn btn-success'>Proceed to Buy</a>";
                    echo "</tr>";
                    // $output="Total Price: ".$row['TOTAL_PRICE']
                }
                echo "</table>";
            }
            else{
                echo "<script><alert>No values in the table</alert></script>";
            }
            $conn->close();
        ?>
        </table>
        </form>
<!-- footer  -->
<section class="footer">
    <h4>About US</h4>
        <p>Medinest - The one which gets you through the right </p>
        <p>Made with <i class="fa fa-heart"></i> by Medinest</p>
    </section>
</body>
</html>