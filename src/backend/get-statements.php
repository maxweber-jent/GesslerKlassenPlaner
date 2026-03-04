<?php
  // ganze Klasse
  // einzelnes Fach vs alle Fächer

  // einzelner Schüle
  // kompletter Durchschnitt
  // Einzelne Fächer inkl einzelner Noten
  function getStatements() {
    global $pdo;
    
    $type = (isset($_GET['type'])) ? htmlspecialchars($_GET['type']) : "";
    $class_id = (isset($_GET['klasse_id'])) ? htmlspecialchars($_GET['klasse_id']) : "";
    $subject = (isset($_GET['fach'])) ? htmlspecialchars($_GET['fach']) : "";
    $name = (isset($_GET['vorname'])) ? htmlspecialchars($_GET['vorname']) : "";
    $lastname = (isset($_GET['nachname'])) ? htmlspecialchars($_GET['nachname']) : "";
    $bday = (isset($_GET['geb'])) ? htmlspecialchars($_GET['geb']) : "";


    switch($type) {
      case 'getClasses': {
        // Retrieve all classes and return as JSON
        $stmt = $pdo->prepare("SELECT klasse_id, bezeichnung, schuljahr FROM klasse ORDER BY bezeichnung");
        $stmt->execute();
        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($classes);
        exit;
      }
      case 'gradesPerStudent': {

      }
      case 'gradesPerSubject': {
      
      }
      case 'gradesPerClass': {

      }
    }
  }
?>