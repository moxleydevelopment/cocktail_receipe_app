<?php 




$servname = "localhost";
$username = "root";
$password = "Cratos87";
$dbname = "bartender";
$idCustomers = 8;
$fname = $_POST['fname'] ;
$lname = $_POST['lname'];
$area = $_POST['areaCode'];
$number = $_POST['number'];
$email = $_POST['email'];

include("Send_Mail.php");

// Create connection
$conn = new mysqli($servname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "INSERT INTO customers (idCustomers, FirstName, LastName, AreaCode, PhoneNumber, Email)
VALUES ($idCustomers,'$fname', '$lname' , '$area', '$number', '$email')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    sendMail($email, $fname, $lname);
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>