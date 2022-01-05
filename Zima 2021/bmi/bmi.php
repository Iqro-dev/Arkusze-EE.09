<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Twoje BMI</title>
  <link rel="stylesheet" href="styl3.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="wzor.png" alt="wzór BMI">
    </div>

    <div class="banner">
      <h1>Oblicz swoje BMI</h1>
    </div>
  </header>

  <main>
    <div class="content">
      <table>
        <tr><th>Interpretacja BMI</th><th>Wartość minimalna</th><th>Wartość maksymalna</th></tr>
        <?php
          $server = 'localhost';
          $user = 'root';
          $password = '';
          $database = 'egzamin';

          $conn = mysqli_connect($server, $user, $password, $database);

          $f = fopen('kwerendy.txt', 'r');
          $line = fgets($f);
          fclose($f);

          $query = $conn->query($line);

          while($result = $query->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $result['informacja'] . "</td>";
            echo "<td>" . $result['wart_min'] . "</td>";
            echo "<td>" . $result['wart_max'] . "</td>";
            echo "</tr>";
          }

          mysqli_close($conn);
        ?>
      </table>
    </div>

    <div class="left">
      <h2>Podaj wagę i wzrost</h2>
      <form action="bmi.php" method="post">
        Waga: <input type="number" min="1" name="weight"> <br>
        Wzrost w cm: <input type="number" min="1" name="height"> <br>
        <input type="submit" value="Oblicz i zapamiętaj wynik">
      </form>
      <?php
        $weight = $_POST['weight'] ?? '';
        $height = $_POST['height'] ?? '';
        if(!empty($weight) && !empty($height)) {
          $bmi = ($weight / pow($height, 2)) * 10000;
          echo "Twoja waga: $weight ";
          echo "Twój wzrost: $height <br>";
          echo "BMI wynosi: $bmi";

          $bmi_id = 0;
          $today = date("Y-m-d");

          if($bmi > 0 && $bmi <= 18) {
            $bmi_id = 1;
          } else if($bmi >= 19 && $bmi <= 25) {
            $bmi_id = 2;
          } else if ($bmi >= 26 && $bmi <= 30) {
            $bmi_id = 3;
          } else if ($bmi >= 31) {
            $bmi_id = 4;
          }

          $conn = mysqli_connect($server, $user, $password, $database);

          $line = "INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ('$bmi_id', '$today', '$bmi');";

          $queryTwo = $conn->query($line);

          mysqli_close($conn);
        } else {
          echo "Formularz nie został poprawnie wypełniony";
        }
      ?>
    </div>

    <div class="right">
      <img src="rys1.png" alt="ćwiczenia" height="400px">
    </div>
  </main>

  <footer class="footer">
    <p>Autor: 3472942893</p>
    <a href="kwerendy.txt" target="_blank">Zobacz kwerendy</a>
  </footer>
</body>
</html>