<?php
include 'db_connect.php';
    if(isset($_POST['signupsubmit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pwd = $_POST['pwd'];
        $cpwd = $_POST['cpwd'];
        $sql = "Select * from users where email = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result); 
        if($num == 0){
            if($pwd != $cpwd){
                // echo '<div class="alert alert-danger" role="alert">Password and Confirm password doesn\'t match!';
                echo '<script>alert("Password and Confirm password doesn\'t match!")</script>';
            }
            else{
                $sql = "Insert into users (fname,lname,phno,email,password) Values('$fname','$lname','$phone','$email','$pwd');";
                mysqli_query($conn, $sql);
                header("Location:Home.html");
                exit();
            }
        }
        else{
            echo '<div class="alert alert-danger" role="alert">You already have an account with us. Please login!<div>';
        }
    }
    if(isset($_POST['loginsubmit'])){
        $email = $_POST['lemail'];
        $pwd = $_POST['lpwd'];
        $sql = "Select * from users where email = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result); 
        $row = $result->fetch_assoc();
        if($num != 0){
            if($pwd != $row['password']){
                // echo '<div class="alert alert-danger" role="alert">Password is incorrect!';
                echo '<script>alert("Password is incorrect!")</script>';
            }
            else{
                header("Location:Home.html");
                exit();
            }
        }
        else{
            // echo '<div class="alert alert-danger" role="alert">You don\'t have an account with us. Please signup!<div>';
            echo '<script>alert("You don\'t have an account with us. Please signup!")</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <title>Medinest</title>
        <script>
            let start = 1;
            function toggle(){
                if(!start){
                    document.getElementById("loginform").style.display = "none";
                    document.getElementById("signupform").style.display = "block";
                    document.getElementsByClassName('login')[0].innerHTML = "Login";
                    document.getElementById('detail').innerHTML = "Already have an account? ";
                    start = 1;
                }
                else{
                    document.getElementById("signupform").style.display = "none";
                    document.getElementById("loginform").style.display = "block";
                    document.getElementsByClassName('login')[0].innerHTML = "Signup";
                    document.getElementById('detail').innerHTML = "Don't have an account? ";
                    start = 0;
                }
            }
        </script>
        <style>
        body{
            background-color: #088AB5;
            height: 100vh;
            padding: 7vh;
            padding-top:5vh;
        }
        .seconddiv{
            background-color: white;
            padding: 2vh;
        }
        .login{
            color: #4f74ea;
            font-weight: bold;
            cursor: pointer;
        }
        .signup{
            background-color: #088AB5;
            border: 0;
            border-radius: 5px;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
            color: white;
        }
        .firstdiv{
            background-image: url("images/medicines.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 90vh;
        }
        .form-group{
            margin-top:10px;
        }
        label{
            margin-bottom:5px;
        }
        nav img{
            width: 150px;
        }
        </style>
    </head>
    <body>
        <div class="row h-100">
                <div class="col-12 my-auto">
                <div class="row main shadow-lg">
                    <div class="col-6 firstdiv"></div>
                    <div class="col-6 seconddiv">
                        <div class="container formcontainer">
                            <br/><br/><br/><nav>
                                <a href="index.php"><img src="images/logo.png"></a>
                            <h3>Welcome to Medinest</h3>
                            </nav>
                            <p>The one which gets you through the right!</p>
                            <br/>
                            <p><span id="detail">Already have an account?</span> <span onclick="toggle();" class="login">Log in.</span></p>
                            <form method="POST" id="signupform" action="">
                                <div class="form-group row">
                                <div class="col-6">
                                    <label for="fname">First Name</label>
                                    <input class="form-control" type="text" name="fname" placeholder="Tom" required>
                                </div>
                                <div class="col-6">
                                    <label for="lname">Last Name</label>
                                    <input class="form-control" type="text" name="lname" placeholder="Crusie" required>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                    <label for="phone">Phone</label>
                                    <input class="form-control" type="number" name="phone"placeholder="9498675309" required>
                                    </div>
                                    <div class="col-6">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="cruise@gmail.com" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                    <label for="passwd">Password</label>
                                    <input class="form-control" type="password" name="pwd" placeholder="Password" required>
                                    </div>
                                    <div class="col">
                                    <label for="cpasswd">Confirm Password</label>
                                    <input class="form-control" type="password" name="cpwd" placeholder="ConfirmPassword" required>
                                    </div>
                                </div><br/>
                                <button type="submit" id="signupsubmit" name="signupsubmit" class="signup">Sign Up</button><br/><br/>
                            </form>
                            <form id="loginform" style="display: none;" method="POST">
                                <div class="form-group row">
                                    <div class="col-6">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="lemail" placeholder="cruise@gmail.com" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                    <label for="passwd">Password</label>
                                    <input class="form-control" type="password" name="lpwd" placeholder="Password" required>
                                    </div>
                                </div><br/>
                                <button type="submit" name="loginsubmit" class="signup">Login</button><br/><br/>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
    </body>
</html>