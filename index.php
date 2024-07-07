<?php 
session_start();

// Define base path for routing simplicity
$basePath = 'app/resources/pages/';

// Route requests based on the requested URI
switch ($_SERVER['REQUEST_URI']) {
  case '/':
  case '/home':
      include($basePath . 'home.php');
      exit;
  case '/login':
      include($basePath . 'login.php');
      exit;
  case '/welcome':
      include($basePath . 'welcome.php');
      exit;
  case '/login/access':
      include('app/resources/logic/login-logic.php'); // Adjust the path as needed
      exit;
  default:
      echo "Invalid request.";
      exit;
}

// If no match, display a default message (optional)
echo "Invalid request.";
?>