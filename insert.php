<?php
$servername = "localhost";
$username = "root";   // change if needed
$password = "";       // change if needed
$dbname = "student_db1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Run only if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data safely
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $course = $_POST['course'] ?? '';
  $gender = $_POST['gender'] ?? '';
  $date_of_birth = $_POST['date_of_birth'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $address = $_POST['address'] ?? '';

  // Insert into table
  $sql = "INSERT INTO students (name, email, course, gender, date_of_birth, phone, address) 
          VALUES ('$name', '$email', '$course', '$gender', '$date_of_birth', '$phone', '$address')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
