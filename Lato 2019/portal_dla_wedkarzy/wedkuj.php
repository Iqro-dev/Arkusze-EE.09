<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wędkujemy</title>
  <link rel="stylesheet" href="styl_1.css">
</head>
<body>
  <header>
    <div class="banner">
      <h1>Portal dla wędkarzy</h1>
    </div>
  </header>

  <main>
    <div class="left">
      <h2>Ryby drapieżne naszych wód</h2>
      <?php
        $server='localhost';
        $user='root';
        $password='';
        $database='egzamin';

        $conn = mysqli_connect($server, $user, $password, $database);

        $line = 'SELECT nazwa, wystepowanie FROM ryby WHERE styl_zycia="1";';

        $query = $conn->query($line);
        
        echo "<ul>";
        while($result = $query->fetch_assoc()) {
          echo "<li>" . $result['nazwa'] . ", występowanie: " . $result['wystepowanie'] . "</li>";
        }
        echo "</ul>";
      ?>
    </div>

    <div class="right">
      <a href="kwerendy.txt">Pobierz kwerendy</a>
      <img src="ryba1.jpg" alt="Sum" width="550px">
    </div>
  </main>

  <div class="footer">
    <p>Stronę wykonał: 4903287643</p>
  </div>
</body>
</html>