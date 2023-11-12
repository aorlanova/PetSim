<?php session_start();

function hashPassword($password){
    $options = [
        'cost' => 12,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

function registerUser($username, $password, &$userDatabase){
    if(isset($userDatabase[$username])){
        echo "Username already exists. Please choose another one.";
    }
    else{
        $hashedPassword = hashPassword($password);

        $userDatabase[$username] = $hashedPassword;
        echo "Registration successful!". $password;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    $userDatabase = [];

    registerUser($username, $password, $userDatabase);
}

$_SESSION['userDatabase'] = $userDatabase;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <h1>Thank you!</h1>
    <p>Welcome to PetLands, <?php echo $_POST['name']; ?>!</p>
    <p>Now <a href="login.php">log in to play with your pet!</a></p>
</div>
</body>  
</html>
