<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

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

    // Perform authentication
    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            
            
            header("Location: index.php?variable=" . urlencode($username));
            

            exit();
            
        } else {
            echo "Invalid credentials. Please try again.";
        }
    } else {
        echo "Invalid credentials. Please try again.";
    }

    $conn->close();
}
?>
