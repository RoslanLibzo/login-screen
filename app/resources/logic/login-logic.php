<?php
require_once 'config/db_config.php';

// Check if the form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"]; 

    // Validate username and password (replace with database check)
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
            // Redirect to welcome page or any authenticated page
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