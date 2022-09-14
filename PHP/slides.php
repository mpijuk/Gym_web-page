<?php
require_once("dbAccess.php");


function getTableFromDb($table)
{
    $dbAccess = getDbAccess();
    return $dbAccess->executeQuery("SELECT * FROM $table;");
}

function generateSlidesHtml(){
    $html = "";
    $table_name= "Slides";

    $slides = getTableFromDb($table_name);

    foreach($slides as $slide){
        $id = $slide[0];
        $number = $slide[1];
        $imageUrl = $slide[2];
        $text = $slide[3];
        
        $html .= "<div class='mySlides fade' id='$id'>
                    <div class='numbertext'>$number</div>
                    <img src='$imageUrl' style='width:100% ; height:25%''>
                    <div class='text'>$text</div>
                  </div>";
    }

    return $html;
}

function generateTrainersCardHtml($user){
    $html = "";
    $table_name= "Trainers";

    $trainers = getTableFromDb($table_name);

    foreach($trainers as $trainer){
        $id = $trainer[0];
        $imagePath = $trainer[1];
        $name = $trainer[2];
        $spec = $trainer[3];
        
        $html .= "<div class='box' id='$id'>
                    <img src='$imagePath' alt=''>
                    <div class='content'>
                        <span>$spec</span><br>
                        <a>$name</a>
                    </div>
                    <div class='hire'>
                        <form action='PHP/getTrainer.php' method='post'> 
                            <input type='hidden' name='user' value='$user'>
                            <input type='hidden' name='train' value='$name'>
                            <input type='submit' name='submit' value='Hire'>
                        </form>
                    </div>
                </div>";
    }

    return $html;
}

