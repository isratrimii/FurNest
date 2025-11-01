<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include database connection
include '../db_connect.php'; 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Gather form data
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$petType = $_POST["pet-type"];
$reason = $_POST["reason"];

    // ******************************************************
    // WARNING: THIS CODE USES INSECURE STRING CONCATENATION.
    // IT IS VULNERABLE TO SQL INJECTION. USE THE PREPARED STATEMENT VERSION IN A REAL PROJECT.
    // ******************************************************

// Insert form data into the database
$sql = "INSERT INTO adoption_data (name, email, phone, address, pet_type, reason) VALUES ('$name', '$email', '$phone', '$address', '$petType', '$reason')";
    
if ($conn->query($sql) === TRUE) {
// Close connection before outputting HTML
    $conn->close();

        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Application Submitted Successfully!</title>
            
            <link rel="stylesheet" href="../signin-styles.css"> 
            <link rel="stylesheet" href="../style.css"> 
            
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding: 50px; }
                .message-box { 
                    background-color: #d4edda; 
                    border: 1px solid #c3e6cb; 
                    color: #155724; 
                    padding: 40px; 
                    border-radius: 10px; 
                    max-width: 600px; 
                    margin: 50px auto; 
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
                }
                .message-box h1 { color: #28a745; font-size: 2em; margin-bottom: 15px; }
                .message-box p { font-size: 1.1em; margin-bottom: 25px; }
                .home-button { 
                    display: inline-block; 
                    background-color: #007bff; 
                    color: white; 
                    padding: 10px 20px; 
                    text-decoration: none; 
                    border-radius: 5px; 
                    font-weight: bold; 
                }
                .home-button:hover { background-color: #0056b3; }
            </style>
        </head>
        <body>
            <div class="message-box">
                <h1>Application Submitted Successfully!</h1>
                <a href="../home.php" class="home-button">Go back to Home Page</a>
            </div>
        </body>
        </html>';
        
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
        // Close connection if an error occurred
        $conn->close();
}
} else {
    header("Location: ../home.php"); 
    exit();
}
// Note: If the connection was not closed inside the if/else blocks, it is closed here.
// But since it is closed inside, this final close is often redundant.
// $conn->close(); 
?>