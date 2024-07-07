<?php
// Check if there's an error parameter in the URL
$error = isset($_GET['error']) ? $_GET['error'] : '';

// Display error message if invalid credentials
if ($error === 'invalid_credentials') {
    echo '<p style="color: red;">Invalid username or password. Please try again.</p>';
}
;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div class="app">
        <h1 class="title">Here is the Login</h1>
        <form action="/login/access" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>

        </div>
    </div>
</body>
</html>
<h1>HELLO!</h1>