<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Event Booking</title>
    <style>
        /* CSS for simple styling */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="tel"], textarea, select {
            width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;
        }
        .checkbox-group label { font-weight: normal; display: inline-block; margin-right: 15px; }
        button { background-color: #5cb85c; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #4cae4c; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pet Event Booking Form</h2>
        
        <form action="submit_booking.php" method="POST"> 
            
            <div class="form-group">
                <label for="event_type">Select Event Type:</label>
                <select id="event_type" name="event_type" required>
                    <option value="">-- Choose Event --</option>
                    <option value="Birthday Party">Pet Birthday Party</option>
                    <option value="Pet Picnic">Pet Picnic/Day Out</option>
                    <option value="Adoption Day">Adoption Day Celebration</option>
                    <option value="Other">Other (Specify in Description)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Select Decoration Items (Multiple allowed):</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="decorations[]" value="Balloons"> Balloons</label>
                    <label><input type="checkbox" name="decorations[]" value="Flowers"> Flowers</label>
                    <label><input type="checkbox" name="decorations[]" value="Banner"> Custom Banner</label>
                    <label><input type="checkbox" name="decorations[]" value="Lighting"> Special Lighting</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="booking_date">Preferred Booking Date:</label>
                <input type="date" id="booking_date" name="booking_date" required>
            </div>

            <hr>
            <h3>Your Contact Details</h3>
            
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="e.g., 01XXXXXXXXX" required>
            </div>
            
            <div class="form-group">
                <label for="address">Full Address for Service:</label>
                <textarea id="address" name="address" rows="3" placeholder="Enter the complete service address" required></textarea>
            </div>

            <button type="submit">Book Event Service</button>
        </form>
    </div>
</body>
</html>