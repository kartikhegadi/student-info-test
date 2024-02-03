<?php
$servername = "localhost"; // Replace with your database host
$username = "root@localhost"; // Replace with your database username
$password = "your_password"; // Replace with your database password
$dbname = "student_info_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST["fullName"];
    $contactInfo = $_POST["contactInfo"];
    // Add more fields as needed

    // Prepare SQL statement
    $sql = "INSERT INTO student_info (fullName, contactInfo, ...) VALUES (?, ?, ...)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fullName, $contactInfo, ...);
    
    // Execute and check if successful
    if ($stmt->execute()) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

