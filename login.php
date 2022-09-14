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
            
            $query = "SELECT * FROM Users where user_name = '$user_name' limit 1";

            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {   
                    $user_data= mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            
            }

            echo "Wrong username or password!";

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
        <h1>Become a member of<span> Vita</span>Gym</h1>

        <div class="login-container">

            <h2>Login</h2>
            <form method="post">

                <br>
                <label for="u_name">Username</label><br>
                <input type="text" id="u_name" name="user_name"><br><br>

                <label for="pass">Password</label><br>
                <input type="password" id="pass" name="password"><br><br>

                <input type="submit" value="Login">
            </form>
            <a href="signup.php" class='klasa'>Click to Signup</a>

        </div>      

    </body>

</html>