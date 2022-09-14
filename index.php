<?php

session_start();

    require_once("PHP/connection.php");
    require_once("PHP/functions.php");

    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel ="stylesheet" href="stylesheet/styleIndex.css">
    </head>
    <body>
        <header class="header">
            <div class="topnav" id="myTopnav">

                <div class="logo">               
                    <a href="#" id="vita"><span>Vita</span>Gym</a>
                    <a>welcome <span><?php echo $user_data['user_name']?></span></a>
                </div>

                <div class="navigation" id="nav">
		            <a id="menu-btn" class="fa fa-bars"></a>
                    <div class="links">
                        <a href="logout.php" class="top-botun"><i class="fa fa-sign-out"></i> Logout</a>
                        <a href="#contact-link" class="top-botun"><i class="fa fa-fw fa-envelope"></i> Contact</a>
                        <a href="#team-link" class="top-botun"><i class="fa fa-fire"></i> Team</a>
                        <a href="#about-link" class="top-botun"><i class="fa fa-fw fa-address-card"></i> About</a>
                        <a href="#slide" class="active top-botun"><i class="fa fa-fw fa-home"></i> Home</a>
                    </div>
                </div>
                
            </div>
        </header>

        <!-- Blok slideshow -->

        <div class="slideshow-container" id="slide">

            <?php 
                require_once("PHP/slides.php");
                echo(generateSlidesHtml());
            ?>
           
        </div>

        <!-- Blok about us -->

        <div class="about" id="about-link">
            
            <div class="about-title">
                <a>About us</a>
                <h3>Daily Workout and Stay Active at Home</h3>
            </div>
            <div class="about-column">
                <div class="column">
                    <p>You don't want just a gym membership. You want a membership that means something. And that means you need support, expert help and a community. Best Body Fitness isn't just a gym: it's a full-service fitness membership made for you. Here's how it works:</p>
                    <ul>
                        <li> <i class="fa fa-check-square"></i> How to Support your Immume System </li>
                        <li> <i class="fa fa-check-square"></i>A Guide to 30 Day Fitness & Workout Challenges</li>                            
                        <li> <i class="fa fa-check-square"></i>Guide To Ease Your Back In The Gym</li>
                        <li> <i class="fa fa-check-square"></i>The Mental Health Benefits of Exercise in Home</li>
                    </ul>
                </div>  
            
                <div class="column pic">
                    <img src="style_img/gym4.jpg" class="w-100" alt="">
                </div>
            </div>
        </div>

        <!-- Blok brojac stvari -->

        <section class="counter">

            <div class="count-container box-container">

                <div class="box">
                <h3>40+</h3>
                <p>online courses</p>
                </div>
        
                <div class="box">
                <h3>200+</h3>
                <p>gym equipments</p>
                </div>
        
                <div class="box">
                <h3>50+</h3>
                <p>online instructors</p>
                </div>
        
                <div class="box">
                <h3>500+</h3>
                <p>satiesfied clients</p>
                </div>
            </div>

        </section>

        <!-- Blok treneri  -->

        <section class="team" id="team-link">

            <div class="heading">
               <a>Our team</a>
               <h3>Get a trainer</h3>
            </div>
         
            <div class="team-container container">

                <?php 
                    require_once("PHP/slides.php");
                    echo(generateTrainersCardHtml($user_data['user_name']));
                ?>
         
            </div>
         
        </section>
        
        <!-- Blok contact us -->

        <div class="contact-container" id="contact-link">
            <h1 style="text-align: center;">Contact us</h1>
            <form action="PHP/feedback.php" method="post">
          
                <p>We can improve.</p>
                <p>Tell us how?</p><br>
                <input type="hidden" name="user" value="<?php echo $user_data['user_name']?>">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Your email..">
          
                <label for="feedback">Feedback</label>
                <textarea id="feedback" name="feedback" placeholder="Write something.." style="height:100px"></textarea>
          
                <input type="submit"  name="submit" value="Submit">
          
            </form>
        </div>

        <!-- Blok footer -->

        <section class="footer">

            <div class="box-container container">
        
                <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fa fa-phone"></i> +385-099-453-7900 </a><br>
                <a href="#"> <i class="fa fa-phone"></i> +111-222-3333 </a><br>
                <a href="#"> <i class="fa fa-envelope"></i> vita_gym@gmail.com </a><br>
                <a href="#"> <i class="fa fa-map"></i> Split 21000, Croatia </a>
                </div>
        
                <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fa fa-facebook-f"></i> facebook </a><br>
                <a href="#"> <i class="fa fa-twitter"></i> twitter </a><br>
                <a href="#"> <i class="fa fa-instagram"></i> instagram </a><br>
                <a href="#"> <i class="fa fa-linkedin"></i> linkedin </a>
                </div>
                    
            </div>
        
            <p class="credit" style="text-align: center;"> copyright <span>Vita</span>Gym | all rights reserved! </p>
        
        </section>
        
        <script type="text/javascript" src="javaScript/java.js"></script>

    </body>

</html>