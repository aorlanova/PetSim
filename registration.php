<?php session_start();

function usernameExists($username, $userDatabase) {
    return isset($userDatabase[$username]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $petname = $_POST["petname"];

    $userDatabase = isset($_SESSION['userDatabase']) ? $_SESSION['userDatabase'] : [];
    $errorMsg = '';

    if (usernameExists($username, $userDatabase)) {
        $errorMsg = "<p class='error-message'>Username already exists. Please choose another one.</p>";
    } else {
        header("Location: registration-submit.php?username=$username&password=$password&name=$name&age=$age&petname=$petname");
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
                    <input type="text" name="petname" placeholder="Pet's Name" required>
                    <input type="submit" value="Register" name="login-button">
                </form>
                <?php echo $errorMsg;?>
                <a class="question-login" href="login.php">Have an account? Login</a>
            </div>
        </body>
    </head>
</html>