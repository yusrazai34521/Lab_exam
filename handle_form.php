<?php
// Connect to MySQL
$servername = "localhost"; // Change if your MySQL server is hosted elsewhere
$username = "root";
$password = "";
$dbname = "yyyy"; // Change if you used a different database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $genre = $_POST["genre"];
    $publication_date = $_POST["publication_date"];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO book_registration2 (title, author, genre, publication_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $author, $genre, $publication_date);
    if ($stmt->execute()) {
        header("Location: record.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
