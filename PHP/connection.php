<?php

    $dbhost = "localhost";
    $dbuser = "PijukM";
    $dbpass = "PZI_PijukM1";
    $dbname = "PijukM";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
    {
        die("Failed to connect!");
    }
    
