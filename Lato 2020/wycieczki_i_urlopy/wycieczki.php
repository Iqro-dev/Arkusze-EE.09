<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wycieczki i urlopy</title>
  <link rel="stylesheet" href="styl3.css">
</head>
<body>
  <header>
    <div class="banner">
      <h1>BIURO PODRÓŻY</h1>
    </div>
  </header>

  <main>
    <div class="left">
      <h2>KONTAKT</h2>
      <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
      <p>telefon: 555666777</p>
    </div>

    <div class="content">
      <h2>Galeria</h2>
      <?php
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'egzamin';

        $conn = mysqli_connect($server, $user, $password, $database);

        $line = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;";

        $query = $conn->query($line);

        while($result = $query->fetch_assoc()) {
          echo "<img src=images/" . $result['nazwaPliku'] . " alt=" . $result['podpis'] . ">";
        }
      ?>
    </div>

    <div class="right">
      <h2>Promocje</h2>
      <table>
        <tr><td>Jesień</td><td>Grupa 4+</td><td>Grupa 10+</td></tr>
        <tr><td>5%</td><td>10%</td><td>15%</td></tr>
      </table>
    </div>

    <div class="data">
      <h2>LISTA WYCIECZEK</h2>
      <?php
        $line = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna=1;";

        $query = $conn->query($line);

        while($result = $query->fetch_assoc()) {
          echo "<p>" . $result['id'] . ". " . $result['dataWyjazdu'] . ", " . $result['cel'] . ", cena:" . $result['cena'] . "</p>";
        }

        mysqli_close($conn);
      ?>
    </div>
  </main>

  <footer>
    <div class="footer">
      <p>Stronę wykonał: 543453254235</p>
    </div>
  </footer>
</body>
</html>