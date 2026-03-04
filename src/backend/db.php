<?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  $host = "127.0.0.1";
  $port = 3307;
  $dbname = "schulverwaltung";
  $user = 'root';
  $pass = 'root';

  try{

    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8;";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $statement = "";

    $ergebnis = $pdo->query($statement);

    $schueler = $ergebnis->fetchALL(PDO::FETCH_ASSOC);


    // Je nach Anfrage rückgabe unterschiedlicher ausgaben

  //   foreach($schueler as $s):
  //     echo "<tr>";
  //       echo "<td>" . htmlspecialchars($s['ID']) . "</td>";
  //       echo "<td>" . htmlspecialchars($s['nachname']) . "</td>";
  //       echo "<td>" . htmlspecialchars($s['vorname']) . "</td>";
  //       echo "<td>" . htmlspecialchars($s['klasse']) . "</td>";
  //       echo "<td>" . htmlspecialchars($s['AG']) . "</td>";
  //     echo "</tr>";
  //   endforeach;
  } 
  
  catch(PDOEXCEPTION $e){

    echo "<p> Verbindungsfehler... " . $e->getMessage() . "<p>";

  }

?>