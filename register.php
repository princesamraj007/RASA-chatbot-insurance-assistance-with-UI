<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["reg_username"];
    $email = $_POST["reg_email"];
    $password = $_POST["reg_password"];

    // Replace the database connection details with your own
    $port = 3307;
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "1234";
    $dbname = "policy_holders";

    // Create a database connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform registration
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Welcome, " . $username . "! Registration successful!";
        header("Location: index.php?variable=" . urlencode($username));
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
