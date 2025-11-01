<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Day Care Booking</title>
    <style>
        /* Styling from previous response remains */
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        h2 { color: #333; border-bottom: 2px solid #ccc; padding-bottom: 10px; margin-top: 20px; }
        .form-section { border: 1px solid #ddd; padding: 20px; margin-bottom: 30px; border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="tel"], textarea, select, input[type="number"], input[type="date"], input[type="file"] {
            width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;
        }
        input[type="file"] { padding: 5px; } /* Adjust padding for file input */
        .radio-group label, .radio-group input { display: inline; margin-right: 15px; font-weight: normal; }
        button[type="submit"] { background-color: #007bff; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 1em; }
        button[type="submit"]:hover { background-color: #0056b3; }
        
        /* Live List Styling */
        .pet-list { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px; }
        .pet-card { border: 1px solid #ddd; padding: 15px; border-radius: 8px; width: calc(50% - 20px); box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .pet-card h3 { margin-top: 0; color: #007bff; }
        .pet-card img { max-width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px; } /* Image style */
        .available { background-color: #e9f7e9; border-left: 5px solid #28a745; }
        .adopted { background-color: #f7e9e9; border-left: 5px solid #dc3545; opacity: 0.7; }
        .adopted button { background-color: #6c757d !important; cursor: not-allowed; }
        .adopted button:hover { background-color: #6c757d !important; }
        .adopt-btn { background-color: #ffc107; color: #333; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; float: right; }
        .adopt-btn:hover { background-color: #e0a800; }
    </style>
</head>
<body>
    <div class="container">
        <h2>🐶 Pet Day Care Booking Form 🐱</h2>

        <div class="form-section">
            <h3>Register Your Pet for Day Care</h3>
            <form action="submit_care_booking.php" method="POST" enctype="multipart/form-data"> <div class="form-group"><label for="owner_name">Your Name:</label><input type="text" id="owner_name" name="owner_name" required></div>
                <div class="form-group"><label for="owner_email">Email:</label><input type="email" id="owner_email" name="owner_email" required></div>
                <div class="form-group"><label for="owner_phone">Phone:</label><input type="tel" id="owner_phone" name="owner_phone" required></div>
                <div class="form-group"><label for="owner_location">Location/Area:</label><input type="text" id="owner_location" name="owner_location" required></div>

                <div class="form-group">
                    <label for="pet_type">Pet Type:</label>
                    <select id="pet_type" name="pet_type" required>
                        <option value="">-- Select Pet --</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="care_days">Number of Days for Care (Estimate):</label>
                    <input type="number" id="care_days" name="care_days" min="1" required>
                </div>
                
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" required>
                </div>
                
                <div class="form-group radio-group">
                    <label>Do you provide food?</label>
                    <label><input type="radio" name="food_provided" value="Yes" required> Yes</label>
                    <label><input type="radio" name="food_provided" value="No"> No (We will provide)</label>
                </div>

                <div class="form-group radio-group">
                    <label>Payment Status:</label>
                    <label><input type="radio" name="payment_status" value="Paid" required> Paid</label>
                    <label><input type="radio" name="payment_status" value="Unpaid"> Unpaid (Will Pay Later)</label>
                </div>

                <div class="form-group">
                    <label for="reason_for_care">Reason for Care/Adoption:</label>
                    <textarea id="reason_for_care" name="reason_for_care" rows="2" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="description">Short Pet Description (e.g., age, habits):</label>
                    <textarea id="description" name="description" rows="2"></textarea>
                </div>

                <div class="form-group">
                    <label for="pet_image">Upload Pet Photo:</label>
                    <input type="file" id="pet_image" name="pet_image" accept="image/*">
                </div>

                <button type="submit">Submit Day Care Booking</button>
            </form>
        </div>
        
        <hr>
        
    </div>
</body>
</html>