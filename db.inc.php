<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "redcross";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Povezivanje s bazom nije uspjelo: " . $e->getMessage();
}
?>
