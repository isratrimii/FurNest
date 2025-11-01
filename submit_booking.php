<?php
// Database connection details (Changed dbname to 'pawpalace')
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "";     // Your MySQL password (often empty for XAMPP/WAMP)
$dbname = "shop_db"; // *** CHANGED: Use your actual database name ***

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Sanitize and collect user data
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $event_type = $conn->real_escape_string($_POST['event_type']);
    $booking_date = $conn->real_escape_string($_POST['booking_date']);

    // 2. Handle the multiple decoration checkboxes
    $decorations = "";
    if (isset($_POST['decorations']) && is_array($_POST['decorations'])) {
        // Implode array into a comma-separated string for easy storage
        $decorations = $conn->real_escape_string(implode(", ", $_POST['decorations']));
    } else {
        $decorations = "None Selected";
    }

    // 3. Prepare and execute the SQL insert statement
    $sql = "INSERT INTO event_bookings (full_name, phone, email, address, event_type, decoration_items, booking_date)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Using prepared statements for security
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $full_name, $phone, $email, $address, $event_type, $decorations, $booking_date);
    
    // --- START OUTPUT SECTION ---
    
    // Start HTML output with background style
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Status</title>
        <style>
            body { 
                font-family: Arial, sans-serif; 
                background-image: url(\'images/e4.jpg\'); /* Make sure this path is correct */
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                display: flex;
                justify-content: center; 
                align-items: center; 
                min-height: 100vh;
                margin: 0;
            }
            .message-container { 
                max-width: 450px; 
                background: rgba(255, 255, 255, 0.95);
                padding: 40px; 
                border-radius: 12px; 
                box-shadow: 0 10px 25px rgba(0,0,0,0.3);
                text-align: center;
            }
            h2 { color: #5cb85c; font-size: 2em; margin-bottom: 10px; }
            p { font-size: 1.1em; color: #333; margin-bottom: 25px; }
            button { 
                background-color: #5cb85c; 
                color: white; 
                padding: 12px 20px; 
                border: none; 
                border-radius: 6px; 
                cursor: pointer; 
                font-size: 16px;
                transition: background-color 0.3s;
            }
            button:hover { background-color: #4cae4c; }
        </style>
    </head>
    <body>
        <div class="message-container">';

    if ($stmt->execute()) {
        echo "<h2>✅ Success!</h2>";
        echo "<p>Event booking has been submitted successfully!</p>";
        echo "<p>We will contact you soon at: **" . htmlspecialchars($email) . "**</p>";
        echo '<button onclick="window.history.back()">Go Back</button>';
    } else {
        echo "<h2>❌ Error!</h2>";
        echo "<p>Submission Failed. Please try again.</p>";
        echo "<p>Database Error: " . $stmt->error . "</p>";
        echo '<button onclick="window.history.back()">Go Back</button>';
    }
    
    echo '</div>
    </body>
    </html>';

    // --- END OUTPUT SECTION ---

    // Close statement and connection
    $stmt->close();
} else {
    // If accessed directly without form submission
    echo "Access Denied: Please use the booking form to submit.";
}

$conn->close();
?>