<?php

function postStatements() {
  $type = (isset($_POST['type'])) ? htmlspecialchars($_POST['type']) : "";
  $class_id = (isset($_POST['klasse_id'])) ? htmlspecialchars($_POST['cellsizeklasse_id']) : "";
  $subject = (isset($_POST['fach'])) ? htmlspecialchars($_POST['fach']) : "";
  $name = (isset($_POST['vorname'])) ? htmlspecialchars($_POST['vorname']) : "";
  $lastname = (isset($_POST['nachname'])) ? htmlspecialchars($_POST['nachname']) : "";
  $bday = (isset($_POST['geb'])) ? htmlspecialchars($_POST['geb']) : "";


  switch($type) {
    case 'addStudent': {
      if(isset($name, $lastname, $bday, $class_id)) 
        $addStudent = "INSERT INTO schueler (vorname, nachname, geburtsdatum, klasse_id) VALUES
        ($name, $lastname, $bday, $class_id);";
    }
    case 'removeStudent': {
      
    }
    case 'updateStudent': {

    }
    case 'addGrade': {

    }
  }
    
  // einzelner Schüler
  // Schüler hinzufügen / Entfernen
  // Klassenarbeit hinzufügen / Anpassen / Löschen
  
}