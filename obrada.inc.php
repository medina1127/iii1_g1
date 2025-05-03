<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.inc.php';

    $ime = $_POST['ime'];
    $jmbg = $_POST['jmbg'];
    $datum_rodjenja = $_POST['datum_rodjenja'];
    $spol = $_POST['spol'];
    $krvna_grupa = $_POST['krvna_grupa'];
    $kontakt = $_POST['kontakt'];
    $email = $_POST['email'];
    $mjesto = $_POST['mjesto'];

    $uvjerenje_naziv = $_FILES['uvjerenje']['name'];
    $uvjerenje_tmp = $_FILES['uvjerenje']['tmp_name'];
    $putanja = '../uploads/' . basename($uvjerenje_naziv);

    if (move_uploaded_file($uvjerenje_tmp, $putanja)) {
        try {
            if ($pdo) {
                $stmt = $pdo->prepare("INSERT INTO prijave (ime_prezime, jmbg, datum_rodjenja, spol, krvna_grupa, kontakt, email, mjesto, uvjerenje) 
                                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$ime, $jmbg, $datum_rodjenja, $spol, $krvna_grupa, $kontakt, $email, $mjesto, $putanja]);

                header("Location: ../darivaocindex.php");
                exit();
            } else {
                echo "Greška s bazom podataka.";
            }
        } catch (PDOException $e) {
            echo "Greška u izvršavanju upita: " . $e->getMessage();
        }
    } else {
        echo "Greška pri uploadu fajla.";
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
