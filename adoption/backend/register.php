<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session
session_start();


$errors = [];

// Include database connection
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $termsAccepted = isset($_POST["terms"]);

    // NOTE: Validation check added to prevent SQL errors if fields are empty
    if (empty($username) || empty($email) || empty($password)) {
        $errors[] = "Username, Email, and Password are required.";
    }

    // Perform validation...

    // If no errors, proceed with registration
    if (empty($errors)) {
        // Insert user data into the database
        // WARNING: This uses an insecure method (string concatenation). 
        // For real projects, use Prepared Statements.
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        
        if ($conn->query($sql) === TRUE) {
            // Data successfully inserted into the users table
            
            // Auto login is kept as per original code (though generally removed 
            // when redirecting to a login page)
            $_SESSION['user_id'] = $conn->insert_id; 
            
          
            header("Location: ../login.php"); // Assuming login.php is one level up
            exit;
        } else {
            // Display SQL error if query fails
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // If there are errors, display them
        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . htmlspecialchars($error) . "</p>";
        }
    }
}

// Close connection
if (isset($conn)) {
    $conn->close();
}
?>