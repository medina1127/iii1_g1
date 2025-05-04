<?php
include 'includes/db.inc.php'; 
include 'includes/zadnjaDonacija.inc.php';


session_start();
require 'includes/db.inc.php';

if (!isset($_SESSION['jmbg'])) {
    header("Location: login.php");
    exit();
}

$jmbg = $_SESSION['jmbg'];
$ime = $_SESSION['ime'];

// Dohvati sve prijave za tog korisnika
$stmt = $pdo->prepare("SELECT * FROM prijave WHERE jmbg = ? ORDER BY datum_prijave DESC");
$stmt->execute([$jmbg]);
$prijave = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crveni križ Federacije Bosne i Hercegovine</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .navbar {
            position: sticky;
            top: 0;
            background-color: transparent;
            padding: 15px 0;
            transition: background-color 0.3s ease;
        }

        .navbar.scrolled {
            background-color: rgba(211, 211, 211, 0.9);
        }

        .navbar-nav {
            margin: auto;
        }

        .navbar-brand img {
            height: 50px;
        }

        .navbar-nav .nav-link {
            color: #333;
        }

        .navbar-nav .nav-link:hover {
            color:rgb(179, 0, 9);
        }

        .news-box {
            background-image: url('img/ddk.jpg'); /* Zamijeni s stvarnom putanjom do slike */
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .news-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Zacrnjenje slike */
            z-index: 1;
        }

        .news-content {
            color: white;
            text-align: center;
            z-index: 2;
        }

        .news-content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .news-content .btn {
            margin-top: 15px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="img/logockfbih.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pocetna.php">Početna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">O nama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Donacije</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Aktivnosti</a>
        </li>
    
      </ul>

      <div class="d-flex ms-auto">
        <a href="volonter.php"><button class="btn btn-danger" type="button">Volontiraj</button></a>
      </div>
    </div>
  </div>
</nav>

<!-- News Box: Dobrovoljno darivanje krvi -->
<div class="news-box">
  <div class="news-content">
    <h2><strong>Prijava je poslana!</strong></h2>
    <h3>Vaša jedna donacija spašava tri života! Hvala!</h3>
    <a href="stariddk.php"><button class="btn btn-danger">Dashboard</button></a>

  </div>
</div>
