<?php
// Database connection
$conn = new mysqli('localhost', 'root', 'Minga3winy_3', 'jpcs2425');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the member name from the query parameter
$name = $_GET['name'];

// Prepare and execute SQL statement
$stmt = $conn->prepare("SELECT student_no, email, program FROM members WHERE name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();

$data = $result->fetch_assoc();
echo json_encode($data);

$stmt->close();
$conn->close();
?>
