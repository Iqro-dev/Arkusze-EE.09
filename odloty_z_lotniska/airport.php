<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styl6.css">
  <title>Odloty samolotów</title>
</head>
<body>
  <div class="header">
    <header class="header1">
      <h2>Odloty z lotniska</h2>
    </header>

    <header class="header2">
      <img src="zad6.png" alt="logotyp" height="150px">
    </header>
  </div>

  <main class="main">
    <h4>tabela odlotów</h4>
    <table>
      
      <?php
        $file = 'kwerendy.txt';
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'egzamin';

        $conn = mysqli_connect($server, $user, $password, $database);
        $f = fopen($file, 'r');
        $line = fgets($f);
        $wynik = $conn->query($line);
        fclose($f);

        if($wynik->num_rows > 0) {
          echo "<tr>
            <th>LP</th>
            <th>numer rejsu</th>
            <th>czas</th>
            <th>kierunek</th>
            <th>status</th>
            </tr>";

          while($wiersz = $wynik->fetch_assoc() ){
            echo "<tr>";

            echo "<td>" . $wiersz["id"] . "</td>";
            echo "<td>" . $wiersz["nr_rejsu"] . "</td>";
            echo "<td>" . $wiersz["czas"] . "</td>";
            echo "<td>" . $wiersz["kierunek"] . "</td>";
            echo "<td>" . $wiersz["status_lotu"] . "</td>";

            echo "</tr>";
          }
        } 
      ?>
    </table>
  </main>
  <footer class="footer1">
    <a href="zad6.png" download>Pobierz obraz</a>
  </footer>

  <footer class="footer2">
    <?php
      if(!isset($_COOKIE['cookie'])) {
        echo "<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>"; 
      }

      setcookie('cookie',time() + 3600);

      if(isset($_COOKIE['cookie'])) {
        echo "<p><b>Miło nam że nas znowu odwiedziłeś</b></p>";
      }
      
    ?>
  </footer>

  <footer class="footer3">
    <a>Autor: 432432432432</a>
  </footer>
</body>
</html>