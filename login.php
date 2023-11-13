<?php
// Start the session (if not already started)
session_start();

$userDatabase = isset($_SESSION['userDatabase']) ? $_SESSION['userDatabase'] : [];

// Function to verify a user's credentials
function loginUser($username, $password, $userDatabase) {
    // Check if the username exists in the array
    if (isset($userDatabase[$username])) {
        // Verify the entered password against the stored hashed password
        if (password_verify($password, $userDatabase[$username]['password'])) {
            echo "Login successful!";
            // Additional actions upon successful login
            $_SESSION['Username'] = $username;
        } else {
            print "<p style='color: red'>Incorrect password. Please try again.</p>";
        }
    } else {
        echo "<p style='color: red'>Username not found. Please register first.</p>";
    }
}

// Example usage
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from a login form or another source
    $username = $_POST["Username"];
    $password = $_POST["password"];
        
    loginUser($username, $password, $userDatabase);
    }
?> 


<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/x-icon" href="images/dog-icon.png">
        <body>
            <h1 class="header">Welcome to PetLand!</h1>
            <div class="container">
                <h1>Enter Login to see your pet!</h1>
                <form action="" method="post">
                    <input type="text" name="Username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Go to Pet" name="login-button">
                </form>
                <a class="question" href="registration.php">Don't have an account? Register</a>
            </div>
        </body>
    </head>
</html>