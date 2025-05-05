<?php
session_start();
include 'includes/db.inc.php'; 
include 'includes/zadnjaDonacija.inc.php';

if (!isset($_SESSION['jmbg'])) {
    header("Location: login.php");
    exit();
}

$jmbg = $_SESSION['jmbg'];
$ime = $_SESSION['ime'] ?? 'Korisniče';

$stmt = $pdo->prepare("SELECT * FROM prijave WHERE jmbg = ? ORDER BY datum_prijave DESC");
$stmt->execute([$jmbg]);
$prijave = $stmt->fetchAll(PDO::FETCH_ASSOC);


try {
    $stmt = $pdo->query("SELECT datum_donacije, vrijeme_donacije 
                         FROM donacije 
                         ORDER BY datum_donacije DESC, vrijeme_donacije DESC");
    $donacije = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "❌ Greška pri dohvaćanju donacija: " . $e->getMessage();
    exit;
}
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
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="pocetna.php">Početna</a>
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

<div class="container my-5">
  <div class="row">
    <div class="col-md-6">
      <h2>Dobrodošli, <?php echo htmlspecialchars($ime); ?></h2>
      <h4>Vaša prethodna darivanja:</h4>
      <?php if (count($prijave) > 0): ?>
        <ul class="mt-4 list-group">
            <?php foreach ($prijave as $prijava): ?>
                <li class="list-group-item">
                    <?php echo htmlspecialchars($prijava['datum_prijave']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p>Nemate prethodnih prijava.</p>
      <?php endif; ?>
    </div>

    <div class="col-md-6">
      <h2 class="text-center mb-4">Nadolazeći termini darivanja</h2>
      
     
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#adminModal">Dodaj nadolazeću donaciju</button>

        <?php if (count($donacije) > 0): ?>
        <ul class="list-group mt-3">
            <?php foreach ($donacije as $d): ?>
                <li class="list-group-item">
                    <?php
                        $datum = htmlspecialchars(date("d.m.Y", strtotime($d['datum_donacije'])));
                        $vrijeme = htmlspecialchars(substr($d['vrijeme_donacije'], 0, 5));
                        echo "$datum u $vrijeme";
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="mt-3">Nema trenutno zakazanih termina.</p>
    <?php endif; ?>

      <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title mb-3" id="adminModalLabel">Dodaj nadolazeću donaciju</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="dodaj_donaciju.php" method="POST">
                <div class="mb-3">
                  <label for="adminIme" class="form-label">Korisničko ime</label>
                  <input type="text" class="form-control" id="adminIme" name="adminIme" required>
                </div>
                <div class="mb-3">
                  <label for="adminSifra" class="form-label">Šifra</label>
                  <input type="password" class="form-control" id="adminSifra" name="adminSifra" required>
                </div>
                <div class="mb-3">
                  <label for="datumDonacije" class="form-label">Datum donacije</label>
                  <input type="date" class="form-control" id="datumDonacije" name="datumDonacije" required>
                </div>
                <div class="mb-3">
                  <label for="vrijemeDonacije" class="form-label">Vrijeme donacije</label>
                  <input type="time" class="form-control" id="vrijemeDonacije" name="vrijemeDonacije" required>
                </div>
                <button type="submit" class="btn btn-primary">Dodaj donaciju</button>
                <div class="text-center mt-3">
                  <a href="novi_admin.php" class="btn btn-sm btn-outline-secondary">Novi admin? Prijavite se.</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="loginModalLabel">Unesi admin podatke</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="login_admin.php" method="POST">
                <div class="mb-3">
                  <label for="adminUsername" class="form-label">Admin korisničko ime</label>
                  <input type="text" class="form-control" id="adminUsername" name="adminUsername" required>
                </div>
                <div class="mb-3">
                  <label for="adminPassword" class="form-label">Lozinka</label>
                  <input type="password" class="form-control" id="adminPassword" name="adminPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Prijavi se</button> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  window.onscroll = function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 10) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
  };
</script>



</body>
</html>
