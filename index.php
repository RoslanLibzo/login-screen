<?php 
session_start();

// Check if the requested URL is for home
if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/home' ) {
  // Include the login page
  include('app/resources/pages/home.php');
  exit;
}

// Check if the requested URL is for login
if ($_SERVER['REQUEST_URI'] === '/login') {
  // Include the login page
  include('app/resources/pages/login.php');
  exit;
}

// Check if the requested URL is for welcome (assuming successful login LOGIC to be added later)
if ($_SERVER['REQUEST_URI'] === '/welcome') {
  // Include the welcome page
  include('app/resources/pages/welcome.php');
  exit;
}

// If no match, display a default message (optional)
echo "Invalid request.";
?>