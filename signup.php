<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"> <!-- Modern font -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4); /* Pinkish gradient for a soft look */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            position: relative;
            text-align: center;
            transition: box-shadow 0.3s; /* Smooth transition for hover effect */
        }

        .container:hover {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2); /* Increased shadow on hover */
        }

        h1 {
            text-align: center;
            color: #2c3e50; /* Dark gray for titles */
            margin-bottom: 30px;
            font-size: 28px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f9f9f9;
            outline: none;
            transition: all 0.3s; /* Smooth transitions */
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #e57373; /* Light red border on focus */
            background-color: #fff; /* Lighter background on focus */
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #ff6f61; /* Light coral for buttons */
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e53935; /* Darker coral on hover */
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #2c3e50; /* Dark gray */
        }

        .signup-link a {
            color: #e57373; /* Light red for links */
            text-decoration: none;
            transition: color 0.3s;
        }

        .signup-link a:hover {
            color: #e53935; /* Darker red on hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Create an Account</h1>
        <form action="process_signup.php" method="POST" novalidate>
            <input autocomplete="off" type="text" placeholder="Username" name="username" required>
            <input autocomplete="off" type="email" placeholder="Email Address" name="email" required>
            <input autocomplete="off" type="password" placeholder="Create a Password" id="password" name="password" required>
            <input autocomplete="off" type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Sign Up</button>
        </form>
        <div class="signup-link">Already have an account? <a href="login.php">Log in</a></div>
    </div>
</body>

</html>
