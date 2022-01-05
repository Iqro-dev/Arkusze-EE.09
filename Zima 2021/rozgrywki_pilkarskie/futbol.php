<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rozgrywki futbolowe</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  <header>
    <div class="banner">
      <h2>Światowe rozgrywki piłkarskie</h2>
      <img src="obraz1.jpg" alt="boisko">
    </div>
  </header>
  
  <main>
    <div class="games">
    <?php
      $file = 'kwerendy.txt';
      $server = 'localhost';
      $user = 'root';
      $password = '';
      $database = 'egzamin';

      $conn = mysqli_connect($server, $user, $password, $database);

      $f = fopen($file, 'r');
      $line = fgets($f);
      fclose($f);

      $query = $conn->query($line);

      while($result = $query->fetch_assoc()) {
        echo "
        <div class=game>
          <h3>" . $result['zespol1'] . "-" . $result['zespol2'] . "</h3>
          <h4>" . $result['wynik'] . "</h4>
          <p>w dniu: " . $result['data_rozgrywki'] ."</p>
        </div>";
      }

      mysqli_close($conn);
    ?>
    </div>

    <div class="content">
      <h2>Reprezentacja Polski</h2>
    </div>

    <div class="left">
      <p>Podaj pozycję zawodników (1-bramkarze, 2-obróncy, 3-pomocnicy, 4-napastnicy):</p>

      <form action="futbol.php" method="post">
        <input type="number" name="position">
        <input type="submit" value="Sprawdź">
      </form>

      <?php
        $position = $_POST['position'] ?? '';

        if(!empty($position)) {
          $conn = mysqli_connect($server, $user, $password, $database);

          $line = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $position;";

          $query = $conn->query($line);
          
          while($result = $query->fetch_assoc())
          echo "
          <ul>
            <li>" . $result['imie'] . " " . $result['nazwisko'] . "
            </li>
          </ul>";
        }
      ?>
    </div>

    <div class="right">
      <img src="zad1.png" alt="piłkarz" height="150px">
      <p>Autor: 40932749832</p>
    </div>
  </main>
</body>
</html>