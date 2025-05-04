<?php
require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jmbg = $_POST['jmbg'];

    $stmt = $pdo->prepare("SELECT * FROM prijave WHERE jmbg = ? ORDER BY id DESC LIMIT 1");
    $stmt->execute([$jmbg]);
    $korisnik = $stmt->fetch();

    if ($korisnik) {
        // Možeš ovdje postaviti sesiju ako želiš
        session_start();
        $_SESSION['jmbg'] = $jmbg;
        $_SESSION['ime'] = $korisnik['ime_prezime'];

        // Preusmjeri na stranicu za prijavu
        header("Location: ../dashboard.php");
        exit();
    } else {
        // Ako nije pronađen, možda ga možeš preusmjeriti na formu za unos
        header("Location: ../noviddk.php?jmbg=$jmbg");
        exit();
    }
} else {
    header("Location: login.inc.php");
    exit();
}
