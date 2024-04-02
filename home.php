<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/home.css" />
  <title>Academic and Career Motivation</title>
  <style>
    #card1 {
      background-color: #d4b4ff;
    }

    #card2 {
      background-color: #6c9ba6;
    }

    #card3 {
      background-color: #57a51b;
    }

    #card4 {
      background-color: #836d0a;
    }

    #card5 {
      background-color: #ffa99f;
    }

    #card6 {
      background-color: #f75c79;
    }

    html {
      scroll-behavior: smooth;
    }
  </style>

</head>

<body>
  <nav>
    <div class="nav__logo">AspirePath</div>
    <ul class="nav__links">
      <li class="link"><a href="home.php">Home</a></li>
      <li class="link"><a href="home.php#quotes">Motivation</a></li>
      <li class="link"><a href="contact.html">Contact Us</a></li>
      <!-- <li class="link"><a href="login.html">Signup</a></li> -->
      <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo '<li class="link"><a href="dash.php">Add Quote</a></li>';
        echo '<li class="link"><a href="logout.php">Logout</a></li>';
      } else {
        echo '<li class="link"><a href="login.html">Signup</a></li>';
      }
      ?>
    </ul>
  </nav>
  <header class="section__container header__container">
    <div class="header__image__container">
      <div class="header__content">
        <h1>Daily Academic and Career Motivation</h1>
        <p>
          Stay inspired with daily quotes and insights to fuel your academic
          and career journey.
        </p>
        <p style="margin-top: 48px;">fill in the form below to get daily quotes</p>
      </div>
      <div class="booking__container">
        <form action="insert.php" method="post">
          <div class="form__group">
            <div class="input__group">
              <input type="text" name="firstname" required />
              <label>Firstname</label>
            </div>
            <p>What's your first name?</p>
          </div>
          <div class="form__group">
            <div class="input__group">
              <input type="text" name="lastname" required />
              <label>Lastname</label>
            </div>
            <p>What's your second name?</p>
          </div>
          <div class="form__group">
            <div class="input__group">
              <input type="email" name="email" id="emailInput" required />
              <label>Email address</label>
            </div>
            <p>Add your email</p>

          </div>
          <button class="btn" type="submit"><i class="ri-arrow-right-line"></i></button>
        </form>
      </div>
    </div>
  </header>

  <section class="section__container popular__container">
    <h2 class="section__header" id="quotes">Popular Quotes</h2>
    <div class="popular__grid">
      <div class="popular__card" id="card1">
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>Theodore Roosevelt</h4>
          </div>
          <p>"Believe you can and you're halfway there."</p>
        </div>
      </div>
      <div class="popular__card" id="card2">
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>Confucius</h4>
          </div>
          <p>"It does not matter how slowly you go as long as you do not stop"</p>
        </div>
      </div>
      <div class="popular__card" id="card3">
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>Katharine Whitehorn</h4>
          </div>
          <p>"Find out what you like doing best, and get someone to pay you for doing it.."</p>
        </div>
      </div>
      <div class="popular__card" id="card4">
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>Alice Walker</h4>
          </div>
          <p>"The most common way people give up their power is by thinking they don’t have any."</p>
        </div>
      </div>
      <div class="popular__card" id="card5">
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>Theodore Roosevelt</h4>
          </div>
          <p>"Believe you can and you're halfway there."</p>
        </div>
      </div>
      <div class="popular__card" id="card6">
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>Theodore Roosevelt</h4>
          </div>
          <p>"Believe you can and you're halfway there."</p>
        </div>
      </div>
    </div>
  </section>

  <section class="client">
    <div class="section__container client__container">
      <h2 class="section__header">Motivation From Our Users</h2>
      <div class="client__grid">
        <div class="client__card">
          <img src="assets/client-1.jpg" alt="client" />
          <p>
            Using AspirePath was a breeze, and getting motivated every day was instant. I highly recommend AspirePath for a hassle-free journey towards self-improvement.
          </p>
        </div>
        <div class="client__card">
          <img src="assets/client-2.jpg" alt="client" />
          <p>
            Navigating through AspirePath was smooth, and the daily motivational content was instantly uplifting. I highly recommend AspirePath for a seamless experience on your path to personal growth.
          </p>
        </div>
        <div class="client__card">
          <img src="assets/client-3.jpg" alt="client" />
          <p>
            AspirePath provided me with an effortless way to stay motivated daily, and the inspiration was immediate. I highly recommend AspirePath for a user-friendly journey towards achieving your goals.
          </p>
        </div>
      </div>
    </div>
  </section>


  <footer class="footer">
    <div class="section__container footer__container">
      <div class="footer__col">
        <h3>AspirePath</h3>
        <p>
          AspirePath is your daily source of motivation, empowering you with positivity and actionable insights to reach your goals. Join us on the path to success.
        </p>
        <p>
          With a user-friendly interface, AspirePath makes accessing daily motivation effortless. Join us as we inspire and guide you on your journey to success. </p>
      </div>
      <div class="footer__col">
        <h4>Quick Links</h4>
        <p>Signup</p>
        <p>Contact Us</p>
        <p>Add Your Motivation</p>
      </div>
    </div>
    <div class="footer__bar">
      Copyright © 2024 AspirePath. All rights reserved.
    </div>
  </footer>
</body>

</html>