<?php session_start();

$userDatabase = isset($_SESSION['userDatabase']) ? $_SESSION['userDatabase'] : [];
$errorMsg = '';

function loginUser($username, $password, $userDatabase, &$errorMsg) {
    
    if (isset($userDatabase[$username])) {
       
        if (password_verify($password, $userDatabase[$username]['password'])) {
            header("Location:pet.html");
           
            $_SESSION['Username'] = $username;
        } else {
            $errorMsg = "<p class='error-message'>Incorrect password. Please try again.</p>";
        }
    } else {
        $errorMsg = "<p class='error-message'>Username not found. Please register first.</p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["password"];
        
    loginUser($username, $password, $userDatabase, $errorMsg);
    }
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/x-icon" href="proj2-img/dog-icon.png">
        <body>
            <h1 class="header">Welcome to PetLand!</h1>
            <div class="container">
                <h1>Enter Login to see your pet!</h1>
                <form action="" method="post">
                    <input type="text" name="Username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Go to Pet" name="login-button">
                </form>
                <?php echo $errorMsg;?>
                <a class="question" href="registration.php">Don't have an account? Register</a>
            </div>
        </body>
    </head>
</html>