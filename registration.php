<?php session_start();
$userDatabase = isset($_SESSION['userDatabase']) ? $_SESSION['userDatabase'] : [];

function usernameExists($username, $userDatabase) {
    return isset($userDatabase[$username]);
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
}

function registerUser($username, $password, &$userDatabase, $age, $petname, $name) { 
    $hashedPassword = hashPassword($password);
    $userDatabase[$username] = [
        'password' => $hashedPassword, 
        'age' => $age, 
        'petname' => $petname, 
        'name' => $name,
        'points' => 0
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $petname = $_POST["petname"];
    $errorMsg = '';

    if (usernameExists($username, $userDatabase)) {
        $errorMsg = "<p class='error-message'>Username already exists. Please choose another one.</p>";
       
    } else {
        registerUser($username, $password, $userDatabase, $age, $petname, $name);
        $_SESSION['userDatabase'] = $userDatabase;
        header("Location: registration-submit.php?name=$name");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/x-icon" href="proj2-img/dog-icon.png">
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