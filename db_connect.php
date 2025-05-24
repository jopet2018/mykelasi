<?php
$host = 'localhost'; // or '127.0.0.1'
$db_name = 'mykelasi_db';
$username = 'root';
$password = ''; // Assuming empty password for local development

// Set PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Make the default fetch be an associative array
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Turn off emulation mode for prepared statements
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password, $options);
    // echo "Database connection successful!"; // Optional: for testing connection
} catch (PDOException $e) {
    // Log the error or display a user-friendly message
    error_log("Database Connection Error: " . $e->getMessage());
    // For a production environment, you might want to display a generic error message
    // and log the detailed error.
    die("Database connection failed. Please try again later or contact support. Details: " . $e->getMessage());
}

// The $pdo object is now available for other scripts to use.
// Example: include 'db_connect.php';
// $stmt = $pdo->query("SELECT * FROM users");
// while ($row = $stmt->fetch()) {
//     echo $row['username'] . "\n";
// }
?>
