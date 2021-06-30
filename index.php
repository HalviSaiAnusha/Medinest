<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://css.gg/ericsson.css' rel='stylesheet'>
</head>
<body>
    <section class="header">
    <nav>
            <a href="index.php"><img src="images/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="glyphicon glyphicon-remove" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>
            </div>
            <i class="gg-ericsson" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
        <h1>MEDINEST</h1>
        <p>The one which gets you through the right</p>
         <a href="login.php" class="hero-btn">Visit us to know more</a>
    </div>
    </section>
<!-- Homepage -->
    <section class="home">
        <h1>Services We Provide</h1>
        <p>The pandemic has changed the life style of every individual around the world. <br> It has taught us some many lessons to be strong, 
            united and safe with good health. Money can never buy happiness without a good health we can’t sustain our life.
             </p>
        <div class="row">
            <div class="home-col">
                <h3>You can Buy Medicines</h3>
                <p>The main problem we are facing these days in this pandemic is lack of medical supply, 
                there are lots and lots of people dying around us due to lack of Medicines as the cases are increasing day by day. 
                The medicines are not been used in a proper way. <br> <b> Here You can buy them safely.</b></p>
            </div>
            <div class="home-img">
                <img src="images/Hands.jpg">
            </div>
            <div class="home-col">
                <h3>You can Sell Medicines</h3>
                <p>Medicines which are there in the house and are of no use you can sell them to anyone directly from your home. With all the nessesary pecautions.
                In this way the medicines will not be wasted as well as they we be helpful to one another. <br><b> Here You can sell them safely and help others in need.</b></p>
            </div>
        </div>
    </section>
<!-- Footer -->
    <section class="footer">
        <h4>About US</h4>
        <p>Medinest - The one which gets you through the right </p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-linkedin"></i>
            <i class="fa fa-instagram"></i>
        </div>
        <p>Made with <i class="fa fa-heart-o"></i> by Easy Tutorial</p>
    </section>
    <!-- JavaScript for Toggle Menu -->
    <script>
        var navLinks=document.getElementById("navLinks")
        function showMenu(){
            navLinks.style.right="0";
        }
        function hideMenu(){
            navLinks.style.right="-200px";
        }
    </script>
    
</body>
</html>