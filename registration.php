<?php
session_start();

// Function to check if the username already exists
function usernameExists($username, $userDatabase) {
    return isset($userDatabase[$username]);
}

// Example usage
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["password"];
    $name = $_POST["name"];

    // Simulate user database as an associative array
    $userDatabase = isset($_SESSION['userDatabase']) ? $_SESSION['userDatabase'] : [];

    // Check if the username already exists
    if (usernameExists($username, $userDatabase)) {
        echo "<p stlye='color'>Username already exists. Please choose another one.</p>";
    } else {
        // Redirect to the registration-submit.php file with the user data
        header("Location: registration-submit.php?username=$username&password=$password&name=$name");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/x-icon" href="images/dog-icon.png">
        <body>
            <div class="container">
                <h1>Register</h1>
                <form action="registration.php" method="post">
                    <input type="text" name="Username" placeholder="Username" maxlength="16" required>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="age" placeholder="Age" maxlength="2" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Register" name="login-button">
                </form>
            </div>
        </body>
    </head>
</html>