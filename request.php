<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname']; 
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];

// Debugging - print received POST data
var_dump($_POST);

$conn = new mysqli('localhost', 'root', '', 'krishimitra');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection success" . "<br>";

    // Prepare data for insertion
    $firstname = $conn->real_escape_string($firstname);
    $lastname = $conn->real_escape_string($lastname);
    $address = $conn->real_escape_string($address);
    $phoneno = $conn->real_escape_string($phoneno);

    // SQL query to insert data
    $sql = "INSERT INTO request(firstname, lastname, address, phoneno) VALUES ('$firstname', '$lastname', '$address', '$phoneno')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful..." . '<br>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header('Location: http://localhost/KrishiFinal/');
    exit();
}
?>
