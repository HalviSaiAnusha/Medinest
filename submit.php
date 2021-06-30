<?php
    if(isset($_POST['submit'])){
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Thank you!, Visit again :)');
            window.location.href='index.php';
            </script>");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Submission Page</title>
    <style>
        body {
            margin:30px;
            font-size:35px;
            background-position: center;
            background-size: cover;
            position: relative;
            color:white;
            text-align:center;
            background-color:rgb(235, 225, 192);
            background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url("https://png.pngtree.com/thumb_back/fh260/background/20190221/ourmid/pngtree-computer-alipay-online-payment-information-image_19032.jpg");
        }
        label {
            display:block;
            margin-bottom:4px;
            position: relative; 
            padding-left:25px; 
            cursor: pointer;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        input[type=radio] {
            border: 0px;
            width: 100%;
            height: 2em;
        }
        input[type=submit]{
            width: 50%;
            border: 0;
            padding: 10px 10px 10px 25px;
            background: #eee;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size:25px;
        }
        form{
            border: 2px;
            background-color: rgb(235, 192, 192);
            color: black;
            margin-left: 250px;
            margin-right: 250px;
        }
        h1{
            font-family: Georgia, 'Times New Roman', Times, serif;
            color: rgb(235, 225, 192);
        }
    </style>
</head>
<body>
    <h1>Choose a method of Payment?</h1>
<form action="submit.php" method="POST">
    <br>
    <label>
        <input type="radio" name="pay" />UPI
      </label>
      <br>
    <label>
    <input type="radio" name="pay" checked/>Net Banking
    </label>
    <br>
    <label>
    <input type="radio" name="pay" />Credit/ Debit Cards
    </label>
    <br>
    <label>
        <input type="radio" name="pay" />Cash on Delivery
    </label>
    <br>
    <label>
        <input type="submit" name="submit" value="Submit">
    </label>
    <br>
</form>
    <section class="footer">
        <h4>About US</h4>
            <p>Medinest - The one which gets you through the right </p>
            <p>Made with <i class="fa fa-heart"></i> by Medinest</p>
        </section>
</body>
</html>