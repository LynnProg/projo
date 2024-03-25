<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Academic Motivation</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/home.css" />
</head>
<body>
    <nav>
        <div class="nav_logo">
            <a href="#"><img src="images/motivation.png" alt="logo"/></a>
            <span class="logo-name"><a href="#">AcademicIQ</a></span>
        </div>
        <ul class="nav__links">
            <li class="link"><a href="#">Home</a></li>
            <li class="link"><a href="motivation.html">Motivation</a></li>
            <li class="link"><a href="about.html">About</a></li>
            <li class="link"><a href="contact.html">Contact Us</a></li>
        </ul>
    </nav>

    <section class="welcome">
        <h2>Step into the World of Academic Empowerment</h2>
        <p>Get your daily dose of motivation to excel in your academic journey.</p>
        <div class="message">
            <p>"Believe you can and you're halfway there." - Theodore Roosevelt</p>
        </div>
        <p>We're here to support you in your academic endeavors. Whether you need daily motivation, guidance, or a supportive community, AcademicIQ has got you covered.</p>
        <p>Start your journey with us today!</p>
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo '<a class="btn" href="motivation.html">WELCOME ALL TO AcademicIQ</a>';
        } else {
            echo '<a class="btn" href="login.html">WELCOME ALL TO AcademicIQ</a>';
        }
        ?>
    </section>
</body>
</html>
