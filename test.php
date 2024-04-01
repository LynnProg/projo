<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: calc(100vh - 190px);
        }

        .dashboard {
            width: 80%;
            max-width: 1200px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        .dashboard h2 {
            text-align: center;
            margin-top: 0;
        }

        .form-container {
            text-align: center;
            margin-top: 20px;
        }

        .form-container input[type="text"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        /* motivation in grid */
        .motivations-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Grid layout with minimum item width of 200px */
            gap: 10px; /* Gap between grid items */
        }

        .motivation {
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
    </div>

    <div class="container">
        <div class="dashboard">
            <h2>Send Daily Academic Quote</h2>
            <div class="form-container">
                <form action="send_email.php" method="post" id="quoteForm">
                    <input type="text" name="subject" id="subjectInput" placeholder="Subject" required /><br />
                    <textarea name="message" id="messageInput" rows="4" cols="50" placeholder="Enter your message" required></textarea><br />
                    <input type="submit" value="Send Email" />
                </form>
            </div>
        </div>

        <div class="motivations-container" id="motivationsContainer">
            <h2>Sent Motivations by Users</h2><br>
            <?php
            // Include database connection and retrieve sent motivations
            include 'db_connection.php';

            $sql = "SELECT * FROM motivation_table";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="motivation" onclick="fillInputs(' . $row['id'] . ', \'' . $row['subject'] . '\', \'' . $row['message'] . '\')">';
                    echo '<strong>Subject:</strong> ' . $row['subject'] . '<br>';
                    echo '<strong>Message:</strong> ' . $row['message'] . '<br>';
                    echo '</div>';
                }
            } else {
                echo "No motivations found.";
            }

            // Close database connection
            $conn->close();
            ?>
        </div>
    </div>

    <script>
        function fillInputs(id, subject, message) {
            document.getElementById("subjectInput").value = subject;
            document.getElementById("messageInput").value = message;
        }
    </script>
</body>

</html>
