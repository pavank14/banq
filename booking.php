<?php
// Ensure that the form is submitted with method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $selected_date = htmlspecialchars($_POST['selected_date']);
    $name = htmlspecialchars($_POST['name']);
    $contact = htmlspecialchars($_POST['contact']);
    $address = htmlspecialchars($_POST['address']);
    $package = htmlspecialchars($_POST['package']);

    // Database connection details
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "karyalay";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into `details` table
    $sql = "INSERT INTO details (name, contact, address, package, selected_date) VALUES ('$name', '$contact', '$address', '$package', '$selected_date')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the booking page after successful insertion
        header("Location: booking.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
