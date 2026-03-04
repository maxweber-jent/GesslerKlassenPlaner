<?php

function postStatements() {
  // make PDO connection available from db.php
  global $pdo;

  $type = isset($_POST['type']) ? htmlspecialchars($_POST['type']) : '';
  $class_id = isset($_POST['klasse_id']) ? htmlspecialchars($_POST['klasse_id']) : '';
  $subject = isset($_POST['fach']) ? htmlspecialchars($_POST['fach']) : '';
  $name = isset($_POST['vorname']) ? htmlspecialchars($_POST['vorname']) : '';
  $lastname = isset($_POST['nachname']) ? htmlspecialchars($_POST['nachname']) : '';
  $bday = isset($_POST['geb']) ? htmlspecialchars($_POST['geb']) : '';

  switch ($type) {
    case 'addStudent': {
      // insert a new student record
      if ($name && $lastname && $bday && $class_id) {
        $stmt = $pdo->prepare(
          "INSERT INTO schueler (vorname, nachname, geburtsdatum, klasse_id) VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([$name, $lastname, $bday, $class_id]);
      }
      break;
    }

    case 'removeStudent': {
      // expects schueler_id in POST data
      $sid = isset($_POST['schueler_id']) ? intval($_POST['schueler_id']) : 0;
      if ($sid) {
        $stmt = $pdo->prepare("DELETE FROM schueler WHERE schueler_id = ?");
        $stmt->execute([$sid]);
      }
      break;
    }

    case 'updateStudent': {
      // update existing student values
      $sid = isset($_POST['schueler_id']) ? intval($_POST['schueler_id']) : 0;
      if ($sid && ($name || $lastname || $bday || $class_id)) {
        $stmt = $pdo->prepare(
          "UPDATE schueler
           SET vorname = ?, nachname = ?, geburtsdatum = ?, klasse_id = ?
           WHERE schueler_id = ?"
        );
        $stmt->execute([$name, $lastname, $bday, $class_id, $sid]);
      }
      break;
    }

    case 'addGrade': {
      // add a new grade/note for a student
      $sid = isset($_POST['schueler_id']) ? intval($_POST['schueler_id']) : 0;
      $arbeit = isset($_POST['klassenarbeit_id']) ? intval($_POST['klassenarbeit_id']) : 0;
      $note = isset($_POST['note']) ? floatval($_POST['note']) : null;
      if ($sid && $arbeit && $note !== null) {
        $stmt = $pdo->prepare(
          "INSERT INTO note (schueler_id, klassenarbeit_id, note) VALUES (?, ?, ?)"
        );
        $stmt->execute([$sid, $arbeit, $note]);
      }
      break;
    }

    default: {
      // unknown action
      break;
    }
  }

  // einzelner Schüler
  // Schüler hinzufügen / Entfernen
  // Klassenarbeit hinzufügen / Anpassen / Löschen
}
