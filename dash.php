<?php
session_start();

// Establish connection to the database
$servername = "localhost";
$username = "root"; // Assuming you are using default XAMPP username
$password = ""; // Assuming you have not set a password
$dbname = "motivation"; // Name of your database

$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//initialize variables to hold success message
$success_message = "";

//check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //retrieve motivation data from form
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  //prepare and execute SQL INSERT query
  $sql = "INSERT INTO motivation_table (subject, message) VALUES ('$subject', '$message')";

  if ($conn->query($sql) === TRUE) {
    $success_message = "Motivation added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
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

    .success_popup {
      display: none;
      position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      background-color: #4CAF50;
      color: white;
      text-align: center;
      padding: 10px 20px;
      z-index: 999;
      width: 100%;
      box-sizing: border-box;
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
      <form id="motivationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>Add your Motivation here</p>
        <input type="text" name="subject" placeholder="Subject" required />
        <br />
        <textarea name="message" rows="4" cols="50" placeholder="Enter your message" required></textarea><br />
        <button type="submit" class="reward__btn">Submit</button>
      </form>
    </div>

    <!-- Success Message popup -->
    <div id="successPopup" class="success_popup">
      <?php echo $success_message; ?>
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
  <!-- Script to show sucess message popup -->
  <script>
    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
      // Show the success message popup if form is submitted
      document.getElementById("motivationForm").addEventListener("submit", function(event) {
        // Prevent the form from submitting
        event.preventDefault();

        // Show the success message popup
        document.getElementById("successPopup").style.display = "block";

        // Hide the success message popup after 3 seconds
        setTimeout(function() {
          document.getElementById("successPopup").style.display = "none";
        }, 5000);

        // Submit the form after showing the success message
        document.getElementById("motivationForm").submit();
      });
    });
  </script>
  </script>
</body>

</html>