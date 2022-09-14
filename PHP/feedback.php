<?php

require_once("connection.php");


if(isset($_POST['submit']))
{

    if(!empty($_POST['email']) && !empty($_POST['feedback']))
    {
        $name = $_POST['user'];
        $email = $_POST['email'];
        $feedback = $_POST['feedback'];

        $query1 = "SELECT (id) FROM Users WHERE user_name = '$name' Limit 1";

        $res = mysqli_query($con,$query1);
        $row = mysqli_fetch_assoc($res);
        $user_id = $row['id'];

        $query2 = "INSERT INTO Feedback (id_user, user_email, feedback) VALUES ('$user_id','$email','$feedback')";
        
        $run = mysqli_query($con, $query2);

        if($run)
        {
            header("Location: ../landingPages/thanks.php");
            die;
        }
        else
        {
            echo "From is not submitted";
        }
    
    }
    else
    {
        echo "All fields required";
    }

}


