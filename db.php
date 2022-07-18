

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nltcglass_db";


$host="localhost";
$user="root";
$password="";
$dbname="nltcglass_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>