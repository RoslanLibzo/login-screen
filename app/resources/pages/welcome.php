<?php
session_name('loginSession'); 
session_start(); 

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /login"); // Redirect to login if not logged in
    exit;
}

// Logout logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session

    header("Location: /login"); // Redirect to login page after logout
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php if (isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == true){ echo $_SESSION['username']; }; ?>!</h1>
        <p>You are now logged in.</p>
        <p>HERE IS YOUR SECRET DATA!!!</p>
        <?php if (isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == true){
            echo "<h2> SECRET DATA MY FRIEND! Here you go.</h2>"; 
        } ?>

        <!-- Logout form -->
        <form action="/welcome" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>
</html>