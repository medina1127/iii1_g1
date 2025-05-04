<?php
include 'includes/db.inc.php'; 

$sql = "SELECT datum_prijave FROM prijave ORDER BY datum_prijave DESC LIMIT 1";

try {
    $stmt = $pdo->query($sql);
    $donacija = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Greška u izvršavanju upita: " . $e->getMessage();
}

if ($donacija) {
    $last_datum = $donacija['datum_prijave'];
} else {
    $last_datum = "Nema podataka";
}
?>
