<?php
session_start();
$userDatabase = isset($_SESSION['userDatabase']) ? $_SESSION['userDatabase'] : [];
$currentUsername = isset($_SESSION['currentUser']) ? $_SESSION['currentUser'] : '';

// Add fake users
$userDatabase['Randy'] = ['points' => 500];
$userDatabase['Mikey'] = ['points' => 800];
$userDatabase['Ronald'] = ['points' => 430];
$userDatabase['Arnold'] = ['points' => 690];
$userDatabase['Hubert'] = ['points' => 185];
$userDatabase['Granny'] = ['points' => 660];

$combinedData = [];
foreach ($userDatabase as $user => $userData){
    $combinedData[$user] = isset($userData['points']) ? $userData['points'] : 0;
}

$combinedData[$currentUsername] = isset($userDatabase[$currentUsername]['points']) ? $userDatabase[$currentUsername]['points'] : 0;

// Display the leaderboard
function displayLeaderboard() {
    global $userDatabase, $currentUsername, $combinedData; // Access global variables

    arsort($combinedData); // Sort the array 

    echo "<ul>";
    foreach ($combinedData as $user => $points) {
        $highlightClass = ($user === $currentUsername) ? 'current-user' : '';

     echo "<li class ='$highlightClass'>{$user} = {$points} points</li>";
    }
    echo "</ul>";
}
?>
