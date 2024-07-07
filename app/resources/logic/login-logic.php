<?php
session_name('loginSession'); 
session_start();

// Check if the form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'config/db_config.php';

    // Retrieve username and password from the form
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Validate username and password
    if (empty($username) || empty($password)) {
        header("Location: /login?error=error");
        exit;
    }

    
    // Prepare a statement to query the database
    $stmt = $conn->prepare("SELECT id, username, password FROM user_info WHERE username = ?");
  
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();
    $stmt->store_result();

    // Check if a row was found
    if ($stmt->num_rows >= 1) {
        // Bind result variables
        $stmt->bind_result($id, $db_username, $db_password);
        $stmt->fetch(); 


        // Verify the password
        if (password_verify($password, $db_password)) {
            // Password correct, set session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            $_SESSION['logged_in'] = true;

            // Redirect to welcome page
            header("Location: /welcome");
            exit;
        } else {
            // Password incorrect, redirect back to login with error message
            header("Location: /login?error=invalid_pass");
            exit;
        }
    } else {
        // Username not found, redirect back to login with error message
        header("Location: /login?error=invalid_username");
        exit;
    }

    // Close statement
    $stmt->close();
} else {
    // If not a POST request, redirect back to login page
    header("Location: /login");
    exit;
}