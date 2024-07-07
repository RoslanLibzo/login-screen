<?php 
require_once 'db_config.php'; 
// //Sample users data
// $users = [
//     ['master1', 'Password1!@'],
//     ['master2', 'Password2!@'],
//     ['master3', 'Password3!@'],
//     ['master4', 'Password4!@'],
//     ['master5', 'Password5!@']
// ];

// // Hash passwords and insert into database
// foreach ($users as $user) {
//     $username = $user[0];
//     $password = password_hash($user[1], PASSWORD_DEFAULT); // Hash password

//     // Prepare SQL statement
//     $stmt = $conn->prepare("INSERT INTO user_info (username, password) VALUES (?, ?)");
//     $stmt->bind_param("ss", $username, $password);

//     // Execute the statement
//     if ($stmt->execute()) {
//         echo "Inserted user $username successfully.<br>";
//     } else {
//         echo "Error inserting user $username: " . $stmt->error . "<br>";
//     }

//     // Close statement to free up resources
//     $stmt->close();
// }

echo "Seeding is already complete!";

?>