<?php 
$servername = "cmslamp14.aut.ac.nz";
$username = "ggh9947";
$password = "@Peniamina349";
$database = "ggh9947";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
