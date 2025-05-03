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
          <a class="nav-link active" aria-current="page" href="../index.php">Početna</a>
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
    <h2><strong>Daruj krv, spasi život!</strong></h2>
    <h3>Pridruži se akciji dobrovoljnog darivanja krvi</h3>
    <a href="ddk.php"><button class="btn btn-danger">Postani darivaoc</button></a>
  </div>
</div>
<div class="container my-5">
  <h2 class="text-center mb-4">Najnovije vijesti</h2>
  <div class="row justify-content-center">
    <!-- News Box 1 -->
    <div class="col-md-4 d-flex">
      <div class="card flex-fill text-center">
        <div class="card-body">
          <h5 class="card-title">Humanitarna akcija</h5>
          <p class="card-text">Crveni križ organizuje humanitarnu akciju za pomoć ugroženima. Pridružite se!</p>
          <a href="news1.php" class="btn btn-danger">Pročitaj više</a>
        </div>
      </div>
    </div>
    <!-- News Box 2 -->
    <div class="col-md-4 d-flex">
      <div class="card flex-fill text-center">
        <div class="card-body">
          <h5 class="card-title">Edukacija prve pomoći</h5>
          <p class="card-text">Započele su prijave za Edukaciju vozača u prvoj </p>
          <a href="news2.php" class="btn btn-danger">Pročitaj više</a>
        </div>
      </div>
    </div>
    <!-- News Box 3 -->
    <div class="col-md-4 d-flex">
      <div class="card flex-fill text-center">
        <div class="card-body">
          <h5 class="card-title">Dobrovoljno darivanje krvi</h5>
          <p class="card-text">U Elektrotehničkoj srednjoj školi se sprovodi akcija dobrovoljnog darivanja krvi i animiranja punoljetnih srednjoškolaca.</p>
          <a href="news3.php" class="btn btn-danger">Pročitaj više</a>
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
