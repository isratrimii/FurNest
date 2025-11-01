<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Vet - Pawfect Pawtrails</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; text-align: center; }
        .container { 
            max-width: 500px; 
            margin: 20px auto; 
            background: white; 
            padding: 30px 40px; 
            border-radius: 8px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
        }
        h2 { color: #8B0000; margin-bottom: 10px; }
        p { color: #555; margin-bottom: 30px; font-size: 1.1em; }
        .form-group { margin-bottom: 20px; text-align: left; }
        label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: bold; 
            color: #8B0000; /* Dark Red */
        }
        input[type="text"], input[type="email"], input[type="tel"], 
        input[type="date"], input[type="time"] {
            width: 100%; 
            padding: 12px; 
            box-sizing: border-box; 
            border: 1px solid #ddd; 
            border-radius: 5px;
            font-size: 1em;
        }
        button { 
            background-color: #FF4500; /* Orange Red */
            color: white; 
            padding: 15px 25px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 1.1em;
            transition: background-color 0.3s;
            width: 100%;
        }
        button:hover { background-color: #CC3700; }
        .red-text { color: #8B0000; font-weight: bold; margin-top: 40px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book a Vet</h2>
        <p>Schedule an appointment with our trusted veterinarians for routine check-ups, vaccinations, or any health concerns.</p>
        
        <form action="submit_vet_booking.php" method="POST"> 
            
            <div class="form-group">
                <label for="pet_name">Pet's Name:</label>
                <input type="text" id="pet_name" name="pet_name" required>
            </div>
            
            <div class="form-group">
                <label for="owner_name">Owner's Name:</label>
                <input type="text" id="owner_name" name="owner_name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            
            <div class="form-group">
                <label for="area_location">Area/Location:</label>
                <input type="text" id="area_location" name="area_location" required>
            </div>

            <div class="form-group">
                <label for="preferred_date">Preferred Date:</label>
                <input type="date" id="preferred_date" name="preferred_date" required>
            </div>
            
            <div class="form-group">
                <label for="preferred_time">Preferred Time:</label>
                <input type="time" id="preferred_time" name="preferred_time" required>
            </div>
            
            <div class="form-group">
                <label for="reason_for_visit">Reason for Visit:</label>
                <input type="text" id="reason_for_visit" name="reason_for_visit">
            </div>

            <button type="submit">Book Appointment</button>
        </form>
    </div>
 
</body>
</html>