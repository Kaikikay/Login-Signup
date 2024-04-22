<?php
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST")
{
  $mysqli = require __DIR__ . "/database.php";
  $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();

  if($user)
  {
    if(password_verify($_POST["password"], $user["password_hash"]))
    {
      session_start();
      session_regenerate_id();
      $_SESSION["user_id"] = $user["id"];
      header("Location: index.php");
      exit;
    }
  }
  $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"> <!-- Modern font -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4); /* Pinkish gradient for a soft look */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 10px; /* Subtle roundness for a smooth appearance */
            box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.2); /* Deep shadow for emphasis */
            padding: 40px; /* Extra padding for spacious design */
            width: 100%;
            max-width: 450px; /* Limiting max width for large screens */
            text-align: center;
            transition: box-shadow 0.3s ease-in-out; /* Smooth transition for hover effect */
        }

        .login-container:hover {
            box-shadow: 0px 25px 45px rgba(0, 0, 0, 0.3); /* Slightly increased shadow on hover */
        }

        h1 {
            color: #2c3e50; /* Deep color for heading */
            font-size: 2em; /* Larger font for title */
            margin-bottom: 20px; /* Reduced spacing for compact layout */
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px; /* Consistent padding */
            margin-bottom: 15px; /* Reduced margin */
            border: 1px solid #ddd; /* Soft gray for borders */
            border-radius: 8px;
            outline: none; /* Removing default focus border */
            transition: all 0.3s; /* Smooth transitions for hover */
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #ff6f61; /* Light coral border on focus */
            background-color: #fdf2f2; /* Very light pink on focus */
        }

        button {
            background-color: #ff6f61; /* Light coral for buttons */
            color: white;
            border: none;
            border-radius: 8px;
            padding: 15px; /* Consistent padding */
            font-size: 1.1em; /* Slightly larger font */
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
        }

        button:hover {
            background-color: #e53935; /* Darker coral on hover */
        }

        .error-message {
            color: #e74c3c; /* Red color for error message */
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        .signup-link {
            font-size: 1em;
            margin-top: 20px; /* Added spacing for better structure */
        }

        .signup-link a {
            color: #ff6f61; /* Light coral for links */
            text-decoration: none;
            transition: color 0.3s; /* Smooth transition */
        }

        .signup-link a:hover {
            color: #e53935; /* Darker coral on hover */
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>

        <?php if ($is_invalid) : ?>
            <p class="error-message">Invalid email or password</p>
        <?php endif; ?>

        <form method="post">
            <input autocomplete="off" type="email" placeholder="Email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            <input autocomplete="off" type="password" placeholder="Password" name="password">
            <button type="submit">Login</button>
        </form>

        <div class="signup-link">
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </div>
    </div>
</body>

</html>
