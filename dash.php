<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add your Motivation</title>
  <link rel="stylesheet" href="css/home.css" />
  <style>
    .reward__container input {
      margin-bottom: 17px;
      border-radius: 6px;
      padding: 6px;
    }

    .reward__container textarea {
      resize: none;
      border-radius: 6px;
      padding: 6px;
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
        echo '<li class="link"><a href="logout.php">Logout</a></li>';
      } else {
        echo '<li class="link"><a href="login.html">Signup</a></li>';
      }
      ?>
    </ul>
  </nav>
  <section class="section__container">
    <div class="reward__container">
      <p>Add your Motivation here</p>
      <input type="text" name="subject" placeholder="Subject" required />
      <br />
      <textarea name="message" rows="4" cols="50" placeholder="Enter your message" required></textarea><br />
      <button class="reward__btn">Submit</button>
    </div>
  </section>
  <section class="client">
    <div class="section__container client__container">
      <h2 class="section__header">Motivation From Our Users</h2>
      <div class="client__grid">
        <div class="client__card">
          <img src="assets/client-1.jpg" alt="client" />
          <p>
            The booking process was seamless, and the confirmation was
            instant. I highly recommend WDM&Co for hassle-free hotel bookings.
          </p>
        </div>
        <div class="client__card">
          <img src="assets/client-2.jpg" alt="client" />
          <p>
            The website provided detailed information about hotel, including
            amenities, photos, which helped me make an informed decision.
          </p>
        </div>
        <div class="client__card">
          <img src="assets/client-3.jpg" alt="client" />
          <p>
            I was able to book a room within minutes, and the hotel exceeded
            my expectations. I appreciate WDM&Co's efficiency and reliability.
          </p>
        </div>
      </div>
    </div>
  </section>
</body>

</html>