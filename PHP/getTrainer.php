<?php

require_once("connection.php");


if(isset($_POST['submit']))
{

    if(!empty($_POST['user']) && !empty($_POST['train']))
    {
        $user = $_POST['user'];
        $trainer = $_POST['train'];

        $query1 = "SELECT (id) FROM Users WHERE user_name = '$user' Limit 1";
        $query2 = "SELECT (id_t) FROM Trainers WHERE trainerName = '$trainer' Limit 1";

        $res1 = mysqli_query($con,$query1);
        $res2 = mysqli_query($con,$query2);

        if($res1 && $res2)
        {
            $row1 = mysqli_fetch_assoc($res1);
            $row2 = mysqli_fetch_assoc($res2);

            $user_id = $row1['id'];
            $trainer_id = $row2['id_t'];

            $check_query = "SELECT * FROM Users_Trainers WHERE (id_user = '$user_id' AND id_trainer = '$trainer_id') Limit 1";
            $check_run = mysqli_query($con, $check_query);
            $row3 = mysqli_fetch_assoc($check_run);


            if(isset($row3['id_UT']))
            {
                header("Location: ../landingPages/alreadyHired.php");
                die;
            }
            else
            {

                $query3 = "INSERT INTO Users_Trainers (id_user, id_trainer) VALUES ('$user_id','$trainer_id')";

                $run = mysqli_query($con, $query3);

                if($run)
                {
                    header("Location: ../landingPages/hireTrainer.php");
                    die;
                }
                else
                {
                    echo "From is not submitted";
                }

            }
        }
        else
        {
            echo "Data is unavailable";
        }

    
    }
    else
    {
        echo "Try again later";
    }

}
