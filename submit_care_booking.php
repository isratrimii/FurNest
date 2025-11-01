<?php
// Database connection details 
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "shop_db"; // *** আপনার সঠিক ডেটাবেস নামটি দিন (যেমন: 'shop_db' বা 'c') ***

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- PART 1: Handle Booking Form Submission ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['owner_name'])) {
    
    // Collect and sanitize data
    $owner_name = $conn->real_escape_string($_POST['owner_name']);
    $owner_email = $conn->real_escape_string($_POST['owner_email']);
    $owner_phone = $conn->real_escape_string($_POST['owner_phone']);
    $owner_location = $conn->real_escape_string($_POST['owner_location']);
    $pet_type = $conn->real_escape_string($_POST['pet_type']);
    $care_days = (int)$_POST['care_days'];
    $start_date = $conn->real_escape_string($_POST['start_date']); 
    $end_date = $conn->real_escape_string($_POST['end_date']);     
    $payment_status = $conn->real_escape_string($_POST['payment_status']);
    $food_provided = $conn->real_escape_string($_POST['food_provided']);
    $reason_for_care = $conn->real_escape_string($_POST['reason_for_care']);
    $description = $conn->real_escape_string($_POST['description']);

    $pet_image_path = NULL; 

    // Handle file upload
    if (isset($_FILES['pet_image']) && $_FILES['pet_image']['error'] == UPLOAD_ERR_OK) {
        
        $target_dir = "uploaded_img/"; // আপনার ব্যবহৃত ফোল্ডার পাথ
        $original_filename = basename($_FILES['pet_image']['name']);
        
        $sanitized_filename = time() . '_' . preg_replace('/[^A-Za-z0-9_\-.]/', '_', $original_filename); 
        $target_file = $target_dir . $sanitized_filename;
        
        if (move_uploaded_file($_FILES['pet_image']['tmp_name'], $target_file)) {
            $pet_image_path = $conn->real_escape_string($target_file);
        } else {
            echo "<p style='color: orange; text-align: center;'>Warning: Failed to upload image (Check 'uploaded_img/' folder permissions).</p>";
        }
    }

    // Insert into day_care_bookings 
    $sql = "INSERT INTO day_care_bookings (owner_name, owner_email, owner_phone, owner_location, pet_type, care_days, start_date, end_date, payment_status, food_provided, reason_for_care, description, pet_image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssissssssss", $owner_name, $owner_email, $owner_phone, $owner_location, $pet_type, $care_days, $start_date, $end_date, $payment_status, $food_provided, $reason_for_care, $description, $pet_image_path);
    
    if ($stmt->execute()) {
        $last_id = $conn->insert_id;
        
        // Insert initial adoption status (0 = Available)
        $sql_status = "INSERT INTO day_care_adoption_status (booking_id) VALUES (?)";
        $stmt_status = $conn->prepare($sql_status);
        $stmt_status->bind_param("i", $last_id);
        
        if ($stmt_status->execute()) {
            echo "<p style='color: green; font-weight: bold; text-align: center;'>Booking submitted successfully! Pet ID: $last_id</p>";
        } else {
            echo "<p style='color: red; font-weight: bold; text-align: center;'>Warning: Booking saved, but failed to initialize adoption status. Error: " . $stmt_status->error . "</p>";
        }
        $stmt_status->close();
        
    } else {
        echo "<p style='color: red; font-weight: bold; text-align: center;'>Error submitting booking: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

// --- PART 2: Display Live Adoption List & Modal ---
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Day Care Status</title>
    <style>
        /* CSS for layout and styling */
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        h2 { color: #333; border-bottom: 2px solid #ccc; padding-bottom: 10px; margin-top: 20px; }
        .pet-list { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px; }
        .pet-card { border: 1px solid #ddd; padding: 15px; border-radius: 8px; width: calc(50% - 20px); box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .pet-card h3 { margin-top: 0; color: #007bff; }
        .pet-card img { max-width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px; } 
        .available { background-color: #e9f7e9; border-left: 5px solid #28a745; }
        .adopted { background-color: #f7e9e9; border-left: 5px solid #dc3545; opacity: 0.8; }
        .adopt-btn { background-color: #ffc107; color: #333; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; float: right; }
        .adopt-btn:hover { background-color: #e0a800; }
        .adopted button { 
            background-color: #6c757d !important; 
            cursor: not-allowed; 
            color: white !important; /* Adopted text color */
        }
        
        /* Modal specific styles */
        .form-group { margin-bottom: 15px; } 
        label { display: block; margin-bottom: 5px; font-weight: bold; } 
        input[type="text"], input[type="email"], input[type="tel"], textarea, input[type="file"] { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; } 
    </style>
</head>
<body>
    <div class="container">
        <div id="adoptionModal" style="display:none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.7);">
            <div class="modal-content" style="background-color: #fefefe; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 10px;">
                <span class="close-btn" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
                <h3 style="color: #007bff;">Adopt this Pet! (ID: <span id="petIdDisplay"></span>)</h3>
                
                <form action="submit_adoption.php" method="POST" enctype="multipart/form-data" id="adoptionForm">
                    <input type="hidden" id="modal_booking_id" name="booking_id" required>

                    <div class="form-group"><label for="applicant_name">Your Name:</label><input type="text" id="applicant_name" name="applicant_name" required></div>
                    <div class="form-group"><label for="applicant_email">Email:</label><input type="email" id="applicant_email" name="applicant_email" required></div>
                    <div class="form-group"><label for="applicant_phone">Phone:</label><input type="tel" id="applicant_phone" name="applicant_phone" required></div>
                    <div class="form-group"><label for="applicant_address">Address:</label><textarea id="applicant_address" name="applicant_address" rows="2" required></textarea></div>
                    <div class="form-group"><label for="nid_image">NID Card Photo (Upload):</label><input type="file" id="nid_image" name="nid_image" accept="image/*" required></div>

                    <button type="submit" style="background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px;">Confirm Adoption</button>
                </form>
            </div>
        </div>
        <h2>🐾 Pets Available for Care/Adoption 🐾</h2>
        <div class="pet-list">
            <?php
            // Fetch all available bookings joined with their adoption status
            $sql_fetch = "SELECT b.id, b.owner_name, b.pet_type, b.care_days, b.start_date, b.end_date, b.description, b.pet_image, s.is_adopted 
                          FROM day_care_bookings b 
                          LEFT JOIN day_care_adoption_status s ON b.id = s.booking_id 
                          ORDER BY b.booked_at DESC";

            $result = $conn->query($sql_fetch);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // is_adopted can be NULL, 0, or 1. We treat 1 as adopted.
                    $is_adopted = ($row['is_adopted'] === 1); 
                    $card_class = $is_adopted ? 'adopted' : 'available';
                    
                    $start_date_formatted = date('M d', strtotime($row['start_date']));
                    $end_date_formatted = date('M d, Y', strtotime($row['end_date']));

                    echo "<div class='pet-card $card_class'>";
                    echo "<h3>" . htmlspecialchars($row['pet_type']) . " (Owner: " . htmlspecialchars($row['owner_name']) . ")</h3>";
                    
                    if ($row['pet_image']) {
                        echo '<img src="' . htmlspecialchars($row['pet_image']) . '" alt="Pet Photo">';
                    } else {
                        echo '<p>No Photo Available</p>'; 
                    }
                    
                    echo "<p>📅 **Date Range:** $start_date_formatted - $end_date_formatted</p>";
                    echo "<p><strong>Days of Care:</strong> " . htmlspecialchars($row['care_days']) . "</p>";
                    echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
                    
                    // Conditionally render the button
                    if ($is_adopted) {
                        // Button is disabled and shows 'Adopted'
                        echo '<button class="adopt-btn" disabled style="background-color: #6c757d !important; cursor: not-allowed;">Adopted (Closed)</button>';
                    } else {
                        // Button opens the modal
                        echo '<button class="adopt-btn" onclick="openAdoptionModal(' . $row['id'] . ')">Adopt Now</button>';
                    }
                    echo "</div>";
                }
            } else {
                echo "<p style='width: 100%; text-align: center;'>No pets currently listed for day care/adoption.</p>";
            }
            ?>
        </div>
        
        <br><br>
        <button onclick="window.location.href='day_care_form.php'">Add a New Pet for Care</button>
    </div>
    
    <script>
        // Modal JavaScript Logic
        var modal = document.getElementById("adoptionModal");
        var closeBtn = document.getElementsByClassName("close-btn")[0];
        var bookingIdInput = document.getElementById("modal_booking_id");
        var petIdDisplay = document.getElementById("petIdDisplay");

        function openAdoptionModal(bookingId) {
            bookingIdInput.value = bookingId; 
            petIdDisplay.innerText = bookingId; 
            modal.style.display = "block";
        }

        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>