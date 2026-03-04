<?php
  // ganze Klasse
  // einzelnes Fach vs alle Fächer

  // einzelner Schüle
  // kompletter Durchschnitt
  // Einzelne Fächer inkl einzelner Noten
  function getStatements() {
    $type = (isset($_GET['type'])) ? htmlspecialchars($_GET['type']) : "";
    $class_id = (isset($_GET['klasse_id'])) ? htmlspecialchars($_GET['klasse_id']) : "";
    $subject = (isset($_GET['fach'])) ? htmlspecialchars($_GET['fach']) : "";
    $name = (isset($_GET['vorname'])) ? htmlspecialchars($_GET['vorname']) : "";
    $lastname = (isset($_GET['nachname'])) ? htmlspecialchars($_GET['nachname']) : "";
    $bday = (isset($_GET['geb'])) ? htmlspecialchars($_GET['geb']) : "";


    switch($type) {
      case 'gradesPerStudent': {

      }
      case 'gradesPerSubject': {
      
      }
      case 'gradesPerClass': {

      }
    }
  }
?>