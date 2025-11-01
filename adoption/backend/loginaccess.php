<?php
// Start session

// Include database connection
include 'db_connect.php';
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute the SQL statement
    // ******** এখানে পরিবর্তন করা হয়েছে: user_type কলামটি যোগ করা হয়েছে ********
    $stmt = $conn->prepare("SELECT id, password, user_type FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verify the password
        if (password_verify($password, $stored_password)) {
            
            // Password is correct, create session and redirect
            $_SESSION['user_id'] = $row['id'];
            
            // ******** এখানে পরিবর্তন করা হয়েছে: user_type অনুযায়ী রিডাইরেক্ট লজিক ********
            if ($row['user_type'] === 'admin') {
                header("Location: admin_page.php");
            } else {
                header("Location: home.php");
            }
            exit;

        } 
        {
            // Password is incorrect
            $error = "Invalid email or password";
        }
    } else {
        // Email does not exist
        $error = "Invalid email or password";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>