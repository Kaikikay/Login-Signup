<?php

session_start();
// print_r($_SESSION);

if(isset($_SESSION["user_id"]))
{
  $mysqli = require __DIR__ . "/database.php";
  $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"> <!-- Clean sans-serif font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- FontAwesome for icons -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0; /* Light background for a softer appearance */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%; /* Responsive design for various screen sizes */
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 10px; /* Subtle roundness for modern look */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
            padding: 30px; /* Reduced padding for cleaner design */
            text-align: center;
            transition: box-shadow 0.3s; /* Smooth transition for hover effects */
        }

        .container:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
        }

        h1 {
            color: #333; /* Neutral color for headings */
            font-weight: 600;
            margin-bottom: 20px; /* Reduced spacing for compact design */
            font-size: 1.8em; /* Slightly smaller heading */
        }

        p {
            font-size: 1em;
            color: #555; /* Neutral text color */
            margin-bottom: 20px;
        }

        a {
            color: #ff6f61; /* Coral color for links */
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s; /* Smooth transition for hover effects */
        }

        a:hover {
            color: #e53935; /* Darker coral on hover */
        }

        .btn {
            background-color: #ff6f61; /* Coral background for buttons */
            color: white;
            border: none;
            border-radius: 5px; /* Subtle roundness */
            padding: 10px 20px; /* Smaller padding for cleaner design */
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
        }

        .btn:hover {
            background-color: #e53935; /* Darker coral on hover */
        }

        .decorative-line {
            background: linear-gradient(to right, #ff9a9e, #fad0c4); /* Pink gradient for decorative line */
            height: 2px;
            border-radius: 2px;
            margin: 15px 0; /* Reduced margin for compact design */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Our Website!</h1>

        <?php if (isset($user)): ?>
            <p>Hello, <?= htmlspecialchars($user["username"]); ?>. You are now logged in.</p>
            <button class="btn"><a href="logout.php" style="color: white;">Logout</a></button>
        <?php else: ?>
            <p>
                <a href="login.php">Login</a> or <a href="signup.php">Sign up</a>
            </p>
        <?php endif; ?>

        <div class="decorative-line"></div> <!-- Decorative line for visual separation -->
    </div>
</body>
</html>
