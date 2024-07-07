<?php 
// ROUTER!!

// Define base path for routing simplicity
$basePath = 'app/resources/pages/';

// Extract the request URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Extract and parse the query string if it exists
$queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
$queryParams = [];
if ($queryString !== null) {
    parse_str($queryString, $queryParams);
}

// Route requests based on the requested URI
switch ($requestUri) {
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