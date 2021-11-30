<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>piłka nożna</title>
  <link rel="stylesheet" href="styl2.css">
</head>
<body>
  <header>
    <div class="banner">
      <h3>Reprezentacja polski w piłce pożnej</h3>
      <img src="obraz1.jpg" alt="reprezentacja">
    </div>

    <div class="left">
      <form action="liga.php" method="post">
        <select name="position">
          <option name="1">Bramkarze</option>
          <option name="2">Obrońcy</option>
          <option name="3">Pomocnicy</option>
          <option name="4">Napastnicy</option>
        </select>
        <input type="submit" value="Zobacz">
      </form>
      <img src="zad2.png" alt="piłka" height="50px">
      <p>Autor 4329432432432</p>
    </div>

    <div class="right">
      <?php
      $file = 'kwerendy.txt';
      $server = 'localhost';
      $user = 'root';
      $password = '';
      $database = 'egzamin';
      $position = $_POST['position'] ?? '';
      $line = '';

      $conn = mysqli_connect($server, $user, $password, $database);

      if(!empty($position)) {
        echo "<ol>";

        if($position === 'Bramkarze') {
          $line = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = 1;";
        } else if ($position === 'Obrońcy') {
          $line = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = 2;";
        } else if ($position === 'Pomocnicy') {
          $line = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = 3;";
        } else if ($position === 'Napastnicy') {
          $line = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = 4;";
        }
       
        $query = $conn->query($line);
        
        while($result = $query->fetch_assoc()) {
          echo "<li>" . $result['imie'] . " " . $result['nazwisko'] ."</li>";
        }

        echo "</ol>";
      }

      mysqli_close($conn);
      ?>
    </div>
  </header>

  <main>
    <div class="content">
      <h3>
        Liga mistrzów
      </h3>
    </div>  

    <div class="league">
      <?php
      $conn = mysqli_connect($server, $user, $password, $database);

      $lines = file('kwerendy.txt');

      $line = $lines[1];

      $query = $conn->query($line);

      while($result = $query->fetch_assoc()) {
        echo "
        <div class=game>
          <h2>" . $result['zespol'] ."</h2>
          <h1>" . $result['punkty'] ."</h1>
          <p>grupa: " . $result['grupa'] ."</p>
        </div>";
      }
      ?>
    </div>
  </main>
</body>
</html>