<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Klub wędkowania</title>
  <link rel="stylesheet" href="styl2.css">
</head>
<body>
  <header>
    <div class="banner">
      <h2>Wędkuj z nami!</h2>
    </div>
  </header>

  <main>
    <div class="left">
      <img src="ryba2.jpg" width="500px" alt="Szczupak">
    </div>

    <div class="right">
      <h3>Ryby spokojnego żeru (białe)</h3>
      <?php
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'wedkowanie2';

        $conn = mysqli_connect($server, $user, $password, $database);        

        $line = 'SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 2;';

        $query = $conn->query($line);

        while($result = $query->fetch_assoc()) {
          echo "<p>" . $result['id'] . ". " . $result['nazwa'] . ", występuje w: " . $result['wystepowanie'] . "</p>";
        }
      ?>

      <ul>
        <ol><a href="https://wedkuje.pl/" target="_blank">Odwiedź także</a></ol>
        <ol><a href="http://www.pzw.org.pl/" target="_blank">Polski Związek Wędkarski</a></ol>
      </ul>
    </div>
  </main>
  
  <div class="footer">
    <p>Stronę wykonał: 49832744213</p>
  </div>
</body>
</html>