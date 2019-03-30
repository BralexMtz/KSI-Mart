<h1>KSI-Mart!</h1>
<?php
$host = 'mysql';
$user = 'root';
$pass = '1q2w3e4r';
$database = 'KsiMart';
$conn = new mysqli($host, $user, $pass,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to KSI-Mart successfully!";
}

?>
