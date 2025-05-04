<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dobrovoljno darivanje krvi</title>
  
  <!-- Font i Bootstrap -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
      font-family: 'Montserrat', sans-serif;
      overflow: hidden; /* sakriva vertikalni scroll */
    }

    .scroll-wrapper {
      display: flex;
      align-items: center;
      height: 100%;
      overflow-x: auto;
      padding: 20px;
      box-shadow: inset 20px 0 15px -15px rgba(0, 0, 0, 0.1), inset -20px 0 15px -15px rgba(0, 0, 0, 0.1);
    }

    .form-container {
      min-width: 500px;
      max-width: 500px;
      margin: auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(128, 0, 0, 0.2);
      border-top: 6px solid #dc3545;
      flex-shrink: 0; /* sprečava smanjenje forme */
    }

    h2 {
      text-align: center;
      color: #dc3545;
      margin-bottom: 20px;
    }

    label {
      margin-top: 15px;
      font-weight: bold;
      color: #333;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      background-color: #dc3545;
      color: white;
      font-weight: bold;
      border: none;
      cursor: pointer;
      margin-top: 20px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #a30000;
    }

    input[type="file"] {
      padding: 6px;
    }
  </style>
</head>
<body>

  <div class="scroll-wrapper">
    <div class="form-container">
      <h2>Dobrovoljno darivanje krvi</h2>
      <form action="includes/obrada.inc.php" method="post" enctype="multipart/form-data">
      <label for="ime">Ime i prezime:</label>
        <input type="text" id="ime" name="ime" required>

        <label for="jmbg">JMBG:</label>
        <input type="text" id="jmbg" name="jmbg" required>

        <label for="datum_rodjenja">Datum rođenja:</label>
        <input type="date" id="datum_rodjenja" name="datum_rodjenja" required>

        <label for="spol">Spol:</label>
        <select id="spol" name="spol" required>
          <option value="">Odaberi</option>
          <option value="muško">Muško</option>
          <option value="žensko">Žensko</option>
          <option value="drugo">Drugo</option>
        </select>

        <label for="krvna_grupa">Krvna grupa:</label>
        <select id="krvna_grupa" name="krvna_grupa" required>
          <option value="">Odaberi</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
        </select>

        <label for="kontakt">Broj telefona:</label>
        <input type="tel" id="kontakt" name="kontakt" required>

        <label for="email">Email adresa:</label>
        <input type="email" id="email" name="email">

        <label for="mjesto">Mjesto stanovanja:</label>
        <input type="text" id="mjesto" name="mjesto" required>

        <label for="uvjerenje">Ljekarsko uvjerenje (PDF):</label>
        <input type="file" id="uvjerenje" name="uvjerenje" accept="application/pdf" required>

        <input type="submit" value="Pošalji prijavu">
      </form>
    </div>
  </div>

</body>
</html>
