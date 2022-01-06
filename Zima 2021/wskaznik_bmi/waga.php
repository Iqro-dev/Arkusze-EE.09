<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Twój wskaźnik BMI</title>
  <link rel="stylesheet" href="styl4.css">
</head>
<body>
  <header>
    <div class="banner">
      <h2>Oblicz wskaźnik BMI</h2>
    </div>

    <div class="logo">
      <img src="wzor.png" alt="liczymy BMI">
    </div>
  </header>

  <main>
    <div class="left">
      <img src="rys1.png" alt="zrzuć kalorie!" height="300px">
    </div>
    
    <div class="right">
      <h1>Podaj dane</h1>
      <form action="waga.php" method="post">
        Waga: <input type="number" name="weight"> <br>
        Wzrost: <input type="number" name="height"> <br>
        <input type="submit" value="Licz BMI i zapisz wynik">
      </form>
      <?php
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'egzamin';
        $line = '';

        $conn = mysqli_connect($server, $user, $password, $database);

        $weight = $_POST['weight'] ?? '';
        $height = $_POST['height'] ?? '';
        $bmi = 0;

        if(!empty($height) || !empty($weight)) {
          $bmi = ($weight / ($height * $height)) * 10000;
          echo "Twoja waga: $weight; Twój wzrost $height <br> BMI wynosi: $bmi";

          $bmi_id = $bmi < 19 ? 1 : ($bmi < 26 ? 2 : ($bmi < 31 ? 3 : 4)); 

          $line = "INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ($bmi_id, getdate(Y-m-d), $bmi);";
          
          $query = $conn->query($line);
        }
      ?>
    </div>

    <div class="content">
      <table>
        <tr><th>lp</th><th>Interpretacja</th><th>zaczyna się od...</th></tr>
        <?php
          $line = "SELECT id, informacja, wart_min FROM bmi;";

          $query = $conn->query($line);

          while($result = $query->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $result['id'] . "</td>";
            echo "<td>" . $result['informacja'] . "</td>";
            echo "<td>" . $result['wart_min'] . "</td>";
            echo "</tr>";
          }
        ?>
      </table>
    </div>
  </main>

  <div class="footer">
    <p>Autor: 4329804789832 <a href="kw4.jpg" target="_blank">Wynik działania kwerendy 2</a></p>
  </div>
</body>
</html>