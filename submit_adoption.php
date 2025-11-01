<?php
// Database connection details
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "shop_db"; // *** আপনার সঠিক ডেটাবেস নামটি দিন ***

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- PART 1: Handle Adoption Form Submission ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect and sanitize data
    $booking_id = (int)$_POST['booking_id'];
    $applicant_name = $conn->real_escape_string($_POST['applicant_name']);
    $applicant_email = $conn->real_escape_string($_POST['applicant_email']);
    $applicant_phone = $conn->real_escape_string($_POST['applicant_phone']);
    $applicant_address = $conn->real_escape_string($_POST['applicant_address']);
    
    $nid_image_path = NULL; 
    $target_dir = "uploaded_img/"; 

    // Handle NID file upload
    if (isset($_FILES['nid_image']) && $_FILES['nid_image']['error'] == UPLOAD_ERR_OK) {
        
        $original_filename = basename($_FILES['nid_image']['name']);
        $sanitized_filename = time() . '_NID_' . preg_replace('/[^A-Za-z0-9_\-.]/', '_', $original_filename); 
        $target_file = $target_dir . $sanitized_filename;
        
        if (move_uploaded_file($_FILES['nid_image']['tmp_name'], $target_file)) {
            $nid_image_path = $conn->real_escape_string($target_file);
        } else {
            $nid_image_path = "UPLOAD_FAILED"; 
        }
    }


    // --- STEP 1: Insert applicant details into pet_adoption_applicants ---
    $sql_insert = "INSERT INTO pet_adoption_applicants (booking_id, applicant_name, applicant_email, applicant_phone, applicant_address, nid_image_path)
                   VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("isssss", $booking_id, $applicant_name, $applicant_email, $applicant_phone, $applicant_address, $nid_image_path);
    
    if ($stmt_insert->execute()) {
        
        // --- STEP 2: Update the day_care_adoption_status table to mark as Adopted (is_adopted = 1) ---
        $sql_update = "UPDATE day_care_adoption_status SET is_adopted = 1 WHERE booking_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("i", $booking_id);

        if ($stmt_update->execute()) {
            $message = "Adoption confirmed successfully! Pet ID $booking_id is now marked as Adopted. Returning to status page...";
            $color = "green";
        } else {
            $message = "Adoption details saved, but **failed to update status**. Error: " . $stmt_update->error;
            $color = "orange";
        }
        $stmt_update->close();

    } else {
        $message = "Error submitting adoption application: " . $stmt_insert->error . ". Check if booking ID exists.";
        $color = "red";
    }
    $stmt_insert->close();
}

$conn->close();

// Display success/error message and automatically redirect after 3 seconds
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Status</title>
    <meta http-equiv="refresh" content="3;url=submit_care_booking.php" />
</head>
<body style="font-family: Arial, sans-serif; text-align: center; padding-top: 50px;">
    <div style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
        <h2 style="color: <?php echo $color; ?>;"><?php echo ($color == 'green') ? '✅ Adoption Successful!' : '❌ Submission Error!'; ?></h2>
        <p style="font-size: 1.1em;"><?php echo $message; ?></p>
        <br>
        <p style="font-size: 0.9em; color: #666;">You will be redirected automatically in 3 seconds.</p>
    </div>
</body>
</html>