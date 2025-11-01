<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "";     // Your MySQL password
$dbname = "shop_db";      // *** Database name from your SQL dump ***

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Collect and sanitize user data
    $pet_name = $conn->real_escape_string($_POST['pet_name']);
    $owner_name = $conn->real_escape_string($_POST['owner_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $area_location = $conn->real_escape_string($_POST['area_location']);
    $preferred_date = $conn->real_escape_string($_POST['preferred_date']);
    $preferred_time = $conn->real_escape_string($_POST['preferred_time']);
    $reason_for_visit = $conn->real_escape_string($_POST['reason_for_visit']);

    // 2. Prepare the SQL insert statement for the new table
    $sql = "INSERT INTO vet_appointments (pet_name, owner_name, email, phone, area_location, preferred_date, preferred_time, reason_for_visit)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Using prepared statements for security
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $pet_name, $owner_name, $email, $phone, $area_location, $preferred_date, $preferred_time, $reason_for_visit);
    
    // 3. Execute and show output
    if ($stmt->execute()) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Booking Confirmed</title>
            <style>
                body { font-family: Arial, sans-serif; background-color: #e8e8e8; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .message-container { max-width: 400px; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; }
                h2 { color: #4CAF50; font-size: 2em; margin-bottom: 10px; }
                p { color: #555; margin-bottom: 25px; }
                button { background-color: #FF4500; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
                button:hover { background-color: #CC3700; }
            </style>
        </head>
        <body>
            <div class="message-container">
                <h2>✅ Appointment Booked!</h2>
                <p>Thank you, **' . htmlspecialchars($owner_name) . '**! Your appointment for **' . htmlspecialchars($pet_name) . '** on **' . htmlspecialchars($preferred_date) . '** at **' . htmlspecialchars($preferred_time) . '** has been successfully scheduled.</p>
                <button onclick="window.history.back()">Book Another</button>
            </div>
        </body>
        </html>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Access Denied.";
}

$conn->close();
?>