<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prognoza pogody Poznań</title>
  <link rel="stylesheet" href="styl4.css">
</head>
<body>
  <header>
    <div class="leftHeader">
      <p>maj, 2019 r.</p>
    </div>

    <div class="middleHeader">
      <h2>Prognoza dla Poznania</h2>
    </div>

    <div class="rightHeader">
      <img src="logo.png" alt="prognoza" height="90px">
    </div>
  </header>

  <section>
    <div class="leftSection">
      <a href="kwerendy.txt">Kwerendy</a>
    </div>

    <div class="rightSection">
      <img src="obraz.jpg" alt="Polska, Poznań" height="250px">
    </div>
  </section>

  <div class="main">
    <table>
      <tr><th>Lp.</th><th>DATA</th><th>NOC - TEMPERATURA</th><th>DZIEŃ - TEMPERATURA</th><th>OPADY [mm/h]</th><th></th>CIŚNIENIE [hPa]</tr>
    <?php
    $server='localhost';
    $user='root';
    $password='';
    $database='egzamin';

    $conn = mysqli_connect($server, $user, $password, $database);
    
    $line = 'SELECT * FROM pogoda WHERE miasta_id="2" ORDER BY data_prognozy DESC;';

    $query = $conn->query($line);

    while($result = $query->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $result['id'] . '</td><td>' . $result['data_prognozy'] . '</td><td>' . $result['temperatura_noc'] . '</td><td>' . $result['temperatura_dzien'] . '</td><td>' . $result['opady'] . '</td><td>' . $result['cisnienie'] . '</td>';
      echo '</tr>';
    }
    ?>
    </table>
  </div>

  <div class="footer">
    <p>Stronę wykonał: 43782948932</p>
  </div>
</body>
</html>