<?php session_start();

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
            'score' => 0
        ];
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $age = $_GET['age'];
    $petname = $_GET['petname'];
    $name = $_GET['name'];

    $userDatabase = isset($_SESSION['userDatabase']) ? $_SESSION['userDatabase'] : [];

    registerUser($username, $password, $userDatabase, $age, $petname, $name);
    // var_dump($userDatabase);
    $_SESSION['userDatabase'] = $userDatabase;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="proj2-img/dog-icon.png">
</head>
<body>
<div class="container">
    <h1>Thank you!</h1>
    <p>Welcome to PetLands, <?php echo $_GET['name']; ?>!</p>
    <p>Now <a href="login.php">log in to play with your pet!</a></p>
</div>
</body>  
</html>
