<?php

session_start();

    require_once("PHP/connection.php");
    require_once("PHP/functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            $check_query = "SELECT * FROM Users WHERE user_name = '$user_name'";
            $check_run = mysqli_query($con, $check_query);
            $check_res = mysqli_fetch_assoc($check_run);

            if(isset($check_res['user_name']))
            {
                echo "This username is already in use";
            }
            else
            {
                $user_id = random_number(20);
                $query = "INSERT INTO Users (user_id,user_name, password) VALUES ('$user_id','$user_name', '$password')";

                mysqli_query($con, $query);

                header("Location: login.php");
                die;
            }
        }
        else
        {
            echo "Please enter valid information!";
        }
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel ="stylesheet" href="stylesheet/style_login_signup.css">
    </head>

    <body>
        <h1>Signup to <span>Vita</span>Gym in a few seconds</h1>

        <div class="login-container">
            
            <h2>Signup</h2>
            <form method="post">

                <br>
                <label for="u_name">Username</label><br>
                <input type="text" id="u_name" name="user_name"><br><br>

                <label for="pass">Password</label><br>
                <input type="password" id="pass" name="password"><br><br>

                <input type="submit" value="Signup">
                
            </form>
            <a href="login.php" class='klasa'>Click to login</a>

        </div>


    </body>

</html>