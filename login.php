<?php
// Start the session (if not already started)
session_start();

// Function to securely hash a password using bcrypt
function hashPassword($password) {
    $options = [
        'cost' => 12, // Adjust the cost according to your server's capabilities
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

// Function to verify a user's credentials
function loginUser($username, $password, $userDatabase) {
    // Check if the username exists in the array
    if (isset($userDatabase[$username])) {
        // Verify the entered password against the stored hashed password
        if (password_verify($password, $userDatabase[$username])) {
            echo "Login successful!";
            // Additional actions upon successful login
            $_SESSION['Username'] = $username;
        } else {
            echo "Stored Password: " . $userDatabase[$username] . "<br>";
            echo "Entered Password: " . $password . "<br>";
            echo "Incorrect password. Please try again.";
        }
        
    } else {
        echo "Username not found. Please register first.";
    }
}

// Example usage
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from a login form or another source
    $username = $_POST["Username"];
    $password = $_POST["password"];

    // Validate input (you may want to add more validation)
    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Simulate user database as an associative array
        $userDatabase = isset($_SESSION['userDatabase']) ? $_SESSION['userDatabase'] : [];

        // Login the user
        loginUser($username, $password, $userDatabase);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <body>
            <div class="container">
                <h1>Login</h1>
                <form action="" method="post">
                    <input type="text" name="Username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" value="Login" name="login-button">
                </form>
                <a class="question" href="registration.php">Don't have an account? Register</a>
            </div>
        </body>
    </head>
</html>